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

@section('content')
    <form action="{{ route('term.update', 1) }}" method="POST" enctype="multipart/form-data" id="action-form">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label for="general">General terms</label>
            <textarea class="form-control" id="general" rows="10" name="general" placeholder="General terms" onfocus="if (this.placeholder == 'General terms') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'General terms';}" autocomplete="off" required>{{ !is_null(old('general')) ? old('general') : (isset($term) ? $term->general : '') }}</textarea>
            @error('general')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="caring">Caring terms</label>
            <textarea class="form-control" id="general" rows="10" name="caring" placeholder="Caring terms" onfocus="if (this.placeholder == 'Caring terms') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Caring terms';}" autocomplete="off" required>{{ !is_null(old('caring')) ? old('caring') : (isset($term) ? $term->caring : '') }}</textarea>
            @error('caring')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="material">Material terms</label>
            <textarea class="form-control" id="material" rows="10" name="material" placeholder="Material terms" onfocus="if (this.placeholder == 'Material terms') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Material terms';}" autocomplete="off" required>{{ !is_null(old('material')) ? old('material') : (isset($term) ? $term->material : '') }}</textarea>
            @error('material')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="customer">Customer terms</label>
            <textarea class="form-control" id="customer" rows="10" name="customer" placeholder="Customer terms" onfocus="if (this.placeholder == 'Customer terms') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Customer terms';}" autocomplete="off" required>{{ !is_null(old('customer')) ? old('customer') : (isset($term) ? $term->customer : '') }}</textarea>
            @error('customer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <a href="javascript:void(0);" class="btn btn-primary" onclick="$('#action-form').submit()">UPDATE</a>
    </form>
@endsection
