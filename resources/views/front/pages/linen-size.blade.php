@extends('front.layout.rsb')

@section('title')Linen Price Listing @stop

@section('left-content')
    @include('front.partials._linen-nav')
    <table class="table table-responsive table-striped table-bordered">
    	<thead>
    		<tr class="info">
    			<th colspan="7" class="text-center lead">Linen Price Listing </th>
    		</tr>
    		<tr>
				<th>Linen Size</th>
				<th>White Linen 1</th>
				<th>White Linen 2</th>
				<th>White Cotton</th>
				<th>Colour Linen</th>
				<th>White Visa Damask</th>
				<th>Ambassador Linen</th>
			</tr>
    	</thead>
		<tbody>
			@foreach($linenSizes as $linenSize)
			    <tr>
			        <td>{{$linenSize->white_linen1}}</td>
					<td>{{$linenSize->white_linen2}}</td>
					<td>{{$linenSize->white_cotton}}</td>
					<td>{{$linenSize->colour_linen}}</td>
					<td>{{$linenSize->white_visa_damask}}</td>
					<td>{{$linenSize->ambassador_linen}}</td>
					<td>{{$linenSize->linen_size}}</td>
			    </tr>
			@endforeach
		</tbody>
    </table>
@stop