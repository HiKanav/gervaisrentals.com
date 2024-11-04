<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;
use Session;
use App\Admin\GalleryImage;

class GalleryController extends Controller
{
    /**
     * Location of gallery images
     * @var string
     */
    private $galleryLocation;

    public function __construct()
    {
        $this->galleryLocation = env('GALLERY_LOCATION', 'imgs/gallery');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryImages = GalleryImage::all();
        $galleryLocation =  $this->galleryLocation;
        return view('admin.gallery.index', compact('galleryImages', 'galleryLocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        extract($this->getDefaultValues());
        return view('admin.gallery.create', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details = $this->getFormFields($request);

        // Store Main Image
        if(!$details["main_location"] = $this->moveImage($request->file("main_location"))) return $this->flashAndRedirect();

        if(GalleryImage::create($details)) return $this->flashAndRedirect('success', 'Gallery Image Created Successfully');
        else return $this->flashAndRedirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleryImage = GalleryImage::findOrFail($id);
        $galleryLocation =  $this->galleryLocation;
        extract($this->getDefaultValues());
        return view('admin.gallery.edit', compact('galleryImage', 'galleryLocation', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galleryImage = GalleryImage::findOrFail($id);
        $details = $this->getFormFields($request);

        // Delete Old And Update Main Image
        if($mainImage = $request->file("main_location")){
            File::delete($this->getImagePath($galleryImage->main_location));
             if(!$details["main_location"] = $this->moveImage($mainImage)) return $this->flashAndRedirect();
        }

        if($galleryImage->update($details)) return $this->flashAndRedirect('success', 'Gallery Image Updated Successfully');
        else return $this->flashAndRedirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleryImage = GalleryImage::findOrFail($id);
        if($galleryImage->delete()){
            if(File::delete($this->getImagePath($galleryImage->main_location))) return $this->flashAndRedirect('success', 'Gallery Image Deleted Successfully');
            else return $this->flashAndRedirect();
        }else return $this->flashAndRedirect();
    }

    /**
     * Get required category fields
     * @param  Request $request
     * @return request
     */
    private function getFormFields(Request $request)
    {
        return $request->only('description', 'sort_order', 'active');
    }

    private function moveImage($image)
    {
        $path = $this->getRootPath();
        $imageName = str_random(50).'.'.$image->getClientOriginalExtension();
        
        return $image->move($path, $imageName) ? $imageName : false;
    }

    /**
     * Get path where testimonials are saved
     * @param  string $file
     * @return string
     */
    private function getRootPath()
    {
        return public_path()."/{$this->galleryLocation}";
    }

    /**
     * Get full path of gallery image
     * @param  string $file
     * @return string
     */
    private function getImagePath($file)
    {
        return "{$this->getRootPath()}/{$file}";
    }

    /**
     * Possible values of active attribute
     * @return arr key as attribute name and value as options and default
     */
    private function getDefaultValues()
    {
        $active = ['options' => [0 => 'Inactive', 1 => 'Active']];
        return compact('active');
    }

    /**
     * Redirect to index ater an event
     * @param  string $type Event type
     * @param  string $msg  Message to display
     * @return redirection
     */
    private function flashAndRedirect($type='danger', $msg='Something went wrong! Try Again')
    {
        Session::flash('noti', ['type' => $type, 'msg' => $msg]);
        return redirect()->action('Admin\GalleryController@index');
    }
}
