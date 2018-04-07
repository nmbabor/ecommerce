@extends('app')

@section('aimeos_styles')
    <link rel="stylesheet" href="{{ asset('public/packages/aimeos/shop/themes/elegance/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/packages/aimeos/shop/themes/elegance/aimeos.css') }}" />
@stop

@section('aimeos_scripts')
    <script type="text/javascript" src="{{ asset('public/packages/aimeos/shop/themes/jquery-ui.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/packages/aimeos/shop/themes/aimeos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/packages/aimeos/shop/themes/elegance/aimeos.js') }}"></script>
@stop
