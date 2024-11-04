<div class="form-body">
	@foreach($extraCharges as $extraCharge)
		{!! HTML::form_field($extraCharge->name.' (in %)', Form::text($extraCharge->slug, $extraCharge->price, ['class' => 'form-control', 'placeholder' => '1.23', 'required' => 'required'])) !!}
	@endforeach
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" type="submit">Submit</button>
        </div>
    </div>
</div>