<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;
use Session;
use App\Admin\Product;
use App\Admin\Category;

class ProductController extends Controller
{
    private $productLocation;

    public function __construct()
    {
        $this->productLocation = env('PRODUCT_LOCATION', 'imgs/product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::paginate(2000);
        $products = Product::all();
        $productLocation = $this->productLocation;
        return view('admin.product.index', compact('products', 'productLocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::all()->lists('name', 'id');
        extract($this->getDefaultValues());
        return view('admin.product.create', compact('parents', 'active', 'imageCount'));
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

        for ($i=1; $i <= $this->getDefaultValues()['imageCount']; $i++) { 
            // Thumbnail
            if ($thumbnail = $request->file("thumbnail_location_{$i}")) {
                if(!$details["thumbnail_location_{$i}"] = $this->moveImage($thumbnail)) return $this->flashAndRedirect();
            }
            // Image
            if($image = $request->file("image_location_{$i}")){
                if(!$details["image_location_{$i}"] = $this->moveImage($image)) return $this->flashAndRedirect();
            }
        }

        if(Product::create($details)) return $this->flashAndRedirect('success', 'Product Created Successfully');
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
        $product = Product::findOrFail($id);
        $parents = Category::all()->lists('name', 'id');
        $productLocation = $this->productLocation;
        extract($this->getDefaultValues());
        return view('admin.product.edit', compact('product', 'parents', 'productLocation', 'active', 'imageCount'));
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
        $product = Product::findOrFail($id);
        $details = $this->getFormFields($request);

        for ($i=1; $i <= $this->getDefaultValues()['imageCount']; $i++) { 
            // Thumbnail
            if ($thumbnail = $request->file("thumbnail_location_{$i}")) {
                File::delete($this->getImagePath($product["thumbnail_location_{$i}"]));
                if (!$details["thumbnail_location_{$i}"] = $this->moveImage($thumbnail)) return $this->flashAndRedirect();
            }
            // Image
            if($image = $request->file("image_location_{$i}")){
                File::delete($this->getImagePath($product["image_location_{$i}"]));
                if(!$details["image_location_{$i}"] = $this->moveImage($image)) return $this->flashAndRedirect();
            }
        }

        if($product->update($details)) {
            Session::flash('noti', ['type' => 'success', 'msg' => 'Product Updated Successfully']);
            return redirect()->back();
        }
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
        $product = Product::findOrFail($id);
        if($product->delete()){
            for ($i=1; $i <= $this->getDefaultValues()['imageCount']; $i++) { 
                if ($thumbnail = $product["thumbnail_location_{$i}"]) File::delete($this->getImagePath($thumbnail));
                if($image = $product["image_location_{$i}"]) File::delete($this->getImagePath($image));
            }
            return $this->flashAndRedirect('success', 'Product Deleted Successfully');
        }else return $this->flashAndRedirect();
    }

    /**
     * Get required category fields
     * @param  Request $request
     * @return request
     */
    private function getFormFields(Request $request)
    {
        $fields = $request->only('parent_category_id', 'code', 'name', 'description', 'price', 'quantity_minimum', 'quantity_maximum', 'quantity_interval', 'sort_order', 'active');
        return array_map(function($field){return $field == "" ? NULL : $field;}, $fields);
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
        return public_path()."/{$this->productLocation}";
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
        $imageCount = 3;
        return compact('active', 'imageCount');
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
        return redirect()->action('Admin\ProductController@index');
    }
}
