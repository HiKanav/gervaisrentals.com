@extends('front.layout.rsb')

@section('title')Tent Enquiry @stop

@section('css')
    <link href="{{ asset('libs/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
@stop

@section('left-content')
    <h2>Tent Enquiry</h2>
    <p>Please fill out the following form below and one of our knowledgable Tent Professionals will contact you and assist you through the tent rental process.</p>
    <p><strong>Contact Information</strong></p>
    
    {!! Form::open(['action' => 'Front\PageController@postTentEnquiry', 'id' => 'form']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('name', null, ['placeholder' => 'John', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'name'])!!}
                <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('name')) 
                <span class="error">{{$errors->first('name')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="you@awesome.com" value="{{ old('email') }}" required>

                <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('email')) 
                <span class="error">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('phone', null, ['placeholder' => '123-456-7890', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'phone'])!!}
                <span class="glyphicon glyphicon-earphone form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('phone')) 
                <span class="error">{{$errors->first('phone')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('event_at', null, ['placeholder' => 'Event Date', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'event_at'])!!}
            </div>
            @if($errors->has('event_at')) 
                <span class="error">{{$errors->first('event_at')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('delivery_postal_code', null, ['placeholder' => 'Delivery Postal Code', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'delivery_postal_code'])!!}
                <span class="fa fa-map-pin form-control-feedback">
                    <!-- <i class="fa fa-map-pin" aria-hidden="true"></i> -->
                </span>
            </div>
            @if($errors->has('delivery_postal_code')) 
                <span class="error">{{$errors->first('delivery_postal_code')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="number" name="guest_no" id="guest_no" placeholder="No. Of Guests" class="form-control input-lg" min="1" value="{{ old('guest_no') }}" required>
                {{-- {!!Form::text('guest_no', null, ['placeholder' => 'No. Of Guests', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'guest_no'])!!} --}}
                <span class="fa fa-group form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('guest_no')) 
                <span class="error">{{$errors->first('guest_no')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!!Form::select('event_type', $eventTypes, old('event_type'), ['class' => 'form-control input-lg', 'required' => 'required', 'id' => 'event_type'])!!}
            </div>
            @if($errors->has('event_type')) 
                <span class="error">{{$errors->first('event_type')}}</span>
            @endif
        </div>
        
        <div class="col-md-6 col-md-offset-3"><hr></div>
        
        @foreach($addOns as $addOn)
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-xs-9 h4" for="{{$addOn}}">{{ucwords(implode(' ', explode('_', $addOn))) }}</label>
                    <div class="col-xs-3">
                        {!!Form::checkbox('addons[]', ucwords(implode(' ', explode('_', $addOn))), false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => "$addOn"])!!}
                    </div>
                </div>
            </div>
        @endforeach
        
        <div class="col-md-6 col-md-offset-3"><hr></div>

        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                {!! Form::textarea('comments', old('comments'), ['class' => 'form-control', 'placeholder' => 'Please enter your requirement here...', 'rows' => 5, 'required' => true]) !!}
            </div>
        </div>

        {{-- <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="standup_cocktail">Standup Cocktail</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('standup_cocktail', 'hello', false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'standup_cocktail'])!!}
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="grass_installation">Grass Installation</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('grass_installation', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'grass_installation'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="pavement_installation">Pavement Installation</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('pavement_installation', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'pavement_installation'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="lightning">Lightning</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('lightning', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'lightning'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="heating">Heating</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('heating', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'heating'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="flooring">Flooring</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('flooring', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'flooring'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="dance_floor">Dance Floor</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('dance_floor', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'dance_floor'])!!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="tables">Tables</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('tables', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'tables'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="chairs">Chairs</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('chairs', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'chairs'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="dishes_cutlery">Dishes Cutlery</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('dishes_cutlery', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'dishes_cutlery'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="linen">Linen</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('linen', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => 'linen'])!!}
                </div>
            </div>
            
            <div class="form-group">
                    {!! Form::textarea('comments', old('comments'), ['class' => 'form-control', 'placeholder' => 'Please enter your requirement here...', 'rows' => 5]) !!}
            </div>
        </div> --}}
        
        <div class="col-md-6 col-md-offset-3"><hr></div>

        <div class="col-md-4 col-md-offset-4 text-center">
            <div class="form-group">
                <!-- <label for="name">Message</label> -->
                <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                {!! Recaptcha::render() !!}
                
                @if($errors->has('g-recaptcha-response')) 
                    <span class="error">Captcha Validation failed! Try again.</span>
                @endif
            </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
            <button class="btn btn-lg btn-block btn-primary" type="submit">Send Enquiry</button>
        </div>
        
    </div>
    {!! Form::close() !!}
@stop

@section('js')
    <script src="{{ asset('libs/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src={{asset("default/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}} type="text/javascript"></script>
    <script>
        $(function(){
            $(".bootstrap-switch").bootstrapSwitch({onText: 'Yes', offText: 'No'});
            $('#event_at').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                sideBySide: true
            });
            //$("#form").validate();
        })
    </script>
@stop