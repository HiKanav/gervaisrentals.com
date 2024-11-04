<div class="form-body">
    <div class="form-group">
        <label class="col-md-3 control-label">Name</label>
        <div class="col-md-4">
        	{!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Chairs', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Description</label>
        <div class="col-md-4">
        	{!!Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'We offer many types of chairs...', 'rows' => 4, 'required' => 'required'])!!}
        </div>
    </div>
    
    <hr>

    <div class="form-group">
        <label class="col-md-3 control-label"><b>Note For Quantity Section</b></label>
        <div class="col-md-4">
            <p class="form-control-static">Leave it blank in order to apply the parent Category's quantity settings</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Minimum Quantity</small></label>
        <div class="col-md-4">
            {!!Form::text('quantity_minimum', null, ['class' => 'form-control', 'placeholder' => ''])!!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Maximum Quantity</label>
        <div class="col-md-4">
            {!!Form::text('quantity_maximum', null, ['class' => 'form-control', 'placeholder' => ''])!!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Quantity Interval</label>
        <div class="col-md-4">
            {!!Form::text('quantity_interval', null, ['class' => 'form-control', 'placeholder' => ''])!!}
        </div>
    </div>

    <hr>
    
    <div class="form-group">
    	<label class="col-md-3 control-label">Route Name</label>
        <div class="col-md-4">
        	{!!Form::text('route_name', null, ['class' => 'form-control', 'placeholder' => 'category.htm', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
    	<label class="col-md-3 control-label">Parent Category</label>
        <div class="col-md-4">
        	{!!Form::select('parent_category_id', $parents, null, ['class' => 'form-control', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
    	<label class="col-md-3 control-label">Status</label>
        <div class="col-md-4">
        	{!!Form::select('active', $active['options'], null, ['class' => 'form-control', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Sort Order</label>
        <div class="col-md-4">
            {!!Form::text('sort_order', null, ['class' => 'form-control', 'placeholder' => '123', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
    	<label class="col-md-3 control-label">Thumbnail</label>
        <div class="col-md-4">
            @if(!isset($category))
               {!!Form::file('thumbnail_location', ['required' => 'required'])!!}
            @else 
        	   {!!Form::file('thumbnail_location')!!}
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Title</label>
        <div class="col-md-4">
            {!!Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Accessories'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Meta Title</label>
        <div class="col-md-4">
            {!!Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Dining Table Accessories'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Meta Description</label>
        <div class="col-md-4">
            {!!Form::text('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Accessories & Decorations Rentals From Gervais Party Rentals.'])!!}
        </div>
    </div>
    @if(isset($category))
        <div class="form-group">
        	<label class="col-md-3 control-label">Current Thumbnail</label>
            <div class="col-md-4">
            	<img src="{{asset($categoryLocation.'/'.$category->thumbnail_location)}}" class="img-responsive small-thumbnail" alt="">
            </div>
        </div>
    @endif
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" type="submit">Submit</button>
        </div>
    </div>
</div>