@extends('front.layout.rsb')

@section('title')Custom Package Request @stop

@section('css')
    <link href="{{ asset('libs/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
@stop

@section('left-content')
    <h2>Custom Package Request</h2>
    <p>Please fill out the following form below and one of our knowledgable Tent Professionals will contact you and assist you through the tent rental process.</p>
    <p><strong>Contact Information</strong></p>
    
    {!! Form::open(['action' => 'Front\PageController@postPackageRequest', 'id' => 'form']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('name', null, ['placeholder' => 'First Name', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'name'])!!}
                <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('name')) 
                <span class="error">{{$errors->first('name')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'last_name'])!!}
                <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('last_name')) 
                <span class="error">{{$errors->first('last_name')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Enter Email" value="{{ old('email') }}" required>

                <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('email')) 
                <span class="error">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('phone', null, ['placeholder' => 'Enter Phone Number', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'phone'])!!}
                <span class="glyphicon glyphicon-earphone form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('phone')) 
                <span class="error">{{$errors->first('phone')}}</span>
            @endif
        </div>
        
        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('major_intersections', null, ['placeholder' => 'Major Intersections', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'major_intersections'])!!}
                <span class="glyphicon glyphicon-scale form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('major_intersections')) 
                <span class="error">{{$errors->first('major_intersections')}}</span>
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'city'])!!}
                <i class="fa fa-city form-control-feedback"></i><!-- <span class="fa fa-city form-control-feedback" aria-hidden="true"></span> -->
            </div>
            @if($errors->has('city')) 
                <span class="error">{{$errors->first('city')}}</span>
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
                {!!Form::text('event_at', null, ['placeholder' => 'Date of Event', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'event_at'])!!}
                <span class="form-control-feedback"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            </div>
            @if($errors->has('event_at')) 
                <span class="error">{{$errors->first('event_at')}}</span>
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
            <div class="form-group has-feedback">
                {!!Form::text('tent_size', null, ['placeholder' => 'Tent Sizes', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'tent_size'])!!}
                <span class="glyphicon glyphicon-tent form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('tent_size')) 
                <span class="error">{{$errors->first('tent_size')}}</span>
            @endif
        </div>
        
        <div class="col-md-6">
            <div class="form-group has-feedback">
                {!!Form::text('venue_name', null, ['placeholder' => 'Venue Name', 'class' => 'form-control input-lg', 'required' => 'required', 'id' => 'venue_name'])!!}
                <span class="glyphicon glyphicon-send form-control-feedback" aria-hidden="true"></span>
            </div>
            @if($errors->has('venue_name')) 
                <span class="error">{{$errors->first('venue_name')}}</span>
            @endif
        </div>

        <div class="col-md-6 col-md-offset-3"><hr></div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="dance_floor">Dance floor in Tent</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('dance_floor', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => "dance_floor"])!!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-9 h4" for="interior_tent_lighting">Interior Tent Lighting</label>
                <div class="col-xs-3">
                    {!!Form::checkbox('interior_tent_lighting', true, false, ['data-size' => 'small', 'class' => 'form-control bootstrap-switch', 'id' => "interior_tent_lighting"])!!}
                </div>
            </div>
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
            <button class="btn btn-lg btn-block btn-primary" type="submit">Send Request</button>
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