<div class="form-body">
    <div class="form-group">
        <label class="col-md-3 control-label">Product Code</label>
        <div class="col-md-4">
            {!!Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'F-BG', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Name</label>
        <div class="col-md-4">
            {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'FOLDING PLASTIC - BURGUNDY CHAIR', 'required' => 'required'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Description</label>
        <div class="col-md-4">
            {!!Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'We offer many types of chairs...', 'rows' => 4, 'required' => 'required', 'minlength' => 5])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Price</label>
        <div class="col-md-4">
            {!!Form::text('price', null, ['class' => 'form-control', 'placeholder' => '1.45', 'required' => 'required'])!!}
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
            {!!Form::text('sort_order', null, ['class' => 'form-control', 'placeholder' => '123'])!!}
        </div>
    </div>
    @for($i=1; $i<=$imageCount;$i++)
        {{-- IMAGES BEGIN --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Image {{$i}}</label>
            <div class="col-md-4">
                {{-- 1st image is required for new product--}}
                @if($i == 1 && !isset($product))
                    {!!Form::file("image_location_{$i}", ['required' => 'required'])!!}
                @else
                    {!!Form::file("image_location_{$i}")!!}
                @endif
            </div>
        </div>
        @if(isset($product) && $product["image_location_$i"])
            <div class="form-group">
                <label class="col-md-3 control-label">Current Image {{$i}}</label>
                <div class="col-md-4">
                    <img src="{{asset($productLocation.'/'.$product["image_location_$i"])}}" class="img-responsive small-thumbnail" alt="">
                </div>
            </div>
        @endif
        {{-- IMAGES END --}}

        {{-- THUMBNAILS BEGIN --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Thumbnail {{$i}}</label>
            <div class="col-md-4">
                {{-- 1st image is required for new product--}}
                @if($i == 1 && !isset($product))
                    {!!Form::file("thumbnail_location_{$i}", ['required' => 'required'])!!}
                @else
                    {!!Form::file("thumbnail_location_{$i}")!!}
                @endif
            </div>
        </div>
        @if(isset($product) && $product["thumbnail_location_{$i}"])
            <div class="form-group">
                <label class="col-md-3 control-label">Current Thumbnail</label>
                <div class="col-md-4">
                    <img src="{{asset($productLocation.'/'.$product["thumbnail_location_{$i}"])}}" class="img-responsive small-thumbnail" alt="">
                </div>
            </div>
        @endif
        {{-- THUMBNAILS END --}}
    @endfor
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" type="submit">Submit</button>
        </div>
    </div>
</div>