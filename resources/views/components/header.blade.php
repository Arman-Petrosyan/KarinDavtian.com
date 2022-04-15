<div id="header-block">
    <div id="logo-block">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/icons/logo.png') }}">
        </a>
    </div>
    @if(Route::currentRouteNamed('showJewellery') || Route::currentRouteNamed('showCollage'))
        <div id="close-block">
            @php
                $link = Route::currentRouteNamed('about') ? route('home') : (Route::currentRouteNamed('showJewellery') ? route('allJewelleries') : route('allCollages'))
            @endphp
            <a href="{{ $link }}">
                <img src="{{ asset('img/icons/close.png') }}">
            </a>
        </div>
    @elseif(Route::currentRouteNamed('allJewelleries'))
        <div class="page-nav">
            <div id="product-static-block">
                <span>JEWELLERY</span>
            </div>
            <span id="product-stick"></span>
            <div id="filter-items-block">
                <div class="filter-item {{ !$selectedType ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries') }}" class="active">ALL</a>
                </div>
                @foreach($typesForFilter as $type)
                    <div class="filter-item {{ $selectedType == $type->id ? 'active' : '' }}">
                        <a href="{{ route('allJewelleries', $type->id) }}">{{ $type->name }}</a>
                    </div>
                @endforeach
                {{-- <div class="filter-item {{ !$selectedType ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries') }}" class="active">all</a>
                </div>
                <div class="filter-item {{ $selectedType == 1 ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries', 1) }}">earing</a>
                </div>
                <div class="filter-item {{ $selectedType == 2 ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries', 2) }}">ring</a>
                </div>
                <div class="filter-item {{ $selectedType == 3 ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries', 3) }}">neckles</a>
                </div>
                <div class="filter-item {{ $selectedType == 4 ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries', 4) }}">brosch</a>
                </div>
                <div class="filter-item {{ $selectedType == 5 ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries', 5) }}">bracelets</a>
                </div>
                <div class="filter-item {{ $selectedType == 6 ? 'active' : '' }}">
                    <a href="{{ route('allJewelleries', 6) }}">sets</a>
                </div> --}}
            </div>
        </div>
    @elseif(Route::currentRouteNamed('allCollages'))
        <div class="page-nav">
            <div id="product-static-block">
                <span>COLLAGE</span>
            </div>
        </div>
    @endif
</div>
