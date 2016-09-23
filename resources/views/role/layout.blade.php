{{-- Extended from Root Resource Dir --}}
@extends('app')

{{--Extended From Admin Module--}}
@section('wrapper')
    <!-- Navigation -->
    <nav class="navbar navbar-material-teal-700 shadow-z-2  navbar-static-top" role="navigation">

        @include('admin::shared.header')

    </nav>

        @include('admin::shared.sidebar')

    <div id="page-wrapper">

        @yield('content')

    </div>

@stop