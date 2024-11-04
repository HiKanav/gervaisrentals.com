@extends('front.layout.rsb')

@section('title')Watch Our Videos @stop

@section('left-content')
    <h2>Watch Our Videos</h2>
    <div class="embed-responsive embed-responsive-4by3 margnleft_margnright">
      <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/354695309?portrait=0"></iframe>
    </div>
	<hr>
    <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/CR4CiKA7v1o?start=434"></iframe>
    </div>
    <hr>
	<div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
        	<source src="https://gervaisrentals.com/video/53f9c74e115a4be087e9461421f9f774.MOV" type="video/mp4">
        </video>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/christmas-aspen.mp4" type="video/mp4">
        </video>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3" style="margin-top: -40px;">
        <video class="embed-responsive-item" controls>
        	<source src="https://gervaisrentals.com/video/toronto-police-salute.mp4" type="video/mp4">
        </video>
    </div>
     <p>Toronto Police gives a grand salute to the health care workers during COVID-19. This one was taken at Birchmount hospital, formally Grace Hospital as we played a small part by supplying a tent.</p>
    <hr>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/wedding-goals.mov" type="video/mp4">
        </video>
    </div>
	<hr>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/seating-arrangement.mov" type="video/mp4">
        </video>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/25k.mov" type="video/mp4">
        </video>
    </div>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/IMG_8309.mp4" type="video/mp4">
        </video>
    </div>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/IMG_8312.mp4" type="video/mp4">
        </video>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3" style="margin-top: -40px;">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/tent-under-church.mov" type="video/mp4">
        </video>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3 margnleft_margnright">
      <iframe src='//players.brightcove.net/2226196965001/xj6FdmiBa_default/index.html?videoId=6314676012112' allowfullscreen frameborder=0></iframe>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/gervais-xmas-promo.mp4" type="video/mp4">
        </video>
    </div>
    <hr>
    <div class="embed-responsive embed-responsive-4by3">
        <video class="embed-responsive-item" controls>
            <source src="https://gervaisrentals.com/video/nn-interview-sophia-megan.mp4" type="video/mp4">
        </video>
    </div>
    <h2 class="text-center">Al Gervais Chair & Table - Lottery Winner</h2>
	<div class="row text-center">
		<div class="col-md-12">
		    <audio controls>
			    <source src="{{asset('video/al-gervais-chair-table-lottery-winner.mp3')}}" type="audio/mpeg">
		    </audio> 
		</div>
	</div>
	<hr>
    <h2 class="text-center">Al Gervais Chair & Table - Saul Ad</h2>
	<div class="row text-center">
		<div class="col-md-12">
		    <audio controls>
			    <source src="{{asset('video/al-gervais-chair-table-saul-ad.mp3')}}" type="audio/mpeg">
		    </audio> 
		</div>
	</div>
@stop