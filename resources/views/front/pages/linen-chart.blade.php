@extends('front.layout.rsb')

@section('title')Linen Availability @stop

@section('left-content')
    @include('front.partials._linen-nav')
    <table class="table table-responsive table-striped table-bordered">
    	<thead>
    		<tr class="info">
    			<th colspan="9" class="text-center lead">Linen Availability </th>
    		</tr>
    		<tr class="warning">
    			<th colspan="9" class="text-center"><a href="{{asset('imgs/linen-availability-2015.pdf')}}">Dowload Detailed Linen Chart PDF</a></th>
    		</tr>
    		<tr>
				<th>Color</th>
				<th>54 X 54</th>
				<th>72 X 72</th>
				<th>85 X 85</th>
				<th>54 X 120</th>
				<th>72 X 144</th>
				<th>90 X 144</th>
				<th>96"RND</th>
				<th>120" RND</th>
			</tr>
    	</thead>
		<tbody>
			@foreach($linenCharts as $linenChart)
			    <tr>
					<td style="color: white" background="{{asset($linenLocation.'/'.$linenChart->thumbnail_location)}}">{{$linenChart->name}}</td>
					<td>{{$linenChart['54 X 54']}}</td>
					<td>{{$linenChart['72 X 72']}}</td>
					<td>{{$linenChart['85 X 85']}}</td>
					<td>{{$linenChart['54 X 120']}}</td>
					<td>{{$linenChart['72 X 144']}}</td>
					<td>{{$linenChart['90 X 144']}}</td>
					<td>{{$linenChart['96"RND']}}</td>
					<td>{{$linenChart['120" RND']}}</td>
			    </tr>
			@endforeach
		</tbody>
    </table>
@stop