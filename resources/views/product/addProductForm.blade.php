@extends('layouts.master')
@section('title')
    <title>Application Users</title>
@endsection
@section('banner')
    @include('layouts.banner')
@endsection

@section('menu')
    @include('layouts.inventoryMenu')
@endsection

@section('content')

    @include('partials.flashmessage')

    <div class="row col-md-8" style="border-right: solid; overflow: scroll; height: 700px">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/product.data.new') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}

        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-3 control-label">Name <span style="color: red">*</span></label>

            <div class="col-md-8">
                <input id="name" type="text" class="form-control" name="name" value=""  autofocus autocomplete="off">

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="row form-group">
            <label for="hascolor" class="col-md-3 control-label">Have Size & Color</label>
            <input type="checkbox" name="varient" id="varient" value="0" />



            <div class="row mycheckboxdiv form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                <label for="size" class="col-md-3 control-label">Size </label>

                <div class="col-md-3">
                    <input id="size" type="text" class="form-control" name="size" value="" >

                </div>
                <label for="color" class="col-md-2 control-label">Color </label>
                <div class="col-md-3">
                    <input id="color" type="text" class="form-control" name="color" value="">

                </div>

            </div>

        </div>




        {{--<div id="mycheckboxdiv" style="display:none">--}}
            {{--This content should appear when the checkbox is checked--}}
        {{--</div>--}}


        <div class="row form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
            <label for="sku" class="col-md-3 control-label">SKU <span style="color: red">*</span></label>

            <div class="col-md-4">
                <input id="sku" type="text" class="form-control" name="sku" value="" required autofocus autocomplete="off">

                @if ($errors->has('sku'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="col-md-1">

                {!! Form::checkbox('autosku', null, false, array('id'=>'autosku','form-control','big' )) !!}
            </div>
            <label for="autosku" class="col-md-3 control-label" style="text-align: left">SKU Autogenerated</label>
        </div>

        <div class="row form-group{{ $errors->has('relationship_id') ? ' has-error' : '' }}">
            <label for="relationship_id" class="col-md-3 control-label">Suppliers</label>

            <div class="col-md-8">
                {!! Form::select('relationship_id', $suppliers , null , array('id' => 'relationship_id', 'class' => 'form-control','placeholder' => 'Select Suppliers...')) !!}
                @if ($errors->has('relationship_id'))
                    <span class="help-block">
                                            <strong>{{ $errors->first('relationship_id') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label for="category_id" class="col-md-3 control-label">Category<span style="color: red">*</span></label>

            <div class="col-md-8">
                {!! Form::select('category_id', $categories , null , array('id' => 'category_id', 'class' => 'form-control','placeholder' => 'Select Category...')) !!}
                @if ($errors->has('category_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
            <label for="subcategory_id" class="col-md-3 control-label">Sub Category<span style="color: red">*</span></label>

            <div class="col-md-8">
                {!! Form::select('subcategory_id', $subcategories , null , array('id' => 'subcategory_id', 'class' => 'form-control','placeholder' => 'Select Category...')) !!}
                @if ($errors->has('subcategory_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="row  form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
            <label for="brand_id" class="col-md-3 control-label">Brand</label>

            <div class="col-md-8">
                {!! Form::select('brand_id', $brands , null , array('id' => 'brand_id', 'class' => 'form-control','placeholder' => 'Select Brand...')) !!}
                @if ($errors->has('brand_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('unit_name') ? ' has-error' : '' }}">
            <label for="unit_name" class="col-md-3 control-label">Unit<span style="color: red">*</span></label>

            <div class="col-md-7">
                {!! Form::select('unit_name', $units , null , array('id' => 'unit_name', 'class' => 'form-control','placeholder' => 'Select Unit...')) !!}
                @if ($errors->has('unit_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('unit_name') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="col-md-1">

                <button type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#modal-unit"><i class="glyphicon glyphicon-plus-sign"></i></button>
            </div>
        </div>

        <div class="row form-group{{ $errors->has('model_id') ? ' has-error' : '' }}">
            <label for="model_id" class="col-md-3 control-label">Model</label>

            <div class="col-md-8">
                {!! Form::select('model_id', $models, null , array('id' => 'model_id', 'class' => 'form-control','placeholder' => 'Select a Model...')) !!}
                @if ($errors->has('model_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('model_id') }}</strong>
                                    </span>
                @endif
            </div>

        </div>

        <div class="row form-group{{ $errors->has('tax_id') ? ' has-error' : '' }}">
            <label for="taxgrp_code" class="col-md-3 control-label">Tax</label>

            <div class="col-md-8">
                {!! Form::select('tax_id',$taxes, null , array('id' => 'tax_id', 'class' => 'form-control','placeholder' => 'Select Tax...')) !!}
                @if ($errors->has('tax_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('tax_id') }}</strong>
                                    </span>
                @endif
            </div>

        </div>

        {{--******************* NEEDED IF TAX GROUP ACTIVE********************************--}}

        {{--<div class="row form-group{{ $errors->has('taxgrp_code') ? ' has-error' : '' }}">--}}
            {{--<label for="taxgrp_code" class="col-md-3 control-label">Tax Group</label>--}}

            {{--<div class="col-md-8">--}}
                {{--{!! Form::select('taxgrp_code',$taxes, null , array('id' => 'taxgrp_code', 'class' => 'form-control','placeholder' => 'Select Tax Group...')) !!}--}}
                {{--@if ($errors->has('taxgrp_code'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('taxgrp_code') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}

        {{--</div>--}}

{{--*****************************************************--}}
        <div class="row form-group{{ $errors->has('godown_id') ? ' has-error' : '' }}">
            <label for="godown_id" class="col-md-3 control-label">Godown</label>

            <div class="col-md-8">
                {!! Form::select('godown_id', $godowns , null , array('id' => 'godown_id', 'class' => 'form-control','placeholder' => 'Select Godown...')) !!}
                @if ($errors->has('godown_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('godown_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="row form-group{{ $errors->has('rack_id') ? ' has-error' : '' }}">

            <label for="rack_id" class="col-md-3 control-label">Rack</label>

            <div class="col-md-8">
                {!! Form::select('rack_id', $racks , null , array('id' => 'rack_id', 'class' => 'form-control','placeholder' => 'Select Rack...')) !!}
                @if ($errors->has('rack_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('rack_id') }}</strong>
                                    </span>
                @endif
            </div>

        </div>



        <div class="row form-group{{ $errors->has('unitPrice') ? ' has-error' : '' }}">
            <label for="unitPrice" class="col-md-3 control-label">Unit Price<span style="color: red">*</span></label>

            <div class="col-md-8">
                <input id="unitPrice" type="text" class="form-control" name="unitPrice" value="">

                @if ($errors->has('unitPrice'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('unitPrice') }}</strong>
                                    </span>
                @endif
            </div>
        </div>



        <div class="row form-group{{ $errors->has('initialPrice') ? ' has-error' : '' }}">
            <label for="initialPrice" class="col-md-3 control-label">Initial Cost Price</label>

            <div class="col-md-8">
                <input id="initialPrice" type="text" class="form-control" name="initialPrice" value="">

                @if ($errors->has('initialPrice'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('initialPrice') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="row form-group{{ $errors->has('wholesalePrice') ? ' has-error' : '' }}">
            <label for="wholesalePrice" class="col-md-3 control-label">Whole Sale Price</label>

            <div class="col-md-8">
                <input id="wholesalePrice" type="text" class="form-control" name="wholesalePrice" value="">

                @if ($errors->has('wholesalePrice'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('wholesalePrice') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="row form-group{{ $errors->has('retailPrice') ? ' has-error' : '' }}">
            <label for="retailPrice" class="col-md-3 control-label">Retail Price</label>

            <div class="col-md-8">
                <input id="retailPrice" type="text" class="form-control" name="retailPrice" value="">

                @if ($errors->has('retailPrice'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('retailPrice') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('reorderpoint') ? ' has-error' : '' }}">

            <label for="reorderpoint" class="col-md-3 control-label">Re Order Point</label>

            <div class="col-md-8">
                <input id="reorderpoint" type="text" class="form-control" name="reorderpoint" value="">

                @if ($errors->has('reorderpoint'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('reorderpoint') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="row form-group{{ $errors->has('openingQty') ? ' has-error' : '' }}">
            <label for="openingQty" class="col-md-3 control-label">Initial Stock On Hand</label>

            <div class="col-md-8">
                <input id="openingQty" type="text" class="form-control" name="openingQty" value="">

                @if ($errors->has('openingQty'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('openingQty') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('openingValue') ? ' has-error' : '' }}">
            <label for="openingValue" class="col-md-3 control-label">Initial Stock Value</label>

            <div class="col-md-8">
                <input id="openingValue" type="text" class="form-control" name="openingValue" value="">

                @if ($errors->has('openingValue'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('openingValue') }}</strong>
                                    </span>
                @endif
            </div>
        </div>



        <div class="row form-group{{ $errors->has('description_short') ? ' has-error' : '' }}">
            <label for="description_short" class="col-md-3 control-label">Description Short</label>

            <div class="col-md-8">
                {!! Form::textarea('description_short',null,['id'=>'description_short','size' => '50x6','class'=>'field']) !!}
                @if ($errors->has('description_short'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('description_short') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="row form-group{{ $errors->has('description_long') ? ' has-error' : '' }}">
            <label for="description_long" class="col-md-3 control-label">Description Long</label>

            <div class="col-md-8">
                {!! Form::textarea('description_long',null,['id'=>'description_long','size' => '50x6','class'=>'field']) !!}
                @if ($errors->has('description_long'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('description_long') }}</strong>
                                    </span>
                @endif
            </div>
        </div>



        <div class="row form-group{{ $errors->has('imagePath') ? ' has-error' : '' }}">
            <label for="imagePath" class="col-md-3 control-label">Image</label>

            <div class="col-md-8">
                <input type="file" name="imagePath" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">

                @if ($errors->has('imagePath'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('imagePath') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
        </div>

    </form>

    </div>

    <div style="width: 5px"></div>

    <div class="col-md-2 col-md-offset-1">
        <article>
            <h1>Help Tips</h1>
            <p>Google Chrome is a free, open-source web browser developed by Google, released in 2008.</p>
        </article>

        <p><strong>Note:</strong> The article tag is not supported in Internet Explorer 8 and earlier versions.</p>
    </div>


    <!-- Modal -->
    <!-- Create Unit Modal -->

    <div class="modal fade" id="modal-unit" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-unit-label">Add New Unit</h3>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/unit.new') }}">
                    {{ csrf_field() }}

                    <div class="modal-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Unit Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" autofocus required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('formalName') ? ' has-error' : '' }}">
                            <label for="formalName" class="col-md-4 control-label">Formal Name</label>

                            <div class="col-md-6">
                                <input id="formalName" type="text" class="form-control" name="formalName" value="" required>

                                @if ($errors->has('formalName'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('formalName') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noOfDecimalplaces') ? ' has-error' : '' }}">
                            <label for="noOfDecimalplaces" class="col-md-4 control-label">Decimal Places</label>

                            <div class="col-md-6">
                                <input id="noOfDecimalplaces" type="text" class="form-control" name="noOfDecimalplaces" value="" required>

                                @if ($errors->has('noOfDecimalplaces'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('noOfDecimalplaces') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            <button type="button" class="btn btn-danger pull-left">Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- End Unit Modal -->
@stop

@push('scripts')

<script>

    $(document).ready(function(){
        $('.mycheckboxdiv').css("display", "none");

        $('#varient').change(function(){
            if(this.checked) {
                $(this).next().show();
            } else {
                $(this).next().hide();
            }
        });


        $(document).on('click', '.btn-danger', function () {

                window.location.href = "inventoryHome";
        });

    });




</script>

@endpush