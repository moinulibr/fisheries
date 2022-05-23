<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Backend\FileUpload\FileUploadTrait;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::latest()->get();
        return view('backend.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function slug(Request $request)
    {
        $slug =  Str::slug($request->name,'-');
        return response()->json(['slug' => $slug]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:400|unique:categories,name',
            'slug'          => 'required|string|max:500|unique:categories,slug',
            'parent_id'     => 'required',
        ]);

        $category = auth()->user()->categoryUser()->create($request->except(['photo']));
        
        //$category->description  = $request->description;
        $category->status  = 1;
        $category->save();
        if(isset($request->photo))
        {
            $this->destination  = 'category';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $category->photo    = $this->storeImage();
            $category->save();
        }
        return redirect()->route('admin.category.index')->with('success','Category added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['categories'] = Category::latest()->get();
        $data['category']   = $category;
        $view =  view('backend.category.edit',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'          => 'required|string|max:400|unique:categories,name,'.$category->id,
            'slug'          => 'required|string|max:500|unique:categories,slug,'.$category->id,
            'parent_id'     => 'required',
        ]);
        $category->name         = $request->name ;
        $category->slug         = $request->slug ;
        $category->parent_id    = $request->parent_id ;
        $category->description  = $request->description ;
        $category->save();
        if(isset($request->cat_photo))
        {
            $this->destination  = 'category';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->cat_photo;  //its mandatory
            $this->dbImageField = $category->photo;  //its mandatory
            $category->photo    = $this->updateImage();
            $category->save();
        }
        return redirect()->route('admin.category.index')->with('success','Category Updated successfully');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        $data['category'] = $category;
        $view =  view('backend.category.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->deleted_at = date('Y/m/d h:i:s');
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category Deleted Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        Category::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s')
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Category Deleted Successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function status(Category $category)
    {
        $data['inportLink'] = $category;
        $view =  view('backend.category.status',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    public function statusChanging(Request $request ,Category $category)
    {
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.important.link.index')->with('success','Important Link Status Changed Successfully');
    }

}
