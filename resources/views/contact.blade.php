@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection
@section('content')
    {{-- @include('components.header') --}}
    <div id="wrapper">
        <div id="left-sidebar">
            <div id="logo-block">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/icons/logo.png') }}">
                </a>
            </div>
            <div id="email-block">
                <div class="email-item">
                    <span>info@karinedavtyan.com</span>
                </div>
            </div>
        </div>
        <div class="contact-block {{ $errors->any() ? 'sidebar-animation-left' : '' }}">
            <div class="contact-form-block">
                <form action="{{ route('contacts.send') }}" method="POST" id="contact-form">
                    @csrf
                    <input class="contact-inputs" type="text" name="name" value="{{ !is_null(old('name')) ? old('name') : '' }}" autocomplete="off" placeholder="Name*" onfocus="if (this.placeholder == 'Name*') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Name*';}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input class="contact-inputs" type="text" name="email" value="{{ !is_null(old('email')) ? old('email') : '' }}" autocomplete="off" placeholder="Get back email*" onfocus="if (this.placeholder == 'Get back email*') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Get back email*';}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input class="contact-inputs" type="text" name="code" value="{{ !is_null(old('code')) ? old('code') : '' }}" autocomplete="off" placeholder="Item code (in case of enquiry)" onfocus="if (this.placeholder == 'Item code (in case of enquiry)') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Item code (in case of enquiry)';}">
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input class="contact-inputs" type="text" name="subject" value="{{ !is_null(old('subject')) ? old('subject') : '' }}" autocomplete="off" placeholder="Subject" onfocus="if (this.placeholder == 'Subject') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Subject';}">
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <textarea class="contact-inputs" id="contact-textarea" name="message" autocomplete="off" placeholder="Message*" onfocus="if (this.placeholder == 'Message*') {this.placeholder = '';}" onblur="if (this.placeholder == '') {this.placeholder = 'Message*';}">{{ !is_null(old('message')) ? old('message') : '' }}</textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <a href="javascript:void(0);" id="contact-button">
                        <span>Send</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
    {{-- @include('components.footer') --}}
@endsection

@section('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endsection
