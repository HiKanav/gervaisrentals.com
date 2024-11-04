<div class="form-body">

    {!! HTML::form_field('Description', Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'BMW', 'required' => 'required'])) !!}

    {!!HTML::form_field('Active', Form::select('active', $active['options'], null, ['class' => 'form-control', 'required' => 'required']))!!}
    
    {!!HTML::form_field('Sort Order', Form::text('sort_order', null, ['class' => 'form-control', 'placeholder' => '1', 'required' => 'required']))!!}

    
    @if(!isset($client))
        {!!HTML::form_field('Thumbnail', Form::file('thumbnail_location', ['required' => 'required']))!!}
        {!!HTML::form_field('Logo', Form::file('file_location', ['required' => 'required']))!!}
    @else 
        {!!HTML::form_field('Thumbnail', Form::file('thumbnail_location'))!!}
        {!!HTML::form_field('Logo', Form::file('file_location'))!!}
    @endif

    @if(isset($client))
        <div class="form-group">
        	<label class="col-md-3 control-label">Current Thumbnail</label>
            <div class="col-md-4">
            	<img src="{{asset($clientLocation.'/'.$client->thumbnail_location)}}" class="img-responsive small-thumbnail" alt="">
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