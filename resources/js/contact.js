$(window).on('load', function() {
    setTimeout(function() {
        $(".contact-block").addClass("sidebar-animation-left");
    }, 700);
});

$('#contact-button').on('click', function() {
    $('#contact-form').submit();
});