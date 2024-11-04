<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="well well-sm">
            <fieldset>
                <legend class="text-center">Your Details</legend>
                {{$errors->first()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                {!!Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required' => 'required'])!!}
                                @if($errors->has('name')) 
                                    <span class="error">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
                                {!!Form::text('company_name', null, ['placeholder' => 'Company Name', 'class' => 'form-control', 'required' => 'required'])!!}
                                @if($errors->has('company_name')) 
                                    <span class="error">{{$errors->first('company_name')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </span>
                                {!!Form::email('email', null, ['placeholder' => 'Email Address', 'class' => 'form-control', 'required' => 'required'])!!}
                                @if($errors->has('email')) 
                                    <span class="error">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="email">Email Address</label> -->
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                                <!-- <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone Number" required="required"> -->
                                {!!Form::text('phone', null, ['placeholder' => 'Phone Number', 'class' => 'form-control', 'required' => 'required'])!!}
                                @if($errors->has('phone')) 
                                    <span class="error">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                {!!Form::text('company_name', null, ['placeholder' => 'Company Name', 'class' => 'form-control', 'required' => 'required'])!!}
                                @if($errors->has('company_name')) 
                                    <span class="error">{{$errors->first('company_name')}}</span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-indent"></i></span>
                                {!!Form::text('event_type', null, ['placeholder' => 'Type of Event ', 'class' => 'form-control', 'required' => 'required', 'id' => 'event_type'])!!}
                                @if($errors->has('event_type')) 
                                    <span class="error">{{$errors->first('event_type')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="email">Email Address</label> -->
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                                {!!Form::text('event_at', null, ['placeholder' => 'Date of Event ', 'class' => 'form-control', 'required' => 'required', 'id' => 'event_at'])!!}
                                @if($errors->has('event_at')) 
                                    <span class="error">{{$errors->first('event_at')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="display:flex; justify-content:space-between;">

                            <div>
                                <label>
                                    Start Time
                                </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                    <input type="time" name="event_start" class="form-control">
                                    @if($errors->has('event_start')) 
                                        <span class="error">{{$errors->first('event_start')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <label>
                                    End Time
                                </label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                    <input type="time" name="event_end" class="form-control">
                                    @if($errors->has('event_start')) 
                                        <span class="error">{{$errors->first('event_end')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                {!!Form::text('venue_name', null, ['placeholder' => 'Name of Venue (if applicable)', 'class' => 'form-control'])!!}
                                @if($errors->has('venue_name')) 
                                    <span class="error">{{$errors->first('venue_name')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                                {!!Form::text('major_intersections', null, ['placeholder' => 'Major Road Intersection', 'class' => 'form-control', 'required' => 'required'])!!}
                                @if($errors->has('major_road_intersection')) 
                                    <span class="error">{{$errors->first('major_road_intersection')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-pin" aria-hidden="true"></i>
                                </span>
                                {!!Form::text('delivery_postal_code', null, ['placeholder' => 'Delivery Postal Code', 'class' => 'form-control', 'required' => 'required', 'id' => 'delivery_postal_code'])!!}
                                @if($errors->has('delivery_postal_code')) 
                                    <span class="error">{{$errors->first('delivery_postal_code')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="display:flex; justify-content:space-between;">
                            <div class="input-group" style="display: flex;">
                                {!!Form::checkbox('delivery_on_elevator', true)!!}
                                <label class="radio-inline" style="margin-bottom: 0px;">Delivery on Elevator Required</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="email">Email Address</label> -->
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                                {!!Form::number('no_of_guests', null, ['placeholder' => 'No. of guests', 'class' => 'form-control', 'required' => 'required', 'id' => 'no_of_guests', 'min' => 1])!!}
                                @if($errors->has('no_of_guests')) 
                                    <span class="error">{{$errors->first('no_of_guests')}}</span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="feedback" selected="">Feedback</option>
                                <option value="question">Question</option>
                                <option value="other">Other</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::textarea('loading_dock_instructions', null, ['class' => 'form-control', 'rows' => 10, 'cols' => 25, 'placeholder' => 'Enter Loading Dock delivery, or any other delivery instructions, if applicable (Maximum 500 Characters)', 'maxlength' => 500])!!}
                            @if($errors->has('loading_dock_instructions')) 
                                <span class="error">{{$errors->first('loading_dock_instructions')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <!-- <label for="name">Message</label> -->
                            {!!Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required', 'rows' => 10, 'cols' => 25, 'placeholder' => 'Enter any additional comments or instructions (Maximum 500 Characters)', 'maxlength' => 500])!!}
                            @if($errors->has('message')) 
                                <span class="error">{{$errors->first('message')}}</span>
                            @endif
                        </div>
                        
                        @if(!isset($contactUs))
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio" name="delivery_type" value="delivery" checked="checked">Delivery</label>
                                <label class="radio-inline" style="margin-left: 0px;"><input type="radio" name="delivery_type" value="customer_pickup">Customer Pick up &amp; Return (Min. $25)</label>
                            </div>
                            <div class="form-group">
                                <select name="delivery_options" id="delivery_options" class="form-control">
                                    <option value="option_1" data-min-price="150">(Min. $150.00) Toronto, Scarborough, North York, Markham, Durham Region</option>
                                    <option value="option_2" data-min-price="200">(Min. $200.00) Downtown Toronto, Richmond Hill, Newmarket</option>
                                    <option value="option_3" data-min-price="250">(Min. $250.00) Mississauga, Brampton, Caledon, Burlington, Oakville, Etobicoke</option>
                                    <option value="option_4" data-min-price="500">(Min. $500.00) Niagara Falls</option>
                                    <option value="option_5" data-min-price="500">(Min. $500.00) 60 KM outside of Toronto</option>
                                </select>
                                <small>Above dollar amount is minimum rental order before delivery and taxes</small>
                                <br>
                                <small>
                                    <strong>Notes</strong>:
                                    <ul>
                                        <li class="text-danger"> - Delivery charge also applies depending on the size of you order.</li>
                                        <li class="text-danger"> - Fuel surcharge applies on deliveries</li>
                                    </ul>
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="form-group text-center col-md-12" style="margin-bottom: 20px; margin-top: 10px ">
                        <p style=" font-size: 14.7px; color: #333;">How would you like to proceed further?</p>
                        <label class="radio-inline" style="margin-left: 10px;">
                            {!! Form::radio('request_type', 'quote_only', true) !!}
                            {{-- <input type="radio" name="request_type" value="quote_only" checked="checked">
                            --}}
                            Quote Inquiry only</label> 
                        <label class="radio-inline" style="margin-left: 25px;">
                            {!! Form::radio('request_type', 'place_order') !!}
                            {{-- <input type="radio" name="request_type" value="place_order">
                            --}}
                            Would like to proceed and place the order</label>
                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="form-group">
                            <!-- <label for="name">Message</label> -->
                            <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                            {!! Recaptcha::render() !!}
                            
                            @if($errors->has('g-recaptcha-response')) 
                                <span class="error">Captcha Validation failed! Try again.</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg" id="btnContactUs">Submit</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<style>
    .error{
        color: #FF0000;
    }
</style>