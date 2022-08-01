$('.nav-link').on('click', function() {
    var id = $(this).attr('id')

    // Make term active
    $('.nav-link').parent().removeClass('active');
    // $('.nav-link').parent().removeClass('activeStick');

    $('.nav-link').each(function() {
        if(!$(this).is(`#${id}`)) {
            $(this).parent().removeClass('activeStick');
        }
    })

    // if()

    $(`#${id}`).parent().toggleClass('activeStick')
    $(`#${id}`).parent().addClass('active')

    showText(id);
});

function showText(id)
{
    let width = $(window).width();
    // Show term's text
    $('.terms-text-item, .mobile-term-data').removeClass('active');
    $(`#${id}-text`).addClass('active');

    // if(width <= 650) {

        $('.terms-for-mobile').each(function() {
            if(!$(this).is(`#${id}-text-mobile`))
                $(this).slideUp();
        });

        $(`#${id}-text-mobile`).slideToggle();
    // }
}
