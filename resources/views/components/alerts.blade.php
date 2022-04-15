@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $index => $error)
                <li>{{ $error }}
                    @if($index == 0)
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    @endif
                </li>
            @endforeach
        </ul>

    </div>

@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
