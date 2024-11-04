@extends('front.layout.rsb')

@section('title')Rentals @stop

@section('left-content')
    <h2>Party Equipment Rentals</h2>
    <p>Ensure that your upcoming wedding, gala, corporate event or other occasion is well appointed and welcoming to your guests, with party equipment rentals from Gervais Party & Tent Rental. We offer an incredible selection of high quality items, from tents to flooring, table linens and dishware, cooking utensils, beverage fountains, lounge furniture and much much more.</p>

    <p>We can help you set the stage for any event and theme, whether you’re planning a spectacular Sweet 16 party, an outdoor wedding, corporate event, or gala. Our extensive selection of equipment, furnishings, tents and knowledgeable staff can help take your vision and turn it into an unforgettable event.</p>

    <p><strong>Party Tent Rentals</strong></p>

    <p>Ensure that your outdoor event is comfortable and elegant by installing one of our frame or pole style party tents. We carry several different sizes and styles to suit most any event, along with window-appointed sidewalls, flooring, heaters, chandeliers and much more.</p>

    <p>For your convenience, we also offer Tent Packages. The items available with all tent packages include:</p>

    <ul>
        <li>Tent</li>
        <li>Tables</li>
        <li>Chairs</li>
        <li>Tent Sides</li>
        <li>Lighting</li>
        <li>Dance floor</li>
        <li>Site Inspection</li>
        <li>Installation</li>
    </ul>

    <p>Simply choose the package that represents the number of expected guests. Tent package costs are per person. Deluxe upgrades and Wedding upgrades are also available.</p>

    <p><strong>Ordering from us is easy!</strong></p>

    <p>It’s easy to rent party equipment from Gervais. Simply browse through our online inventory listings and select the items you need. Then, submit them for an online quote to see your total. When you’re satisfied with your amount, simply call your order in at 1-888-437-8247</p>

    <p><a href="{{action('Front\PageController@getContactUs')}}">Contact Gervais Party &amp; Tent Rentals today</a>, and let us help you set the stage for a memorable event!</p>
    
    {!!HTML::catalog('Rental Categories', $categories, $categoryLocation, ['is_href_img' => false, 'href' => 'file_location', 'src' => 'thumbnail_location', 'title' => 'name'], 'col-md-2 col-sm-2 col-xs-6')!!}

    {{--
    <div class="col-md-12 catalogue-2">
        <div class="col-xs-8 col-md-8 col-sm-6 rent-img rent-2">
            <h3>Rental Categories</h3>
            <a href="#"><img src={{asset("default/front/imgs/rental-title.jpg")}} alt=""></a> </div>
    </div>
    <div class="row rentel-cal about-col">
        <div class="col-md-12">
		    <div class="product">
		    	@foreach($categories as $category)
					<div class="col-md-3 col-sm-2 col-xs-6 rent party"> 
                        <div class="col-in-row">
                            <a href="{{route('category-products', [$category->route_name])}}"><img src="{{asset($categoryLocation.'/'.$category->thumbnail_location)}}" alt="{{$category->name}}"></a>
                        </div>
                        <div class="catalogue-text">
                            <p class="text-center">{{$category->name}}</p>
                        </div>
                    </div>
				@endforeach
            </div>
        </div>
    </div>
    --}}
@stop