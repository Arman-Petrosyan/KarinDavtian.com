@extends('layouts.admin')

@section('srtles')

@endsection

@include('components.delete_confirmation')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collages as $collage)
                <tr id="item-{{ $collage->id }}">
                    <th scope="row">{{ $collage->id }}</th>
                    <td>{{ $collage->title }}</td>
                    <td>
                        <a href="{{ route('collages.edit', $collage->id) }}" style="color: blue">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:void(0);" style="color: red;" class="delete-item delete-product" data-id="{{ $collage->id }}" data-title="{{ '#' . $collage->id . '-' . $collage->title }}" data-table="jewelleries">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin/jewellery.js?v=' . date('YmdHis')) }}"></script>
@endsection
