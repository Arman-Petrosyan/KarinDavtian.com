@extends('layouts.admin')

@section('styles')
    <style>
        .remove-image-from-input,
        .delete-image {
            position: absolute;
            display: block;
            font-size: 50px;
            top: -20px;
            right: -25px;
            z-index: 9;
            color: red;
            cursor: pointer;
        }

        .add-new-image-block,
        .remove-this-image-block {
            font-size: 35px;
            position: absolute;
            top: 12px;
            right: 15px;
            cursor: pointer;
        }

        .add-new-image-block svg,
        .remove-this-image-block svg {
            display: block !important;
        }

        .form-check {
            display: block;
            min-height: 1.5rem;
            padding-left: 1.5em;
            margin-bottom: 0.125rem;
        }
        .form-check .form-check-input {
            float: left;
            margin-left: -1.5em;
        }
        .form-check-input {
            width: 1em;
            height: 1em;
            margin-top: 0.25em;
            vertical-align: top;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            border: 1px solid rgba(0, 0, 0, 0.25);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }
        .form-check-input[type="checkbox"] {
            border-radius: 0.25em;
        }
        .form-check-input[type="radio"] {
            border-radius: 50%;
        }
        .form-check-input:active {
            filter: brightness(90%);
        }
        .form-check-input:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .form-check-input:checked[type="checkbox"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
        }
        .form-check-input:checked[type="radio"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
        }
        .form-check-input[type="checkbox"]:indeterminate {
            background-color: #0d6efd;
            border-color: #0d6efd;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10h8'/%3e%3c/svg%3e");
        }
        .form-check-input:disabled {
            pointer-events: none;
            filter: none;
            opacity: 0.5;
        }
        .form-check-input:disabled ~ .form-check-label,
        .form-check-input[disabled] ~ .form-check-label {
            opacity: 0.5;
        }
        .form-switch {
            padding-left: 2.5em;
        }
        .form-switch .form-check-input {
            width: 2em;
            margin-left: -2.5em;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280, 0, 0, 0.25%29'/%3e%3c/svg%3e");
            background-position: left center;
            border-radius: 2em;
            transition: background-position 0.15s ease-in-out;
        }
        @media (prefers-reduced-motion: reduce) {
            .form-switch .form-check-input {
                transition: none;
            }
        }
        .form-switch .form-check-input:focus {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%2386b7fe'/%3e%3c/svg%3e");
        }
        .form-switch .form-check-input:checked {
            background-position: right center;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
        }
        .form-check-inline {
            display: inline-block;
            margin-right: 1rem;
        }
        .btn-check {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none;
        }
        .btn-check:disabled + .btn,
        .btn-check[disabled] + .btn {
            pointer-events: none;
            filter: none;
            opacity: 0.65;
        }

        .is-main-block {
            position: absolute;
            top: 16px;
            right: 65px;
        }
    </style>
@endsection

@include('components.delete_confirmation')

@section('content')
    <form action="{{ Route::currentRouteNamed('collages.create') ? route('collages.store') : route('collages.update', $collage) }}" method="POST" enctype="multipart/form-data" id="action-form">
        @csrf
        <input type="hidden" name="_method" value="{{ Route::currentRouteNamed('collages.create') ? 'POST' : 'PUT' }}">
        @if(Route::currentRouteNamed('collages.edit'))
            <input type="hidden" name="id" value="{{ $collage->id }}">
        @endif
    
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" onfocus="if (this.placeholder == 'Title') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Title';}" autocomplete="off" value="{{ !is_null(old('title')) ? old('title') : (isset($collage) ? $collage->title : '') }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="materials">Materials</label>
            <input type="text" class="form-control" id="materials" name="materials" placeholder="Materials" onfocus="if (this.placeholder == 'Materials') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Materials';}" autocomplete="off" value="{{ !is_null(old('materials')) ? old('materials') : (isset($collage) ? $collage->materials : '') }}" required>
            @error('materials')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dimensions">Dimensions</label>
            <input type="text" class="form-control" id="dimensions" name="dimensions" placeholder="Dimensions" onfocus="if (this.placeholder == 'Dimensions') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Dimensions';}" autocomplete="off" value="{{ !is_null(old('dimensions')) ? old('dimensions') : (isset($collage) ? $collage->dimensions : '') }}" required>
            @error('dimensions')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="10" name="description" placeholder="Description" onfocus="if (this.placeholder == 'Description') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Description';}" autocomplete="off" required>{{ !is_null(old('description')) ? old('description') : (isset($collage) ? $collage->description : '') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group image-item-block" style="position: relative;">
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm col-9 image-input-wrapper">
                <input type="file" class="form-control border-0 image-upload-input" name="collage_image[]" accept="image/png, image/jpg, image/jpeg">
                <label class="font-weight-light text-muted upload-label" onclick="$(this).parent().find('.image-upload-input').click();">Choose image</label>
                <div class="input-group-append">
                    <label class="btn btn-light m-0 rounded-pill px-4" onclick="$(this).parent().parent().find('.image-upload-input').click();"><i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose image (regular: 348x314 | main: 1090x585)</small></label>
                </div>
            </div>
            <a href="javascript:void(0);" class="add-new-image-block m-0 p-0">
                <i class="fas fa-plus-circle text-primary"></i>
            </a>
            <div class="form-check form-switch is-main-block">
                <input class="form-check-input is-main" type="checkbox">
                <input class="is-main-input" type="hidden" name="is_main[]">
                <label class="form-check-label is-main-label">main image</label>
            </div>

            <!-- Uploaded image area-->
            <p class="font-italic text-black text-center">The image uploaded will be rendered inside the box below.</p>
            <div class="image-area mt-4">
                <i class="fas fa-minus-circle remove-image-from-input"></i>
            </div>
        </div>

        <a href="javascript:void(0);" class="btn btn-primary" id="save">{{ Route::currentRouteNamed('collages.create') ? 'SAVE' : 'UPDATE' }}</a>
    </form>

    @if(isset($collage) && !$collage->images->isEmpty())
        <div id="product-gallery" class="mt-5">
            <h3 class="mb-5">Pictures of this product</h3>
            @foreach ($collage->images as $image)
                <div class="image-item" id="item-{{ $image->id }}" style="background-image: url('/img/products/collages/{{ $image->name }}')">
                    <i class="fas fa-minus-circle delete-image delete-item" data-id="{{ $image->id }}" data-title="{{ $image->name }}" data-table="galleries"></i>
                    <div class="form-check form-switch is-main-block-for-exists">
                        <input class="form-check-input is-main-for-exists" type="checkbox" {{ $image->is_main ? 'checked' : '' }}>
                        <label class="form-check-label is-main-for-exists-label">main image</label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/admin/jewellery.js?v=' . date('YmdHis')) }}"></script>
@endsection
