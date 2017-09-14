@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('parcel.prohibited-items') }}</div>

                    <div class="panel-body">
                        @include('errors.error')
                        <form action="{{ route('shipping_request.scan_prohibited_items') }}" class="form-group" method="GET">
                            <div class="form-group">
                                <input type="text" class="form-control" name="number" placeholder="{{ trans('parcel.search_placeholder') }}">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
