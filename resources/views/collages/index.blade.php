@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css?v=' . date('YmdHis')) }}">
    <link rel="stylesheet" href="{{ asset('css/collages.css?v=' . date('YmdHis')) }}">
@endsection

@section('content')

@endsection

@section('scripts')
    <div id="product-wrapper">
        @include('components.header')
        @if(!$collages->isEmpty())
            <div id="product-items-block">
                @foreach ($collages as $collage)
                    <div class="product-item" title="{{ $collage->title }}">
                        <a href="{{ route('showCollage', $collage->id) }}">
                            <img src="{{ asset('img/products/collages/' . optional($collage->images->where('is_main', 1)->first())->name) }}">
                            <span class="action-bar">
                                <img src="{{ asset('img/icons/info.png') }}">
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        @include('components.footer')
    </div>
@endsection
