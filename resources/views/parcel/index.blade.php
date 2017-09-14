@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-header with-border">
                @include('errors.success')
            </div>
            <div class="box-body">
                @include('parcel.table')
            </div><!-- /.box-body -->
            <div class="box-footer">
                {!! $parcels->render() !!}
            </div><!-- box-footer -->
        </div><!-- /.box -->
    </div>
@endsection
