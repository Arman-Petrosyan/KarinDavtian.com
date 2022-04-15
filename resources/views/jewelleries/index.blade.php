@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css?v=' . date('YmdHis')) }}">   
    <link rel="stylesheet" href="{{ asset('css/jewelleries.css?v=' . date('YmdHis')) }}">
@endsection

@section('content')

@endsection

@section('scripts')
    <div id="product-wrapper">
        @include('components.header')
        @if(!$jewelleries->isEmpty())
            <div id="product-items-block">
                @foreach ($jewelleries as $jewellery)
                    <div class="product-item" title="{{ $jewellery->title }}">
                        <a href="{{ route('showJewellery', $jewellery->id) }}">
                            <img src="{{ asset('img/products/jewelleries/' . optional($jewellery->images->where('is_main', 1)->first())->name) }}">
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
