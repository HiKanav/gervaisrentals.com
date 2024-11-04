<div class="form-body">

    {!! HTML::form_field('Question', Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'By what time will my delivery be made?', 'required' => 'required'])) !!}

    {!! HTML::form_field('Answer', Form::textarea('answer', null, ['class' => 'form-control', 'placeholder' => 'Deliveries are made during regular business hours.', 'required' => 'required', 'id' => 'summernote'])) !!}

    {!!HTML::form_field('Active', Form::select('active', $active['options'], null, ['class' => 'form-control', 'required' => 'required']))!!}
    
    {!!HTML::form_field('Sort Order', Form::text('sort_order', null, ['class' => 'form-control', 'placeholder' => '123', 'required' => 'required']))!!}
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" type="submit">Submit</button>
        </div>
    </div>
</div>