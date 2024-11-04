@extends('front.layout.rsb')

@section('title')Hours Of Operation @stop

@section('left-content')
    <h2>Hours Of Operation</h2>
    <!-- <h3 class="text-danger">SHOWROOM CLOSED DUE TO COVID-19, alternatively please feel free to call us at <a href="tel:416.288.1846">416.288.1846</a></h3> -->
    <h4 style="font-size: 21px;">Visits to our showroom by appointment only</h4>
    {{-- <p style="color:#1072BD"><strong>Our showroom will be closed to the public from January 5th to January 14th for renovations to serve you better</strong></p> --}}
    {{-- <img src="{{ asset('imgs/christmas-hours-2018-2019.jpg') }}" alt="" class="img-responsive"> --}}
    <table class="table table-responsive table-striped table-bordered">
    	{{-- <thead>
    		<tr class="info">
    			<th colspan="2" class="text-center lead">Holiday Hours 2016/2017</th>
    		</tr>
    	</thead>	
		<tbody>
		    <tr>
			    <td>Monday  December 19th</td>
			    <td>8:30 am – 6:00 pm</td>
			</tr>
			<tr>
			    <td>Tuesday December 20</td>
			    <td>8:30 am – 5:30 pm</td>
			</tr>
			<tr>
			    <td>Wednesday December 21st</td>
			    <td>8:30 am – 5:30 pm</td>
			</tr>
			<tr>
			    <td>Thursday December 22nd</td>
			    <td>8:30 am – 5:30 pm</td>
			</tr>
			<tr>
			    <td>Friday December 23rd</td>
			    <td>8:30 am – 6:00 pm</td>
			</tr>
			<tr>
			    <td>Saturday December 24th</td>
			    <td>CLOSED</td>
			</tr>
			<tr>
			    <td>Sunday December 25th</td>
			    <td>CLOSED</td>
			</tr>
			<tr>
			    <td>Monday December 26th</td>
			    <td>CLOSED</td>
			</tr>
			<tr>
			    <td>Tuesday December 27th</td>
			    <td>8:30 am – 7:00 pm</td>
			</tr>
			<tr>
			    <td>Wednesday December 28th</td>
			    <td>8:30 am – 5:30 pm</td>
			</tr>
			<tr>
			    <td>Thursday December 29th</td>
			    <td>8:30 am – 5:30 pm</td>
			</tr>
			<tr>
			    <td>Friday December 30th</td>
			    <td>8:30 am – 6:00 pm</td>
			</tr>
			<tr>
			    <td>Saturday December 31st</td>
			    <td>CLOSED</td>
			</tr>
			<tr>
			    <td>Sunday January 1st</td>
			    <td>CLOSED</td>
			</tr>
			<tr>
			    <td>Monday January 2nd</td>
			    <td>CLOSED</td>
			</tr>
			<tr>
			    <td>Tuesday  January 3rd</td>
			    <td>8:30 am – 6:00 pm</td>
			</tr>
		</tbody> --}}
		<thead>
    		<tr class="info">
    			<th colspan="3" class="text-center lead">Winter Hours - January to May</th>
    		</tr>
    	</thead>
		<tbody>
			<tr>
				<td>Monday</td>
				<td>9:00 am</td>
				<td>6:00 pm</td>
			</tr>
			<tr>
				<td>Tuesday</td>
				<td>9:00 am</td>
				<td>5:00 pm</td>
			</tr>
			<tr>
				<td>Wednesday</td>
				<td>9:00 am</td>
				<td>5:00 pm</td>
			</tr>
			<tr>
				<td>Thursday</td>
				<td>9:00 am</td>
				<td>5:00 pm</td>
			</tr>
			<tr>
				<td>Friday</td>
				<td>9:00 am</td>
				<td>5:00 pm</td>
			</tr>
			<tr>
				<td>Saturday</td>
				<td>9:00 am</td>
				<td>3:00 pm</td>
			</tr>
			<tr>
				<td>Sunday</td>
				<td colspan="2">Closed</td>
			</tr>
			<tr class="info">
    			<th colspan="3" class="text-center lead">Summer/Fall Hours - June to December</th>
    		</tr>
			<tr>
				<td>Monday</td>
				<td>9:00 am</td>
				<td>6:00 pm</td>
			</tr>
			<tr>
				<td>Tuesday</td>
				<td>9:00 am</td>
				<td>5:30 pm</td>
			</tr>
			<tr>
				<td>Wednesday</td>
				<td>9:00 am</td>
				<td>5:30 pm</td>
			</tr>
			<tr>
				<td>Thursday</td>
				<td>9:00 am</td>
				<td>5:30 pm</td>
			</tr>
			<tr>
				<td>Friday</td>
				<td>9:00 am</td>
				<td>6:00 pm</td>
			</tr>
			<tr>
				<td>Saturday</td>
				<td>9:00 am</td>
				<td>5:00 pm</td>
				<!-- <td colspan="2">CLOSED</td> -->
			</tr>
			<tr>
				<td>Sunday ( Customer returns only )</td>
				<td>11:00 am</td>
				<td>3:00 pm</td>
				<!-- <td colspan="2" class="text-danger">CLOSED</td> -->
				{{-- <td colspan="2" class="text-danger">Office closed, Warehouse open from 9 am – 3pm for customer returns only – no pick up orders</td> --}}
			</tr>
		</tbody>
    </table>
@stop