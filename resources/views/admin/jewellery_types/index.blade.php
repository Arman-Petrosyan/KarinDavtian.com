@extends('layouts.admin')

@section('styles')
    <style>
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
    </style>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr id="item-{{ $type->id }}">
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input type-status-switcher" type="checkbox" {{ $type->status ? 'checked' : '' }} data-id="{{ $type->id }}">
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin/jewellery_types.js?v=' . date('YmdHis')) }}"></script>
@endsection
