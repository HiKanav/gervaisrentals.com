{!!Form::open(['action' => 'Front\PageController@getSearchProducts', 'method' => 'GET', 'id' => 'search_form'])!!}
    <input type="search" name="query" id="query" placeholder="Search By Product Name" class="form-control" autocomplete="off">
{!!Form::close()!!}