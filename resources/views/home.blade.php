@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="wrapper">
        <div id="left-sidebar">
            <div id="logo-block">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/icons/logo.png') }}">
                </a>
            </div>
            <div id="links-block">
                <div class="link-item">
                    <a href="{{ route('about') }}">about</a>
                </div>
                <div class="link-item">
                    <a href="{{ route('contacts') }}">contacts</a>
                </div>
            </div>
            <div id="social-block">
                <div class="sotial-item">
                    <a href="{{ $info->instagram_link ?: 'javascript:void(0);' }}">
                        <img src="{{ asset('img/icons/instagram.png') }}">
                    </a>
                </div>
                <div class="sotial-item">
                    <a href="{{ $info->pinterest_link ?: 'javascript:void(0);' }}">
                        <img src="{{ asset('img/icons/pinterest.png') }}">
                    </a>
                </div>
                <div class="sotial-item">
                    <a href="{{ $info->v_link ?: 'javascript:void(0);' }}">
                        <img src="{{ asset('img/icons/vimeo.png') }}">
                    </a>
                </div>
            </div>
            <div id="terms-block">
                <a href="{{ route('terms.index') }}">terms & conditions</a>
            </div>
            <div id="copyright-block">
                <span>© Karine Davtyan 2021</span>
            </div>
        </div>
        <div id="jewellerybar">
            <a href="{{ route('allJewelleries') }}">jewellery</a>
        </div>
        <div id="collagebar">
            <a href="{{ route('allCollages') }}">collage</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
