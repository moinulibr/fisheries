<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Media;
use Illuminate\Http\Request;

use App\Traits\Backend\FileUpload\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
     use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medias'] = Media::latest()->get();
        return view('backend.media.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.media.add_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->photo))
        {
            foreach($request->photo as $photo){
                //$data = auth()->user()->mediaUser()->create($photo);
                $data = new Media();
                $data->created_by = Auth::guard('web')->user()->id;
                $data->status = 1;
                $data->save();
                if(isset($photo))
                {
                    $this->destination  = 'media';  //its mandatory;
                    $this->imageWidth   = 400;  //its mandatory
                    $this->imageHeight  = 400;  //its nullable
                    $this->requestFile  = $photo;  //its mandatory
                    $this->id           = $data->id;
                    $data->photo        = $this->storeImage();
                    $data->save();
                }
            }
            return redirect()->route('admin.media.index')->with('success','Media Added Successfully');
        }
        return back()->with('error','please select media photo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
