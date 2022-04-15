<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('img/icons/logo.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::currentRouteNamed('jewelleries.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jewelleries.index') }}">Jewelleries</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('collages.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('collages.index') }}">Collages</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('info.edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('info.edit') }}">Info</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('jewellery_types.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jewellery_types.index') }}">Jewellery types</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('term.edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('term.edit') }}">Terms</a>
            </li>
        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        @if(Route::currentRouteNamed('jewelleries.index') || Route::currentRouteNamed('collages.index'))
            <div class="form-inline my-2 my-lg-0">
                <a href="{{ Route::currentRouteNamed('jewelleries.index') ? route('jewelleries.create') : (Route::currentRouteNamed('collages.index') ? route('collages.create') : 'javascript:void(0)') }}" class="link-primary">Create new</a>
            </div>
        @endif
    </div>
</nav>

{{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta accusantium facilis optio perferendis itaque, atque veniam! Nisi quod quibusdam aliquid! Blanditiis consectetur expedita quisquam optio reprehenderit officiis quia, eaque deleniti nulla nostrum similique commodi animi, dolore sint dolorum sit praesentium ratione minus rem! Quidem soluta, eos inventore quod iusto voluptate! --}}