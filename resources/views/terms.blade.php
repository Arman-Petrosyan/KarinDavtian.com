@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/terms.css') }}">
@endsection
@section('content')
    <div id="wrapper">
        @include('components.header')
        <div id="terms-nav-items-block">
            <div class="terms-nav-item active">
                <a href="javascript:void(0);" class="nav-link" id="general">general terms</a>
                <span></span>
            </div>

            <div class="mobile-term-data" id="general-terms-mobile">
                @if($data->general)
                    <div class="terms-text-item terms-for-mobile" id="general-text-mobile">
                        <p>{{ $data->general }}</p>
                    </div>
                @endif
            </div>

            <div class="terms-nav-item">
                <a href="javascript:void(0);" class="nav-link" id="caring">caring for the pieces</a>
                <span></span>
            </div>

            <div class="mobile-term-data" id="caring-terms-mobile">
                @if($data->caring)
                    <div class="terms-text-item terms-for-mobile" id="caring-text-mobile">
                        <p>{{ $data->caring }}</p>
                    </div>
                @endif
            </div>

            <div class="terms-nav-item">
                <a href="javascript:void(0);" class="nav-link" id="materials">material's discription</a>
                <span></span>
            </div>

            <div class="mobile-term-data" id="materials-terms-mobile">
                @if($data->material)
                    <div class="terms-text-item terms-for-mobile" id="materials-text-mobile">
                        <p>{{ $data->material }}</p>
                    </div>
                @endif
            </div>

            <div class="terms-nav-item">
                <a href="javascript:void(0);" class="nav-link" id="customer">customer service</a>
                <span></span>
            </div>

            <div class="mobile-term-data" id="customer-terms-mobile">
                @if($data->customer)
                    <div class="terms-text-item" id="customer-text-mobile">
                        <p>{{ $data->customer }}</p>
                    </div>
                @endif
            </div>
        </div>
        <div id="terms-text-items-block">
            @if($data->general)
                <div class="terms-text-item active" id="general-text">
                    <p>{{ $data->general }}</p>
                </div>
            @endif
            @if($data->caring)
                <div class="terms-text-item" id="caring-text">
                    <p>{{ $data->caring }}</p>
                </div>
            @endif
            @if($data->material)
                <div class="terms-text-item" id="materials-text">
                    <p>{{ $data->material }}</p>
                </div>
            @endif
            @if($data->customer)
                <div class="terms-text-item" id="customer-text">
                    <p>{{ $data->customer }}</p>
                </div>
            @endif
        </div>
        {{-- @include('components.footer') --}}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/terms.js') }}"></script>
@endsection
