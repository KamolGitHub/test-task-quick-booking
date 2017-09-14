@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('parcel.register-prohibited-items') }}</div>
                    <div class="panel-body  ">
                        @include('errors.error')
                        <form action="{{ route('parcel.register_prohibited_items') }}" method="POST"
                              enctype="multipart/form-data" role="form">
                            <input type="hidden" name="shipping_request_id" value="{{ $shipping->id }}">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>{!! trans('parcel.extracted_from', ['attribute'=>$shipping->number ]) !!}</label>
                            </div>
                            <div class="form-group">
                                <label>{{ $shipping->client->full_name or null }}</label>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('parcel.weight') }}</label>
                                <input type="text" class="form-control" name="weight"
                                       placeholder="{{ trans('parcel.weight') }}" value="{{ old('weight') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('parcel.add_photos') }}</label>
                                    <button type="button" id="add_image" class="btn btn-default">+ Add</button>
                            </div>
                            <div class="form-group" id="images">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="file" accept="image/*" class="form-control" name="images[]">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('shipping_request.form_scan') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
