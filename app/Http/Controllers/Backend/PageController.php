<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Page;
use Illuminate\Http\Request;
use App\Traits\Backend\FileUpload\FileUploadTrait;
class PageController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pty = NULL)
    {
        
        $status = 'all';
        if(strtolower($pty) == 'published'){
            $status = 1;
        }
        else if(strtolower($pty) == 'draft'){
            $status = 2;
        } 
        else if(strtolower($pty) == 'pending'){
            $status = 0;
        }
        
        $query = Page::query();
        if($status != "all" && $status >= 0  )
        {
            $query->where('status',$status);
        }
        
        $data['pages']          = $query->whereNull('deleted_at')->latest()->get();
        $data['pageCountables'] = Page::whereNull('deleted_at')->latest()->get();
        $data['ptyUrl']         = $pty;
        return view('backend.pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.add_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = auth()->user()->pageUser()->create(['title'=>$request->title]);
        
        $status = 0;
        if($request->page_status == 'Save Draft')
        {
            $status = 2;
        }
        else if($request->page_status == 'Publish')
        {
            $status = 1;
        }
        $page->description  = $request->description;
        $page->status  = $status;
        $page->save();
        if(isset($request->featured_image))
        {
            $this->destination  = 'page';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $page->featured_image = $this->storeImage();
            $page->save();
        }
        return redirect()->route('admin.page.index')->with('success','Page added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $data['page']          = $page;
        return view('backend.pages.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->title = $request->title;
        $status = 0;
        if($request->page_status == 'Save Draft')
        {
            $status = 2;
        }
        else if($request->page_status == 'Publish')
        {
            $status = 1;
        }
        $page->description  = $request->description;
        $page->status  = $status;
        $page->save();
        if(isset($request->featured_image))
        {
            $this->destination  = 'page';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $this->dbImageField = $page->featured_image; 
            $page->featured_image = $this->updateImage();
            $page->save();
        }
        return redirect()->route('admin.page.index')->with('success','Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
