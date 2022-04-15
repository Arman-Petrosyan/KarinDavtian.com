$('.nav-link').on('click', function() {
    var id = $(this).attr('id')

    // Make term active
    $('.nav-link').parent().removeClass('active');
    $(`#${id}`).parent().addClass('active')

    showText(id);
});

function showText(id)
{
    let width = $(window).width();
    // Show term's text
    $('.terms-text-item, .mobile-term-data').removeClass('active');
    $(`#${id}-text`).addClass('active');

    if(width <= 1050)
        $(`#${id}-text-mobile`).slideToggle();
}
