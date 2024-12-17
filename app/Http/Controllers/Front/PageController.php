<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;
use Session;
use Cookie;
use Mail;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Faq;
use App\Admin\Testimonial;
use App\Admin\Client;
use App\Admin\ExtraCharge;
use App\Admin\Quote;
use App\Admin\QuoteProduct;
use App\Admin\Acknowledgement;
use App\Admin\GalleryImage;
use App\Admin\TentPictureCategory;
use App\Admin\LinenColor;
use App\Admin\LinenChart;
use App\Admin\LinenSize;
use App\Admin\Centennial;
use App\Admin\Osahawa;
use App\Admin\TentCategory;
use App\Admin\Naveed;
use App\Admin\NaveedProduct;
use App\Admin\NaveedCategoryChild;
use App\Admin\OldProduct;
use App\Helpers\Helper;
use App\Helpers\MetricsHelper;

class PageController extends Controller
{
    private $categoryLocation;
    private $testimonialLocation;
    private $clientLocation;
    private $productLocation;
    private $acknowledgementLocation;
    private $galleryLocation;
    private $tentSizeLocation;
    private $tentPictureLocation;
    private $centennialLocation;
    private $osahawaLocation;

    public function __construct()
    {
        $this->categoryLocation = env('CATEGORY_LOCATION', 'imgs/category');
        $this->testimonialLocation = env('TESTIMONIAL_LOCATION', 'imgs/testimonial');
        $this->clientLocation = env('CLIENT_LOCATION', 'imgs/client');
        $this->productLocation = env('PRODUCT_LOCATION', 'imgs/product');
        $this->acknowledgementLocation = env('ACKNOWLEDGEMENT_LOCATION', 'imgs/acknowledgement');
        $this->galleryLocation = env('GALLERY_LOCATION', 'imgs/gallery');
        $this->tentSizeLocation = env('TENT_SIZE_LOCATION', 'imgs/tent-size');
        $this->tentPictureLocation = env('TENT_PICTURE_LOCATION', 'imgs/tent-picture');
        $this->centennialLocation = env('CENTENNIAL_LOCATION', 'imgs/centennial');
        $this->osahawaLocation = env('OSAHAWA_LOCATION', 'imgs/osahawa');
        $this->linenLocation = env('LINEN_LOCATION', 'imgs/linen');
    }

    public function getSearchProducts(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        $category = Category::where('name', 'LIKE', "%{$query}%")->get();
        $productLocation = $this->productLocation;
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.search-product', compact('query', 'products', 'productLocation', 'categories', 'category'));

    }

    public function getSearchProductsAsync(Request $request)
    {
        $query = $request->get('query');
        $products = Product::all()->filter(function($product) use ($query){
            return strpos(strtolower($product->name), strtolower($query)) !== false;
        })->values();
        
        $categories = Category::all()->filter(function($category) use ($query){
            return strpos(strtolower($category->name), strtolower($query)) !== false;
        })->values();

        $data = ['categories' => $categories, 'products' => $products];
        
        return $data;
    }

    public function getIndex()
    {
        $categoryLocation = $this->categoryLocation;
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.home', compact('categories' ,'categoryLocation', 'categoriesInChunk'));
    }

    public function getAbout(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.about', compact('categories'));
    }

    public function getMission()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.mission', compact('categories'));
    }

    public function getCaterers()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.caterer', compact('categories'));
    }

    public function getTestimonials()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $testimonialLocation  = $this->testimonialLocation;
        $testimonials   = Testimonial::active()->orderBy('sort_order')->get();
        return view('front.pages.testimonial', compact('testimonialLocation', 'categories', 'testimonials'));
    }

    public function getClients()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $clientLocation  = $this->clientLocation;
        $clients   = Client::active()->orderBy('sort_order')->get();
        return view('front.pages.client', compact('clientLocation', 'categories', 'clients'));
    }

    public function getReviews()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.review', compact('categories'));
    }

    public function getAcknowledgements()
    {
        /*$acknowledgements = [
                ['description' => 'Scarborough Chamber of Commerce', 'thumbnail_location' => 'comm_thumb_chamber.jpg', 'file_location' => 'comm_chamber.jpg', 'sort_order' => 1],
                ['description' => 'The Children\'s Wish Foundation', 'thumbnail_location' => 'comm_thumb_childrens.jpg', 'file_location' => 'comm_childrens.jpg', 'sort_order' => 2],
                ['description' => '2001 Mayors\' Charity Classic', 'thumbnail_location' => 'comm_thumb_mayors.jpg', 'file_location' => 'comm_mayors.jpg', 'sort_order' => 3],
                ['description' => 'Bas Balkissoon, MPP Community BBQ 2014', 'thumbnail_location' => 'Bas-Balkissoon-MPP.jpg', 'file_location' => 'Bas-Balkissoon-MPP.pdf', 'sort_order' => 4],
            ];
            foreach ($acknowledgements as $acknowledgement) Acknowledgement::create($acknowledgement);
            return;*/
        $categories = Category::parents()->orderBy('sort_order')->get();
        $acknowledgements = Acknowledgement::active()->orderBy('sort_order')->get();
        $acknowledgementLocation = $this->acknowledgementLocation;
        return view('front.pages.acknowledgement', compact('categories', 'acknowledgements', 'acknowledgementLocation'));
    }

    public function getHirings()
    {
        /*$acknowledgements = [
                ['description' => 'Scarborough Chamber of Commerce', 'thumbnail_location' => 'comm_thumb_chamber.jpg', 'file_location' => 'comm_chamber.jpg', 'sort_order' => 1],
                ['description' => 'The Children\'s Wish Foundation', 'thumbnail_location' => 'comm_thumb_childrens.jpg', 'file_location' => 'comm_childrens.jpg', 'sort_order' => 2],
                ['description' => '2001 Mayors\' Charity Classic', 'thumbnail_location' => 'comm_thumb_mayors.jpg', 'file_location' => 'comm_mayors.jpg', 'sort_order' => 3],
                ['description' => 'Bas Balkissoon, MPP Community BBQ 2014', 'thumbnail_location' => 'Bas-Balkissoon-MPP.jpg', 'file_location' => 'Bas-Balkissoon-MPP.pdf', 'sort_order' => 4],
            ];
            foreach ($acknowledgements as $acknowledgement) Acknowledgement::create($acknowledgement);
            return;*/
        $categories = Category::parents()->orderBy('sort_order')->get();
        $acknowledgements = Acknowledgement::active()->orderBy('sort_order')->get();
        $acknowledgementLocation = $this->acknowledgementLocation;
        return view('front.pages.hirings', compact('categories', 'acknowledgements', 'acknowledgementLocation'));
    }

    public function getVideos()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.video', compact('categories'));
    }

    public function getGallery()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $galleryImages = GalleryImage::active()->orderBy('sort_order')->get();
        $galleryLocation = $this->galleryLocation;
        return view('front.pages.gallery', compact('categories', 'galleryImages', 'galleryLocation'));
    }

    public function getTentSize()
    {
       $categories = Category::parents()->orderBy('sort_order')->get();
       $tentSizeLocation = $this->tentSizeLocation;
        return view('front.pages.tent-size', compact('categories', 'tentSizeLocation'));
    }

    public function getTentPictures()
    {
        $arr = ['href'=> 'image_location', 'src' => 'thumbnail_location', 'title' => 'description'];
        //echo "<pre>";
        //print_r(extract($arr));
        //die;
        $categories = Category::parents()->orderBy('sort_order')->get();
        $tentPictureLocation = $this->tentPictureLocation;
        $tentPictureCategories = TentPictureCategory::active()->get();

        /*foreach ($tentPictureCategories as $key => $tentPictureCategory) {
            var_dump($tentPictureCategory->pictures->count());
            if($tentPictureCategory->pictures->count() == 0) $tentPictureCategory->update(['active' => 0]);
        }*/

        /*foreach ($tentPictureCategories as $key => $tentPictureCategory) {
            foreach($tentPictureCategory->pictures as $picture){
                $mainLocation = $picture->main_location;
                $thumbnailLocation = $picture->thumbnail_location;
                $randomName = str_random(50);

                if($mainExists = File::exists(public_path().$mainLocation)){
                    $mainExploded = explode('.', $mainLocation);
                    $mainExtension = '.'.end($mainExploded);
                    $mainName = $randomName.'-main'.$mainExtension;
                    if(File::copy(public_path().$mainLocation, public_path().'/'.$tentPictureLocation.'/'.$mainName)){
                        $picture->update(['main_location' => $mainName]);
                    }
                }
                //echo "<br>";
                
                if($thumbnailExists = File::exists(public_path().$thumbnailLocation)){
                    $thumbnailExploded = explode('.', $thumbnailLocation);
                    $thumbnailExtension = '.'.end($thumbnailExploded);
                    $thumbnailName = $randomName.'-thumbnail'.$thumbnailExtension;
                    if(File::copy(public_path().$thumbnailLocation, public_path().'/'.$tentPictureLocation.'/'.$thumbnailName)){
                        $picture->update(['thumbnail_location' => $thumbnailName]);
                    }
                }
                //echo "<br>";
                if(!$thumbnailExists && !$mainExists) $picture->update(['active' => 0]);
                var_dump($picture->active);
            }
        }
        die;*/
        return view('front.pages.tent-picture', compact('categories', 'tentPictureLocation', 'tentPictureCategories'));
    }

    public function getTents()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $tentCategories = TentCategory::active()->get();
        $tentPackages = Category::find(23);
        $flooring = Category::find(103);

        return view('front.pages.tent', compact('categories', 'tentCategories', 'tentPackages', 'flooring'));
    }

    public function getLinenColors()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $linenLocation = $this->linenLocation;
        $linenColors =  LinenColor::all();

        return view('front.pages.linen-color', compact('categories', 'linenLocation', 'linenColors'));
    }

    public function getLinenSizes()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $linenSizes =  LinenSize::all();

        return view('front.pages.linen-size', compact('categories', 'linenSizes'));
    }

    public function getLinenCharts()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $linenLocation = $this->linenLocation;
        $linenCharts =  LinenChart::all();

        return view('front.pages.linen-chart', compact('categories','linenLocation' , 'linenCharts'));
    }

    public function getCentennial()
    {
        //return public_path().'imgs/ahmed-centennial/images';
        /*$images = File::files(public_path().'/imgs/ahmed-centennial/images');
        foreach ($images as $key => $image) {
            $imageExploded = explode('/', $image);
            $imageNameExploded = explode('.', end($imageExploded));
            $imageName = current($imageNameExploded);
            $imageExt = end($imageNameExploded);

            $randomName = str_random(50);
            $centennialLocation = $this->centennialLocation;

            $mainName = $randomName.'-main'.'.'.$imageExt;
            File::copy($image, public_path().'/'.$centennialLocation.'/'.$mainName);
            $thumbName = $randomName.'-thumbnail'.'.'.$imageExt;
            File::copy(public_path().'/imgs/ahmed-centennial/thumbnails/'.implode('.', $imageNameExploded), public_path().'/'.$centennialLocation.'/'.$randomName.'-thumbnail'.'.'.$imageExt);

            var_dump(Centennial::create(['main_location' => $mainName, 'thumbnail_location' => $thumbName]));
            //echo "$imageName";
            echo "<br>";
        }*/
        $categories = Category::parents()->orderBy('sort_order')->get();
        $centennialLocation = $this->centennialLocation;
        $centennials = Centennial::active()->get();

        return view('front.pages.centennial', compact('categories', 'centennialLocation', 'centennials'));
    }

    public function getOsahawa()
    {
        //return public_path().'imgs/ahmed-centennial/images';
        /*$images = File::files(public_path().'/imgs/ahmed-oshawa/images');
        foreach ($images as $key => $image) {
            $imageExploded = explode('/', $image);
            $imageNameExploded = explode('.', end($imageExploded));
            $imageName = current($imageNameExploded);
            $imageExt = end($imageNameExploded);

            $randomName = str_random(50);
            $osahawaLocation = $this->osahawaLocation;

            $mainName = $randomName.'-main'.'.'.$imageExt;
            File::copy($image, public_path().'/'.$osahawaLocation.'/'.$mainName);
            $thumbName = $randomName.'-thumbnail'.'.'.$imageExt;
            File::copy(public_path().'/imgs/ahmed-oshawa/thumbnails/'.implode('.', $imageNameExploded), public_path().'/'.$osahawaLocation.'/'.$randomName.'-thumbnail'.'.'.$imageExt);

            var_dump(Osahawa::create(['main_location' => $mainName, 'thumbnail_location' => $thumbName]));
            //echo "$imageName";
            echo "<br>";
        }*/
        $categories = Category::parents()->orderBy('sort_order')->get();
        $osahawaLocation = $this->osahawaLocation;
        $osahawas = Osahawa::active()->get();

        return view('front.pages.osahawa', compact('categories', 'osahawaLocation', 'osahawas'));
    }

    public function getHoursOfOperation()
    {
       $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.hours-of-operation', compact('categories'));
    }

    public function getDelivery()
    {
       $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.delivery', compact('categories'));
    }

    public function getRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $categoryLocation  = $this->categoryLocation;
        return view('front.pages.rental', compact('categoryLocation', 'categories'));
    }

    public function getProductDetails(Product $product)
    {
        $categoryLocation = $this->categoryLocation;
        $categories = Category::parents()->orderBy('sort_order')->get();
        $productLocation = $this->productLocation;

        return view('front.pages.product-details', compact('categoryLocation', 'productLocation', 'categories', 'product'));
    }

    public function getCategoryProducts($routeName)
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        /*foreach (NaveedProduct::all() as $key => $product) {
            if($matchedProduct = Product::where('name', $product->prod_name)->first()){
                $thumbnail_2 = $product->prod_thumbnail_2;
                $image_2 = $product->prod_image_2;

                $thumbnail_3 = $product->prod_thumbnail_3;
                $image_3 = $product->prod_image_3;

                // Copy Image 2
                if($image_2 != "" && $image_2 != "uploads/"){
                    if(File::exists(public_path().'/'.$image_2)){
                        $imgName = str_replace("uploads/", "", $image_2);
                        if(File::copy(public_path().'/'.$image_2, public_path()."/imgs/product/$imgName")){
                            $matchedProduct->update(['image_location_2' => $imgName]);
                            $matchedProducts['image_2'][] = $imgName;
                        }
                    }
                }
            }else {
                
            }
        }*/
        /*$fileExists = [];
        foreach (Product::all() as $key => $product) {
            $thumbnail_location_3 = $product->thumbnail_location_3;
            $thumbnail_location_3_name = str_replace('/productimages/', '', $thumbnail_location_3);

            $image_location_3 = $product->image_location_3;
            $image_location_3_name = str_replace('/productimages/', '', $image_location_3);

            if(!empty($thumbnail_location_3)) $fileExists[$key]['thumbnail_location_3'] = File::exists(public_path().'/'.$thumbnail_location_3) ? 1 : 0;
            

            if(!empty($image_location_3)) $fileExists[$key]['image_location_3'] = File::exists(public_path().'/'.$image_location_3) ? 1 : 0;

            if(array_key_exists($key, $fileExists)){
                // Both exists
                if($fileExists[$key]['thumbnail_location_3'] != 0 && $fileExists[$key]['image_location_3'] != 0){
                    File::copy(public_path().'/'.$thumbnail_location_3, public_path().'/'.$this->productLocation.'/'.$thumbnail_location_3_name);
                    File::copy(public_path().'/'.$image_location_3, public_path().'/'.$this->productLocation.'/'.$image_location_3_name);
                    $product->update(['thumbnail_location_3' => $thumbnail_location_3_name, 'image_location_3' => $image_location_3_name]);

                }
                //thumbnaill exists but image doesnot
                else if($fileExists[$key]['thumbnail_location_3'] != 0 && $fileExists[$key]['image_location_3'] == 0) {
                    File::copy(public_path().'/'.$thumbnail_location_3, public_path().'/'.$this->productLocation.'/'.$thumbnail_location_3_name);
                    $product->update(['thumbnail_location_3' => $thumbnail_location_3_name, 'image_location_3' => $thumbnail_location_3_name]);

                }
                //image exists but thumbnail doesnot
                else if($fileExists[$key]['thumbnail_location_3'] == 0 && $fileExists[$key]['image_location_3'] != 0) {
                    File::copy(public_path().'/'.$image_location_3, public_path().'/'.$this->productLocation.'/'.$image_location_3_name);
                    $product->update(['thumbnail_location_3' => $image_location_3_name, 'image_location_3' => $image_location_3_name]);
                }
            }
        }
        $this->pr($fileExists);
        return;*/
        $category         = Category::where('route_name', $routeName)->first();
        if(!$category) return view('errors.404');
        $childCategories  = $category->childs()->orderBy('sort_order')->get();
        $categoryLocation = $this->categoryLocation;
        $productLocation  = $this->productLocation;

        return view('front.pages.category-product', compact('categories', 'category', 'categoryLocation', 'childCategories', 'productLocation'));
    }

    public function getRequestQuote()
    {
        $productQuantity = Session::has('product_quantity') ? Session::get('product_quantity') : [];
        return $this->displayQuote($productQuantity);
    }

    public function postRequestQuote(Request $request)
    {
        $productQuantity = array_filter($request->get('product_quantity'), function($qty){ return trim($qty) || $qty === "0";});

        if(Session::has('product_quantity')) $productQuantity = array_filter(array_replace(Session::get('product_quantity'), $productQuantity));
        return $this->displayQuote($productQuantity);

    }

    private function displayQuote($productQuantity)
    {
        Session::put('product_quantity', $productQuantity);
        
        $categories      = Category::parents()->orderBy('sort_order')->get();
        $productDetails  = Product::find(array_keys($productQuantity));
        $extraCharges    = ExtraCharge::all();
        $productLocation = $this->productLocation;
        return view('front.pages.request-quote', compact('categories', 'productQuantity', 'productDetails', 'extraCharges', 'productLocation'));
    }

    public function postSendQuote(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'event_type' => 'required',
            'event_at' => 'required',
            'event_start' => 'required',
            'event_end' => 'required',
            // 'venue_name' => 'nullable',
            // 'major_road_intersection' => 'required', 
            'delivery_postal_code' => 'required',
            // 'floor_type' => 'required',
            'no_of_guests' => 'required',
            'message' => 'required',
            // 'last_name' => 'required',
            'major_intersections' => 'required',
            // 'city' => 'required',
            // 'tent_size' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
            // 'request_type' => 'required',
        ]);

        if($quote = Quote::create(
    array_merge(
                    $request->only(
                        'name',
                        'company_name',
                        'email',
                        'phone',
                        'event_type',
                        'event_at',
                        'event_start',
                        'event_end',
                        'venue_name',
                        'major_road_intersection',
                        'delivery_postal_code',
                        'no_of_guests',
                        'message',
                        'request_type',
                        'last_name',
                        'major_intersections',
                        'city',
                        'tent_size',
                        'delivery_on_elevator',
                        'loading_dock_instructions'
                    ),
                    [
                        "seo_metrics" => MetricsHelper::mergeMetrics($request->ip())
                    ]
                )
            )
        ) {
            // Clear cart data when contact us is filled
            if($request->has('contact_us')) {
                Session::forget('product_quantity');
            }
                
            if(!Session::has('product_quantity')) $quote->update(['has_products' => 0]);
            else $quote->update(['has_products' => 1]);

            $productQuantity = Session::get('product_quantity') ?: [];
            $productDetails  = Product::find(array_keys($productQuantity));
            $extraCharges    = ExtraCharge::where('price', '!=', '0')->get();
            $productLocation = $this->productLocation;
            foreach ($productQuantity as $productId => $quantity) {
                $quote->products()->save(new QuoteProduct(['product_id' => $productId, 'quantity' => $quantity]));
            }

            $subject = $quote->has_products ? "Gervais Rental Quote #$quote->id" : "Gervais Rentals Contact Us";

            $sendMailToUser = Mail::send('emails.quote', compact('quote', 'extraCharges', 'productLocation', 'subject'), function($message) use ($quote, $subject) {
                $message->from('sales@gervaisrentals.com', 'Gervais Rentals');
                $message->to($quote->email, $quote->name);
                $message->subject($subject);
            });

            $sendMailToOffice = Mail::send('emails.quote', compact('quote', 'extraCharges', 'productLocation', 'subject'), function($message) use ($quote, $subject) {
                $message->from($quote->email, $quote->name);
                // dd();
                if($quote->has_products){
                    $message->to('sales@gervaisrentals.com', 'Gervais Rentals');
                    // $message->cc('harrison@gervaisrentals.com', 'Harrison');
                } else {
                    $message->to('sales@gervaisrentals.com', 'Gervais Rentals');
                    // $message->bcc('harrison@gervaisrentals.com', 'Harrison');
                }

                $message->subject($subject);
            });
            
            if(!$sendMailToUser || !$sendMailToOffice){
                Mail::send('emails.quote', compact('quote', 'extraCharges', 'productLocation', 'subject'), function($message) use ($quote, $subject) {
                    $message->from('noreply@gervaisrentals.com', $quote->name);

                    if($quote->has_products){
                        $message->to('sales@gervaisrentals.com', 'Gervais Rentals');
                        // $message->cc('harrison@gervaisrentals.com', 'Harrison');
                    } else {
                        $message->to('sales@gervaisrentals.com', 'Gervais Rentals');
                        // $message->bcc('harrison@gervaisrentals.com', 'Harrison');
                    }

                    $message->subject($subject);
                });
            }

            Session::flash('noti', ['type' => 'success', 'msg' => "Quote sent successfully. Copy has been sent to $quote->email"]);
            if(Session::has('product_quantity')) Session::forget('product_quantity');
            return redirect()->action('Front\PageController@getPrintQuote', [$quote->id]);
        }
    }

    public function getPrintQuote($id)
    {
        $quote =  Quote::findOrFail($id);
        $productDetails  = Product::find($quote->products->lists('product_id')->toArray());
        $productQuantity = $quote->products->lists('quantity', 'product_id')->toArray();
        $extraCharges    = ExtraCharge::all();
        $productLocation = $this->productLocation;

        return view('front.pages.print-quote', compact('quote', 'productDetails', 'extraCharges', 'productLocation', 'productQuantity'));
    }

    public function getFaq()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $faqs = Faq::active()->orderBy('sort_order')->get();
        return view('front.pages.faq', compact('categories', 'faqs'));
    }

    public function getContactUs()
    {
        $contactUs = true;
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.contact-us', compact('categories', 'contactUs'));
    }

    public function getCareers()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.careers', compact('categories'));
    }

    public function getSitemap()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        $rentals = Category::find([3, 2, 4, 12, 7, 1, 6, 9, 8, 5, 49]);
        $linens = Category::find([18, 19, 16, 17, 21, 24, 25, 20, 14]);
        $tents = Category::find([23, 22]);
        return view('front.pages.sitemap', compact('categories', 'rentals', 'linens', 'tents'));
    }

    public function getEmployment()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.employment', compact('categories', 'tentHeater'));
    }

    public function getweddingRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.wedding', compact('categories'));
    }

    public function getweddingBackyardMicroRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.backyard-micro-wedding', compact('categories'));
    }

    public function getCorporateEventRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.corporate-event-rentals', compact('categories'));
    }

    public function getPartyRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.party-rentals', compact('categories'));
    }

    public function getFallFestivalRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.fall-festival-rentals', compact('categories'));
    }

    public function getTradeshowBoothRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.tradeshow-booth-rentals', compact('categories'));
    }

    public function getStPatricksDayRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.st-patricks-day-rentals', compact('categories'));
    }

    public function getValentinesDayRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.valentines-day-rentals', compact('categories'));
    }

    public function getMothersDayRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.mothers-day-rentals', compact('categories'));
    }

    public function getCanadaDayRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.canada-day-rentals', compact('categories'));
    }

    public function getEventKawarthaLakesRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.event-rentals-kawartha-lakes', compact('categories'));
    }

    public function getEventLindsayRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.event-rentals-lindsay', compact('categories'));
    }

    public function getEventRentalsBowmanville()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();

        return view('front.pages.event-rentals-bowmanville', compact('categories'));
    }

    public function getWhatsNew()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        //$tentHeater = Category::find(1);
        return view('front.pages.whats-new', compact('categories', 'tentHeater'));
    }

    public function getSearch()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.search', compact('categories'));
    }

    public function getPackageRequest(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        $eventTypesData = ['Wedding Reception', 'Wedding Ceremony', 'Staff BBQ', 'Birthday Party', 'Grand Opening', 'Corporate Event', 'Other Event'];
        $eventTypes = ['' => '--Type Of Event--'] + array_combine($eventTypesData, $eventTypesData);
        $addOns = ['grass_installation', 'pavement_installation'];

        return view('front.pages.package-request', compact('categories', 'eventTypes', 'addOns'));
    }


    public function postPackageRequest(Request $request){
        $validator = $this->validate($request, [
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $subject = "Gervais Custom Package Request";
        //return view('emails.quote-tent', $request->all() + ['subject' => $subject]);

        if(Mail::send('emails.quote-tent', $request->all() + ['subject' => $subject], function($message) use ($subject, $request) {
                $message->from('sales@gervaisrentals.com', 'Gervais Rentals');
                $message->to($request->email, $request->name);
                $message->subject($subject);

            }) && Mail::send('emails.quote-tent', $request->all() + ['subject' => $subject], function($message) use ($subject, $request) {
                $message->from($request->email, $request->name);
                

                $message->to('sales@gervaisrentals.com', 'Sales');
                // $message->bcc('harrison@gervaisrentals.com', 'Harrison');
                $message->subject($subject);
            })) {

                Session::flash('noti', ['type' => 'success', 'msg' => "Custom package request successfully. Copy has been sent to $request->email"]);
                return redirect()->action('Front\PageController@getPackageRequest');
            }
    }

    public function getTentEnquiry(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        $eventTypesData = ['Wedding Reception', 'Wedding Ceremony', 'Staff BBQ', 'Birthday Party', 'Grand Opening', 'Corporate Event', 'Other Event'];
        $eventTypes = ['' => '--Type Of Event--'] + array_combine($eventTypesData, $eventTypesData);
        $addOns = ['standup_cocktail', 'grass_installation', 'pavement_installation', 'lighting', 'heating', 'flooring', 'dance_floor', 'tables', 'chairs', 'dishes_cutlery', 'linen'];

        return view('front.pages.tent-enquiry', compact('categories', 'eventTypes', 'addOns'));
    }

    public function postTentEnquiry(Request $request){
        $validator = $this->validate($request, [
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $subject = "Gervais Tent Quote";
        //return view('emails.quote-tent', $request->all() + ['subject' => $subject]);

        if(Mail::send('emails.quote-tent', $request->all() + ['subject' => $subject], function($message) use ($subject, $request) {
                $message->from('sales@gervaisrentals.com', 'Gervais Rentals');
                $message->to($request->email, $request->name);
                $message->subject($subject);

            }) && Mail::send('emails.quote-tent', $request->all() + ['subject' => $subject], function($message) use ($subject, $request) {
                $message->from($request->email, $request->name);
                

                $message->to('sales@gervaisrentals.com', 'Sales');
                // $message->bcc('harrison@gervaisrentals.com', 'Harrison');
                $message->subject($subject);
            })) {

                Session::flash('noti', ['type' => 'success', 'msg' => "Enquiry booked successfully. Copy has been sent to $request->email"]);
                return redirect()->action('Front\PageController@getTentEnquiry');
            }
    }

    /*public function getHoursOfOperation()
    {
        return view('front.pages.hours-of-operation');
    }*/

    public function getStepsToPrepareQuote()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.steps-to-prepare-quote', compact('categories'));
    }

    public function getThanksgivingRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.thanksgiving', compact('categories'));
    }

    public function getConvocationGraduationRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.convocation-graduation-rentals', compact('categories'));   
    }

    public function getPassoverRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.passover-rentals', compact('categories'));   
    }

    public function getChristmasMarketRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.christmas-market-rentals', compact('categories'));
    }

    public function getNewYearPartyRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.new-year-party-rentals', compact('categories'));   
    }

    public function getChristmasPartyRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.christmas-party-rentals', compact('categories'));   
    }

    public function getBridalShowRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.bridal-show-rentals', compact('categories'));       
    }

    public function getEasterRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.easter-rentals', compact('categories'));   
    }

    public function getMusicFestivalRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.music-festival-rentals', compact('categories'));   
    }

    public function getBbqRentals()
    {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.bbq-rentals', compact('categories'));   
    }

    public function getVaccinationTentRentals(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.vaccination-tent-rentals', compact('categories'));
    }

    public function getOurCaterers(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.our-caterers', compact('categories'));
    }

    public function getOurVenues(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.our-venues', compact('categories'));
    }

    public function getEventRentalsAjax(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-ajax', compact('categories'));
    }

    public function getEventRentalsClarington(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-clarington', compact('categories'));
    }

    public function getOurEventPlanners(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.our-event-planners', compact('categories'));
    }

    public function getEventRentalsCobourgPortHope(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-cobourg-port-hope', compact('categories'));
    }
    public function getEventRentalsNewmarket(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-newmarket', compact('categories'));
    }

    public function getEventRentalsUxbridge(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-uxbridge', compact('categories'));
    }

    public function getEventRentalsPeterborough(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-peterborough', compact('categories'));
    }

    public function getEventRentalsHaliburton(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-haliburton', compact('categories'));
    }

    public function getEventRentalsPrinceEdwardCounty(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-prince-edward-county', compact('categories'));
    }
    
    public function getEventRentalsBelleville(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-belleville', compact('categories'));
    }

    public function getEventRentalsPicton(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-picton', compact('categories'));
    }

    public function getEventRentalsMuskoka(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-muskoka', compact('categories'));
    }

    public function getEventRentalsOshawa(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-oshawa', compact('categories'));
    }

    public function getEventRentalsWhitby(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-whitby', compact('categories'));
    }

    public function getEventRentalsToronto(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-toronto', compact('categories'));
    }

    public function getEventRentalsMarkham(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-markham', compact('categories'));
    }

    public function getEventRentalsScarborough(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-scarborough', compact('categories'));
    }

    public function getEventRentalsPickering(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-pickering', compact('categories'));
    }

    public function getSpecialEventRentals(){
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.special-event-rentals', compact('categories'));
    }

    public function getEventRentalsRichmondHill() {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-richmond-hill', compact('categories'));
    }
	
    public function gethousePartyRentals() {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.house-party-rentals', compact('categories'));
    }

    public function getEventRentalsAurora() {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-wedding-aurora', compact('categories'));
    }
    
    public function getEventRentalsVaughan() {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.event-rentals-wedding-vaughan', compact('categories'));
    }

    public function getWeddingChairRentals() {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.wedding-chair-rentals', compact('categories'));
    }

    public function getDecorRentals() {
        $categories = Category::parents()->orderBy('sort_order')->get();
        return view('front.pages.decor-rental', compact('categories'));
    }
}