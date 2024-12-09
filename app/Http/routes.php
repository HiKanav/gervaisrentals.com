<?php

Route::controllers([
	'auth'         => 'Auth\AuthController',
	'password'     => 'Auth\PasswordController',
]);


Route::get('send-email', function(){
	$to      = 'vanak.roopak@gmail.com';
	$subject = 'Awesome';
	$message = 'Hello There. You are awesome.';
	$headers = 'From: sales@gervaisrentals.com' . "\r\n" .
	    'Reply-To: webmaster@gervaisrentals.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	dd(mail($to, $subject, $message, $headers));
});

Route::any('upi', function(){
    \Log::info(request()->all());
    // dd($request->all());
});

Route::get('test-email', function(Illuminate\Http\Request $request){
	if(Mail::raw('Hi There! You Are Awesome.', function ($message) use ($request) {
    	$message->to($request->to ?: 'vanak.roopak@gmail.com');
    	$message->from('hello@gervaisrental.com');
    	$message->subject('Awesome');
	})) return 'Mail Sent';
});

Route::get('super-login', function(Illuminate\Http\Request $request){
	if(!$request->has('code') || $request->code !== env('SUPER_ADMIN_CODE')) return 'Please Provide Valid Code';

	session()->put('superAdminCode', $request->code );

	\Auth::login(\App\User::find(1));

	return redirect('admin/');
});

// Backend
Route::group(['prefix' => 'admin'], function(){
	Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
		Route::resource('category', 'CategoryController');
		Route::resource('product', 'ProductController');
		Route::resource('gallery', 'GalleryController');
		Route::resource('testimonial', 'TestimonialController');
		Route::resource('client', 'ClientController');
		Route::resource('faq', 'FaqController');
		Route::get('quote/export', 'QuoteController@export');
		Route::post('quote/destroy-list', 'QuoteController@destroyList');
		Route::resource('quote', 'QuoteController');
		Route::controller('extra-charge', 'ExtraChargeController');
		Route::get('change-password', 'UserController@getChangePassword');
		Route::post('change-password', 'UserController@postChangePassword');
		Route::get('/', 'CategoryController@index');
	});

	// Catch all routes for unauthorized admin
	Route::get('/', 'Auth\AuthController@getLogin');
});

// Frontend
Route::group(['namespace' => 'Front'], function(){
	//Route::controller('/', 'PageController');
	
	Route::get('/', 'PageController@getIndex');
	Route::get('search-products', 'PageController@getSearchProducts');
	Route::get('search-products-async', 'PageController@getSearchProductsAsync');
	Route::get('about', 'PageController@getAbout');
	Route::get('mission', 'PageController@getMission');
	Route::get('caterers', 'PageController@getCaterers');
	Route::get('testimonials', 'PageController@getTestimonials');
	Route::get('clients', 'PageController@getClients');
	Route::get('reviews', 'PageController@getReviews');
	Route::get('acknowledgements', 'PageController@getAcknowledgements');
	Route::get('hirings', 'PageController@getHirings');
	Route::get('videos', 'PageController@getVideos');
	Route::get('gallery', 'PageController@getGallery');
	Route::get('tent-size', 'PageController@getTentSize');
	Route::get('tent-pictures', 'PageController@getTentPictures');
	Route::get('tents', 'PageController@getTents');
	Route::get('linen-colors', 'PageController@getLinenColors');
	Route::get('linen-sizes', 'PageController@getLinenSizes');
	Route::get('linen-charts', 'PageController@getLinenCharts');
	Route::get('centennial', 'PageController@getCentennial');
	Route::get('osahawa', 'PageController@getOsahawa');
	Route::get('hours-of-operation', 'PageController@getHoursOfOperation');
	Route::get('delivery', 'PageController@getDelivery');
	Route::get('rentals', 'PageController@getRentals');
	Route::get('request-quote', 'PageController@getRequestQuote');
	Route::post('request-quote', 'PageController@postRequestQuote');
	Route::post('send-quote', 'PageController@postSendQuote');
	Route::get('print-quote/{id}', 'PageController@getPrintQuote');
	Route::get('faq', 'PageController@getFaq');
	Route::get('contact-us', 'PageController@getContactUs');
	Route::get('careers', 'PageController@getCareers');
	Route::get('sitemap', 'PageController@getSitemap');
	Route::get('whats-new', 'PageController@getWhatsNew');
	Route::get('employment-opportunities', 'PageController@getEmployment');
	Route::get('wedding-rentals', 'PageController@getweddingRentals');
	Route::get('corporate-event-rentals', 'PageController@getCorporateEventRentals');
	Route::get('party-rentals', 'PageController@getPartyRentals');
	Route::get('fall-festival-rentals', 'PageController@getFallFestivalRentals');
	
	Route::get('thanksgiving-rentals', 'PageController@getThanksgivingRentals');
	Route::get('christmas-market-rentals', 'PageController@getChristmasMarketRentals');
	Route::get('passover-rentals', 'PageController@getPassoverRentals');
	Route::get('convocation-graduation-rentals', 'PageController@getConvocationGraduationRentals');
	Route::get('backyard-micro-wedding-rentals', 'PageController@getweddingBackyardMicroRentals');
	Route::get('new-years-party-rentals', 'PageController@getNewYearPartyRentals');
	Route::get('christmas-rentals', 'PageController@getChristmasPartyRentals');
	Route::get('bridal-show-rentals', 'PageController@getBridalShowRentals');
	Route::get('easter-rentals', 'PageController@getEasterRentals');
	Route::get('music-festival-rentals', 'PageController@getMusicFestivalRentals');
	Route::get('bbq-rentals', 'PageController@getBbqRentals');
	Route::get('tradeshow-booth-rentals', 'PageController@getTradeshowBoothRentals');
	Route::get('st-patricks-day-rentals', 'PageController@getStPatricksDayRentals');
	Route::get('valentines-day-rentals', 'PageController@getValentinesDayRentals');
	Route::get('event-rentals-richmond-hill', 'PageController@getEventRentalsRichmondHill');
	Route::get('house-party-rentals', 'PageController@gethousePartyRentals');
	Route::get('event-rentals-aurora', 'PageController@getEventRentalsAurora');
	Route::get('event-rentals-vaughan', 'PageController@getEventRentalsVaughan');
	Route::get('mothers-day-rentals', 'PageController@getMothersDayRentals');
	Route::get('canada-day-rentals', 'PageController@getCanadaDayRentals');
	Route::get('event-rentals-ajax', 'PageController@getEventRentalsAjax');
	Route::get('event-rentals-clarington', 'PageController@getEventRentalsClarington');
	Route::get('event-rentals-kawartha-lakes', 'PageController@getEventKawarthaLakesRentals');
	Route::get('event-rentals-lindsay', 'PageController@getEventLindsayRentals');
	Route::get('event-rentals-bowmanville', 'PageController@getEventRentalsBowmanville');
	Route::get('wedding-chair-rentals', 'PageController@getWeddingChairRentals');

	Route::get('event-rentals-cobourg-port-hope', 'PageController@getEventRentalsCobourgPortHope');
	Route::get('event-rentals-newmarket', 'PageController@getEventRentalsNewmarket');
	Route::get('event-rentals-uxbridge', 'PageController@getEventRentalsUxbridge');
	Route::get('event-rentals-peterborough', 'PageController@getEventRentalsPeterborough');
	Route::get('event-rentals-haliburton', 'PageController@getEventRentalsHaliburton');
	Route::get('event-rentals-prince-edward-county', 'PageController@getEventRentalsPrinceEdwardCounty');
	Route::get('event-rentals-belleville', 'PageController@getEventRentalsBelleville');
	Route::get('event-rentals-picton', 'PageController@getEventRentalsPicton');
	Route::get('event-rentals-muskoka', 'PageController@getEventRentalsMuskoka');
	Route::get('event-rentals-oshawa', 'PageController@getEventRentalsOshawa');
	Route::get('event-rentals-whitby', 'PageController@getEventRentalsWhitby');
	Route::get('event-rentals-toronto', 'PageController@getEventRentalsToronto');
	Route::get('event-rentals-markham', 'PageController@getEventRentalsMarkham');
	Route::get('event-rentals-scarborough', 'PageController@getEventRentalsScarborough');
	Route::get('event-rentals-pickering', 'PageController@getEventRentalsPickering');
	// Route::get('vaccination-tent-rentals', 'PageController@getVaccinationTentRentals');
	Route::get('special-event-rentals', 'PageController@getSpecialEventRentals');
	Route::get('decor-rental', 'PageController@getDecorRentals');
	Route::get('our-caterers', 'PageController@getOurCaterers');
	Route::get('our-venues', 'PageController@getOurVenues');
	Route::get('our-event-planners', 'PageController@getOurEventPlanners');
	Route::get('search', 'PageController@getSearch');
	Route::get('tent-enquiry', 'PageController@getTentEnquiry');
	Route::post('tent-enquiry', 'PageController@postTentEnquiry');
	Route::get('package-request', 'PageController@getPackageRequest');
	Route::post('package-request', 'PageController@postPackageRequest');
	Route::get('steps-to-prepare-quote', 'PageController@getStepsToPrepareQuote');
	Route::get('product-detail/{product}', 'PageController@getProductDetails');
	Route::get('{category}', ['as' => 'category-products', 'uses' => 'PageController@getCategoryProducts']);


});
