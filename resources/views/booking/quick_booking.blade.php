@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-info">
                    <div class="box-header with-border">
                        @include('errors.success')
                        @include('errors.error')
                        <h3 class="box-title">{{ trans('booking.quick_booking') }}</h3>
                    </div>
                    <form class="form-horizontal" accept-charset="UTF-8" method="POST" action="{{ route('booking.store') }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" placeholder="{{ trans('booking.name') }}" id="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from" class="col-sm-2 control-label">{{ trans('booking.from') }}</label>
                                <div class="col-sm-6">
                                    <input type="date" name="from" class="form-control" id="from" value="{{ old('from') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="to" class="col-sm-2 control-label">{{ trans('booking.to') }}</label>
                                <div class="col-sm-6">
                                    <input type="date" name="to" class="form-control" id="from" value="{{ old('to') }}">
                                </div>
                            </div>.
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" placeholder="{{ trans('booking.contact_info') }}" id="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info">{{ trans('booking.book_it') }}</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
