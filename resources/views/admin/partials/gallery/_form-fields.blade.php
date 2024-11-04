<div class="form-body">
    <div class="form-group">
    	<label class="col-md-3 control-label">Image</label>
        <div class="col-md-4">
            @if(!isset($galleryImage))
               {!!Form::file('main_location', ['required' => 'required'])!!}
            @else 
        	   {!!Form::file('main_location')!!}
            @endif
        </div>
    </div>
    @if(isset($galleryImage))
        <div class="form-group">
        	<label class="col-md-3 control-label">Current Image</label>
            <div class="col-md-4">
            	<img src="{{asset($galleryLocation.'/'.$galleryImage->main_location)}}" class="img-responsive small-thumbnail" alt="">
            </div>
        </div>
    @endif
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
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" type="submit">Submit</button>
        </div>
    </div>
</div>