@extends('admin.layout.list')

@section('title') Clients @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ClientController@index')}}">Clients</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All</span>
    </li>
@stop

@section('subject') Clients @stop

@section('extra-btn')
	<a href="{{action('Admin\ClientController@create')}}" class="btn purple-sharp btn-outline sbold uppercase">New</a> 
@stop

@section('table-content')
	<thead>
	    <tr>
	        <th> Client Id </th>
	        <th> Description </th>
	        <th> Thumbnail </th>
	        <th> Sort Order </th>
	        <th> Active </th>
	        <th> Actions </th>
	    </tr>
	</thead>
	<tbody>
	    @foreach($clients as $client)
			<tr>
	            <td> {{ $client->id }} </td>
	            <td> {{ $client->description }} </td>
	            <td> <img src="{{asset($clientLocation.'/'.$client->thumbnail_location)}}" class="img-responsive small-thumbnail"> </td>
	            <td> {{ $client->sort_order }} </td>
	            <td> {{ $client->active ? 'Y' : 'N' }} </td>
	            <td>
	                <div class="margin-bottom-5">
	                    <a href="{{action('Admin\ClientController@edit', [$client->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
	                </div>
	                {!!Form::open(['action' => ['Admin\ClientController@destroy', $client->id], 'method' => 'DELETE'])!!}
	                	{!!Form::submit('Delete', ['class' => 'btn btn-sm red btn-outline filter-cancel', 'onclick' => 'return confirm("Are you sure?")'])!!}
	                {!!Form::close()!!}
	            </td>
	        </tr>
	    @endforeach
	</tbody>
@stop

@section('page-level-js')
	<script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script>
@stop