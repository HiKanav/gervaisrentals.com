@extends('front.layout.rsb')

@section('title')Steps To Prepare Quote @stop

@section('meta-title')Party & Event Rental Supply Company | Gervais Party Rentals @stop
@section('meta-description')Only Work With The Best With Party & Event Rentals From Gervais Party Rentals.  Contact Us Today To Get A Quote 1-888-437-8247.@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
@stop

@section('left-content')
    <h2>Steps To Prepare Quote</h2>

    <p>Thank you for visiting Gervais Party & Tent Rentals, you can prepare an online quote very easily in few steps</p>

    <p><b>1.</b> Select the Categories of Rental products of your choice</p>
    <p><b>2.</b> Select the rental product and enter the quantity you would like a quote.</p>
    <p><b>3.</b> Click add for the rental product (You can type 0 in the quantity of the rental product to clear the rental product from your quote)</p>
    <p><b>4.</b> Click continue shopping to surf the other web page categories</p>
    <p><b>5.</b> When you are done fill in the form and click request quote.  A copy will be sent to your email and a copy sent to our sales department.</p>

    <p>If you would like to confirm your quote to an actual rental order please call our office at <strong><a href="tel:4162881846">416-288-1846</a></strong>.</p>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img class="img-responsive" src="{{ asset('imgs/steps-to-book-quote.jpg') }}" alt="Steps-To-Book">
        </div>
    </div>

    <p>We wish you happy surfing and enjoy the Gervais Rentals online experience.  If we do not carry a product you see please feel free to click <a href="{{action('Front\PageController@getContactUs', '#form')}}"> Contact Us</a></p>
    <hr>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="{{action('Front\PageController@getRentals')}}" class="btn btn-block btn-primary btn-lg">Proceed To Rental Catalog</a>
        </div>
    </div>
    <hr>
@stop

@section('js')
    
@stop