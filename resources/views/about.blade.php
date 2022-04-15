@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection
@section('content')
    <div id="wrapper">
        @include('components.header')
        <div id="about-img-block">
            <img src="{{ asset('img/about/' . $info->image) }}">
        </div>
        <div id="about-text-block">
            <p>{!! $info->about !!}</p>

        </div>
        {{-- @include('components.footer') --}}
    </div>
@endsection

@section('scripts')
    {{-- <script src="js/about.js"></script> --}}
@endsection
