@extends('layouts.admin')

@section('styles')

@endsection

@include('components.delete_confirmation')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Jewelleries as $jewellery)
                <tr id="item-{{ $jewellery->id }}">
                    <th scope="row">{{ $jewellery->id }}</th>
                    <td>{{ $jewellery->title }}</td>
                    <td>{{ optional($jewellery->type)->name }}</td>
                    <td>
                        <a href="{{ route('jewelleries.edit', $jewellery->id) }}" style="color: blue">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:void(0);" style="color: red;" class="delete-item delete-product" data-id="{{ $jewellery->id }}" data-title="{{ '#' . $jewellery->id . '-' . $jewellery->title }}" data-table="jewelleries">
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
