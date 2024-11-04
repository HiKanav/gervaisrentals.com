<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;
use Session;
use App\Admin\Category;
use App\Admin\CategoryOld;

use App\Admin\Product;
use App\Admin\ProductOld;

use App\Admin\NaveedParentCategory;
use App\Admin\NaveedCategory;
use App\Admin\NaveedProduct;


class CategoryController extends Controller
{
    private $categoryLocation;

    public function __construct()
    {
        $this->categoryLocation = env('CATEGORY_LOCATION', 'imgs/category');
        $this->productLocation = env('PRODUCT_LOCATION', 'imgs/product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // change apostphe
        // Found - 43, 44, 45, 328, 1116 
        /*foreach (Product::all() as $key => $product) {
            echo "<pre>";
            if (strpos($product->name, ' â€“')) {
                $name = str_replace(' â€“', '', $product->name);
                $code = str_replace('-â€“', '', $product->code);
                $product->name = $name;
                $product->code = $code;
                $product->save();
                echo "$product->id - $product->name - $product->code";
                echo "<br>";
                //echo "$product->id - $code";
            }
        }
        die;*/
        // Found 2, 3, 5, 9, 18, 19, 20, 22, 23, 47
        /*foreach (Category::all() as $key => $category) {
            echo "<pre>";
            if (strpos($category->description, 'â€™')) {
                $description = str_replace('â€™', "'", $category->description);
                $category->description = $description;
                $category->save();
                echo "$category->id - $category->description";
                echo "<br>";
                //echo "$category->id - $code";
            }
        }
        die;*/
        // Step 1 - Update all sub-categories and products to new parent ids
        // Bug - This will also update product of 3 child categories - [26, 27, 28]
        // Fixed bug in step 2
        /*$categories = [];
        foreach (Category::parents()->get() as $key => $parent) {
            $originalParentCat = NaveedParentCategory::whereTitle($parent->name)->first();
            // echo "<pre>";
            // print_r($originalParentCat->toArray());
            // echo "<br>";
            //echo "<pre>";
            //print_r($child->name);
            //echo "<br>";
            //$presentParentCat = Category::whereName($originalParentCat->title)->first();
            $oldId = $originalParentCat->id;
            $newId = $parent->id;
            $categories[$key][] = $oldId;
            $categories[$key][] = $parent->id;

            Category::whereParentCategoryId($oldId)->update(['parent_category_id' => $newId]);
            Product::whereParentCategoryId($oldId)->update(['parent_category_id' => $newId]);
            // $categories[$originalParentCat->title." - $newId"]['child_categories'] = Category::whereParentCategoryId($oldId)->lists('name')->toArray();
            // $categories[$originalParentCat->title." - $oldId"]['products'] = Product::whereParentCategoryId($oldId)->lists('name')->toArray();

        }
        $this->pr($categories);*/
        // Step 2 - get list of products that were overlapped
        // Update it manually
        /*foreach (Category::find([26, 27, 28]) as $key => $category) {
            $originalId = NaveedCategory::whereCatName($category->name)->first()->cat_id;
            $originalProductsNames = NaveedProduct::whereSubCatId($originalId)->lists('prod_name')->toArray();
            echo "<pre>";
            print_r($category->name.' - '.$category->id);
            echo "<br>";
            //print_r($originalProductsNames);
            //echo "<br>";
            print_r(Product::whereIn('name', $originalProductsNames)->lists('name', 'id')->toArray());
            
        }
        return;*/
        // Copy parent categories
        /*foreach(NaveedParentCategory::all() as $parentCategory){
            $imageName = str_replace('uploads/', '', $parentCategory->image);
            $from = public_path().'/'.$parentCategory->image;
            $to = public_path().'/'.$this->categoryLocation.'/'.$imageName;
            //if($matched = CategoryOld::whereName($parentCategory->title)->first())
            //print_r($matched->route_name);
            // echo "<br>";
            // print_r($imageName);
            // echo "<br>";
            // print_r($from);
            // echo "<br>";
            // print_r($to);
            // echo "<br>";
            File::copy($from, $to);
            Category::create(['id' => $parentCategory->id, 'parent_category_id' => 0, 'name' => $parentCategory->title, 'description' => $parentCategory->des, 'thumbnail_location' => $imageName, 'route_name' => CategoryOld::whereName($parentCategory->title)->first()->route_name]);
        }*/

        // Copy child categories
        /*foreach(NaveedCategory::all() as $category) {
            $imageName = str_replace('uploads/', '', $category->cat_thumbnail);
            $from = public_path().'/'.$category->cat_thumbnail;
            $to = public_path().'/'.$this->categoryLocation.'/'.$imageName;
            // if($matched = CategoryOld::whereName($category->cat_name)->first()){
            //     print_r($category->cat_name);
            //     echo "<br>";
            // }
            File::copy($from, $to);
            Category::create(['parent_category_id' => $category->parent_cat_id, 'name' => $category->cat_name, 'description' => $category->cat_desc, 'thumbnail_location' => $imageName, 'route_name' => CategoryOld::whereName($category->cat_name)->first()->route_name]);
            print_r($category->cat_name);
            echo "<br>";
        }*/

        //copy products
        /*$productImages = [];
        foreach (NaveedProduct::all() as $id => $product) {
            $thumb1NameOriginal = $product->prod_thumbnail;
            $thumb1Ext = explode('.', $thumb1NameOriginal);
            $thumb1Name = str_replace('upload/', '', str_replace('uploads/', '' ,$product->prod_thumbnail)) ? str_random(50).'.'.strtolower(end($thumb1Ext)) : '';
            $thumb1From = public_path().'/'.$thumb1NameOriginal;
            $thumb1To = public_path().'/'.$this->productLocation.'/'.$thumb1Name;

            $thumb2NameOriginal = $product->prod_thumbnail_2;
            $thumb2Ext = explode('.', $thumb2NameOriginal);
            $thumb2Name = str_replace('upload/', '', str_replace('uploads/', '' ,$product->prod_thumbnail_2)) ? str_random(50).'.'.strtolower(end($thumb2Ext)) : '';
            $thumb2From = public_path().'/'.$thumb2NameOriginal;
            $thumb2To = public_path().'/'.$this->productLocation.'/'.$thumb2Name;

            $thumb3NameOriginal = $product->prod_thumbnail_2;
            $thumb3Ext = explode('.', $thumb3NameOriginal);
            $thumb3Name = str_replace('upload/', '', str_replace('uploads/', '' ,$product->prod_thumbnail_2)) ? str_random(50).'.'.strtolower(end($thumb3Ext)) : '';
            $thumb3From = public_path().'/'.$thumb3NameOriginal;
            $thumb3To = public_path().'/'.$this->productLocation.'/'.$thumb3Name;

            $image1NameOriginal = $product->prod_image;
            $image1Ext = explode('.', $image1NameOriginal);
            $image1Name = str_replace('upload/', '', str_replace('uploads/', '' ,$product->prod_image)) ? str_random(50).'.'.strtolower(end($image1Ext)) : '';
            $image1From = public_path().'/'.$image1NameOriginal;
            $image1To = public_path().'/'.$this->productLocation.'/'.$image1Name;

            $image2NameOriginal = $product->prod_image_2;
            $image2Ext = explode('.', $image2NameOriginal);
            $image2Name = str_replace('upload/', '', str_replace('uploads/', '' ,$product->prod_image_2)) ? str_random(50).'.'.strtolower(end($image2Ext)) : '';
            $image2From = public_path().'/'.$image2NameOriginal;
            $image2To = public_path().'/'.$this->productLocation.'/'.$image2Name;

            $image3NameOriginal = $product->prod_image_3;
            $image3Ext = explode('.', $image3NameOriginal);
            $image3Name = str_replace('upload/', '', str_replace('uploads/', '' ,$product->prod_image_3)) ? str_random(50).'.'.strtolower(end($image3Ext)) : '';
            $image3From = public_path().'/'.$image3NameOriginal;
            $image3To = public_path().'/'.$this->productLocation.'/'.$image3Name;

            //$productImages[$id] = compact('thumb1Name','thumb2Name','thumb3Name','image1Name','image2Name','image3Name');
            if($thumb1Name) File::copy($thumb1From, $thumb1To);
            if($thumb2Name) File::copy($thumb2From, $thumb2To);
            if($thumb3Name) File::copy($thumb3From, $thumb3To);

            if($image1Name) File::copy($image1From, $image1To);
            if($image2Name) File::copy($image2From, $image2To);
            if($image3Name) File::copy($image3From, $image3To);

            // name matched from old database, use from old else generate new
            if($matched = ProductOld::whereName($product->prod_name)->first()) $code = $matched->code;
            else $code = implode('-', explode(' ', $product->prod_name));

            // Products belonging to parent category
            if($product->sub_cat_id == 0) $parentCategoryId = $product->parent_cat_id;
            else $parentCategoryId = Category::whereName(NaveedCategory::whereCatId($product->sub_cat_id)->first()->cat_name)->first()->id;

            $products[] = ['parent_category_id' => $parentCategoryId, 'name' => $product->prod_name, 'desc' => $product->prod_desc, 'price' => $product->price, 'thumbnail_location_1' => $thumb1Name, 'thumbnail_location_2' => $thumb2Name, 'thumbnail_location_3' => $thumb3Name, 'image_location_1' => $image1Name, 'image_location_2' => $image2Name, 'image_location_3' => $image3Name, 'code' => $code];
            Product::create(['parent_category_id' => $parentCategoryId, 'name' => $product->prod_name, 'desc' => $product->prod_desc, 'price' => $product->price, 'thumbnail_location_1' => $thumb1Name, 'thumbnail_location_2' => $thumb2Name, 'thumbnail_location_3' => $thumb3Name, 'image_location_1' => $image1Name, 'image_location_2' => $image2Name, 'image_location_3' => $image3Name, 'code' => $code]);
        }
        echo "<pre>";
        print_r($products);
        die;
        */
       
        // Sync image and thumbnail
        /*foreach (Product::all() as $key => $product) {
            $thumbnail_location_1 = $product->thumbnail_location_1;
            if ($thumbnail_location_1) {
                $thumb_1_exp = explode('.', $product->thumbnail_location_1);
                $thumb_1_ext = end($thumb_1_exp);
            }
            
            $image_location_1 = $product->image_location_1;
            if ($image_location_1) {
                $image_1_exp = explode('.', $product->thumbnail_location_1);
                $image_1_ext = end($image_1_exp);
            }
            $location = public_path().'/'.$this->productLocation.'/';

            if(!empty($thumbnail_location_1)) $fileExists[$key]['thumbnail_location_1'] = File::exists($location.$thumbnail_location_1) ? 1 : 0;
            else $fileExists[$key]['thumbnail_location_1'] = 0;
            
            if(!empty($image_location_1)) $fileExists[$key]['image_location_1'] = File::exists($location.$image_location_1) ? 1 : 0;
            else $fileExists[$key]['image_location_1'] = 0;

            if(array_key_exists($key, $fileExists)){
                // Both exists
                if($fileExists[$key]['thumbnail_location_1'] != 0 && $fileExists[$key]['image_location_1'] != 0){
                    // File::copy(public_path().'/'.$thumbnail_location_1, public_path().'/'.$this->productLocation.'/'.$thumbnail_location_1_name);
                    // File::copy(public_path().'/'.$image_location_1, public_path().'/'.$this->productLocation.'/'.$image_location_1_name);
                    // $product->update(['thumbnail_location_1' => $thumbnail_location_1_name, 'image_location_1' => $image_location_1_name]);

                }
                //thumbnaill exists but image doesnot
                else if($fileExists[$key]['thumbnail_location_1'] != 0 && $fileExists[$key]['image_location_1'] == 0) {
                    $randomName = str_random(50).'.'.$thumb_1_ext;
                    File::copy($location.$thumbnail_location_1, $location.$randomName);
                    $product->update(['image_location_1' => $randomName]);

                }
                //image exists but thumbnail doesnot
                else if($fileExists[$key]['thumbnail_location_1'] == 0 && $fileExists[$key]['image_location_1'] != 0) {
                    $randomName = str_random(50).'.'.$image_1_ext;
                    File::copy($location.$image_location_1, $location.$randomName);
                    $product->update(['thumbnail_location_1' => $randomName]);
                }
            }
        }
        $this->pr($fileExists);
        return;*/

        /*foreach (Product::all() as $key => $product) {

            if($thumbnail_location_1 = $product->thumbnail_location_1) File::move(public_path().'/'.$this->productLocation.'/'.$product->thumbnail_location_1, public_path().'/imgs/product-thumb/'.$product->thumbnail_location_1);

            if($thumbnail_location_2 = $product->thumbnail_location_2) File::move(public_path().'/'.$this->productLocation.'/'.$product->thumbnail_location_2, public_path().'/imgs/product-thumb/'.$product->thumbnail_location_2);

            if($thumbnail_location_3 = $product->thumbnail_location_3) File::move(public_path().'/'.$this->productLocation.'/'.$product->thumbnail_location_3, public_path().'/imgs/product-thumb/'.$product->thumbnail_location_3);
        }
        die;*/
        //$categories =  Category::paginate(20);
        $categories =  Category::all();
        $categoryLocation = $this->categoryLocation;
        return view('admin.category.index', compact('categories', 'categoryLocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::whereParentCategoryId(0)->lists('name', 'id');
        extract($this->getDefaultValues());
        return view('admin.category.create', compact('parents', 'active'));
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

        // image moved
        if (!$details['thumbnail_location'] = $this->moveImage($request->file('thumbnail_location'))) return $this->flashAndRedirect();
        
        if(Category::create($details)) return $this->flashAndRedirect('success', 'Category Created Successfully');
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
        $category = Category::findOrFail($id);
        $parents = Category::whereParentCategoryId(0)->lists('name', 'id');
        $categoryLocation = $this->categoryLocation;
        extract($this->getDefaultValues());
        return view('admin.category.edit', compact('category', 'parents', 'categoryLocation', 'active'));
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
        $category = Category::findOrFail($id);
        $details = $this->getFormFields($request);

        // image exists
        if ($thumbnailLocation = $request->file('thumbnail_location')) {
            File::delete($this->getImagePath($category->thumbnail_location));

            if(!$details['thumbnail_location'] = $this->moveImage($request->file('thumbnail_location')))return $this->flashAndRedirect();
        }

        if($category->update($details)) return $this->flashAndRedirect('success', 'Category Updated Successfully');
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
        $category = Category::findOrFail($id);

        if(File::delete($this->getImagePath($category->thumbnail_location)) && $category->delete()) return $this->flashAndRedirect('success', 'Category Deleted Successfully');
        else return $this->flashAndRedirect();
    }

    /**
     * Get required category fields
     * @param  Request $request
     * @return request
     */
    private function getFormFields(Request $request)
    {
        $fields = $request->only('parent_category_id', 'name', 'route_name', 'description', 'quantity_minimum', 'quantity_maximum', 'quantity_interval', 'sort_order', 'active', 'title', 'meta_title', 'meta_description');

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
        return public_path()."/{$this->categoryLocation}";
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
     * Possible values of active and oneImage attribute
     * @return arr key as attribute name and value as options and default
     */
    private function getDefaultValues()
    {
        $active = ['options' => [0 => 'Inactive', 1 => 'Active']];
        return compact('active', 'oneImage');
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
        return redirect()->action('Admin\CategoryController@index');
    }
}
