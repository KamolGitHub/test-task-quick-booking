<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="{{ (Request::route()->getName() === 'shipping_request.form_scan' || Request::route()->getName() === 'parcel.prohibited_items.scan') ? 'active' : null }}"><a href="{{ route('shipping_request.form_scan') }}">{{ trans('menu.prohibited_items') }}</a></li>
                    <li class="{{ Request::route()->getName() === 'parcel.index' ? 'active' : null }}"><a href="{{ route('parcel.index') }}">{{ trans('menu.parcels') }}</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<template id="tmpl">
    <div class="form-group ">
        <div class="row">
            <div class="col-sm-8">
                <input type="file" accept="image/*" class="form-control" name="images[]">
            </div>
            <div class="col-sm-4">
                <button type="button" id="remove_image" class="btn btn-default">Delete</button>
            </div>
        </div>

    </div>
</template>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $(document).on('click', '#add_image', function () {
            //$(this).hide();
            $('#images').prepend(tmpl.content.cloneNode(true));
        });

        $(document).on('click', '#remove_image', function () {
            //$(this).hide();
            $(this).closest('.form-group').remove();
        });

    });

</script>
</body>
</html>
