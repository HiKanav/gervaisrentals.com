<div class="form-body">

    {!! HTML::form_field('New Password', Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'required' => 'required', 'id' => 'password'])) !!}

    {!! HTML::form_field('Confirm Password', Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Your Password', 'required' => 'required', 'id' => 'password_confirmation'])) !!}
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" type="submit">Submit</button>
        </div>
    </div>
</div>