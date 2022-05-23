<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Traits\Backend\FileUpload\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pty = NULL)
    {
        if(strtolower($pty) == 'published'){
            $status = 1;
        }
        else if(strtolower($pty) == 'draft'){
            $status = 2;
        } 
        else if(strtolower($pty) == 'pending'){
            $status = 0;
        }else{
            $status = "all";
        }
        
        $query = Post::query();
        if(($status <= 2  || $status == 0) && $status !="all")
        {
            $query->where('status',$status);
        }
        
        $data['posts']          = $query->whereNull('deleted_at')->latest()->get();
        $data['postCountables'] = Post::whereNull('deleted_at')->latest()->get();
        $data['ptyUrl']         = $pty;
        return view('backend.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::latest()->get();
        return view('backend.post.add_new',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $page = auth()->user()->postUser()->create(['title'=>$request->title]);
        
        $description = $request->input('description');
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', asset($image_name));
        }

        $description = $dom->saveHTML();

        //dd($description);

        $status = 0;
        if($request->page_status == 'Save Draft')
        {
            $status = 2;
        }
        else if($request->page_status == 'Publish')
        {
            $status = 1;
        }
        $page->description  = $description;
        $page->status  = $status;
        $page->save();
        if(isset($request->featured_image))
        {
            $this->destination  = 'post';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $page->featured_image = $this->storeImage();
            $page->save();
        }
        return redirect()->route('admin.post.index')->with('success','Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['post']          = $post;
        return view('backend.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $status = 0;
        if($request->page_status == 'Save Draft')
        {
            $status = 2;
        }
        else if($request->page_status == 'Publish')
        {
            $status = 1;
            $post->published_by  = Auth::guard('web')->user()->id;
            $post->published_at  = date('d-m-Y h:i:s A');
        }
        $post->status  = $status;
        
        $post->description  = $request->description;
        $post->save();

        if(isset($request->featured_image))
        {
            $this->destination  = 'post';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $this->dbImageField = $post->featured_image; 
            $post->featured_image = $this->updateImage();
            $post->save();
        }
        return redirect()->route('admin.post.index')->with('success','Post updated successfully');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        Post::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s'),
            'status'    => 4
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Page Deleted Successfully"
        ]);
    }

    public function delete(Post $post)
    {
        $data['post'] = $post;
        $view =  view('backend.post.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->deleted_at   = date('Y/m/d h:i:s');
        $post->status       = 4;
        $post->save();
        return redirect()->route('admin.post.index')->with('success','Post Deleted Successfully');
    }
}
