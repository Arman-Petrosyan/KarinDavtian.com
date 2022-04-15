require('./bootstrap');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('#csrf-token').attr('content')
    }
});