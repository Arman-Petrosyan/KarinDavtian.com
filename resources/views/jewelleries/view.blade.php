@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jewellery_view.css?v=' . date('YmdHis')) }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css?v=' . date('YmdHis')) }}">
@endsection

@section('content')
    <div id="wrapper">
        @include('components.header')

        <div id="scroll-box">
            <div id="slider-block">
                <div class="swiper jewellry-slider">
                    <div class="swiper-wrapper">
                        @foreach($jewellery->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('img/products/jewelleries/' . $image->name) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div id="jewellry-text-block">
                <div id="jewellry-type-block">
                    <h2>{{ optional($jewellery->type)->name }}</h2>
                </div>
                <div id="jewellry-title-block">
                    <h3>{{ $jewellery->title }}</h3>
                </div>
                <div id="jewellry-edition-block">
                    <h3>{{ $jewellery->edition_type }}</h3>
                </div>
                <div id="jewellry-material-block">
                    <h3>Materials: {{ $jewellery->materials }}</h3>
                </div>
                <div id="jewellry-dimensions-block">
                    <h3>Dimensions: {{ $jewellery->dimensions }}</h3>
                </div>
                <div id="jewellry-description-block">
                    <p>{{ $jewellery->description }}</p>
                </div>
            </div>
        </div>

            @include('components.footer')
        <div id="prev-next-block">
            <a href="{{ $prevId ? route('showJewellery', $prevId) : 'javascript:void(0);' }}" class="{{ !$prevId ? 'last-element' : '' }}">prev</a>
            <span></span>
            <a href="{{ $nextId ? route('showJewellery', $nextId) : 'javascript:void(0);' }}" class="{{ !$nextId ? 'last-element' : '' }}">next</a>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/swiper.min.js?v=' . date('YmdHis')) }}"></script>
    <script src="{{ asset('js/jewellery_view.js?v=' . date('YmdHis')) }}"></script>
@endsection
