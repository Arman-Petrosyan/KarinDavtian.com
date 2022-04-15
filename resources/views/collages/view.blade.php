@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/collage_view.css?v=' . date('YmdHis')) }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css?v=' . date('YmdHis')) }}">
@endsection

@section('content')
    <div id="wrapper">
        @include('components.header')
        <div id="scroll-box">
            <div id="content-block">
                <div id="slider-block">
                    <div class="swiper collage-slider">
                        <div class="swiper-wrapper">
                            @foreach($collage->images->where('is_main', 0) as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('img/products/collages/' . $image->name) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div id="corner-block">
                    <img src="{{ asset('img/icons/full_screen.pn') }}g">
                </div>
                <div id="collage-text-block-mobile">
                    <div id="collage-type-block">
                        <h2>Collage</h2>
                    </div>
                    <div id="collage-title-block">
                        <h3>{{ $collage->title }}</h3>
                    </div>
                    <div id="collage-material-block">
                        <h3>Materials: {{ $collage->materials }}</h3>
                    </div>
                    <div id="collage-dimensions-block">
                        <h3>Dimensions: {{ $collage->dimensions }}</h3>
                    </div>
                </div>
                <div id="collage-description-block">
                    <h1>About the work</h1>
                    <p>{{ $collage->description }}</p>
                </div>
            </div>
        </div>
        <div id="prev-next-block-mobile">
            <a href="{{ $prevId ? route('showCollage', $prevId) : 'javascript:void(0);' }}" class="{{ !$prevId ? 'last-element' : '' }}">prev</a>
            <span></span>
            <a href="{{ $nextId ? route('showCollage', $nextId) : 'javascript:void(0);' }}" class="{{ !$nextId ? 'last-element' : '' }}">next</a>
        </div>
        <div id="collage-text-block">
            <div id="collage-type-block">
                <h2>Collage</h2>
            </div>
            <div id="collage-title-block">
                <h3>{{ $collage->title }}</h3>
            </div>
            <div id="collage-material-block">
                <h3>Materials: {{ $collage->materials }}</h3>
            </div>
            <div id="collage-dimensions-block">
                <h3>Dimensions: {{ $collage->dimensions }}</h3>
            </div>
            <div id="prev-next-block">
                <a href="{{ $prevId ? route('showCollage', $prevId) : 'javascript:void(0);' }}" class="{{ !$prevId ? 'last-element' : '' }}">prev</a>
                <span></span>
                <a href="{{ $nextId ? route('showCollage', $nextId) : 'javascript:void(0);' }}" class="{{ !$nextId ? 'last-element' : '' }}">next</a>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/swiper.min.js?v=' . date('YmdHis')) }}"></script>
    <script src="{{ asset('js/collage_view.js?v=' . date('YmdHis')) }}"></script>
@endsection
