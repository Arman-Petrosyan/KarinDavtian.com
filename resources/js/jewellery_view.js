import Swiper from '../js/swiper.min.js';

var swiper = new Swiper(".jewellry-slider", {
    loop: true,
    slidesPerView: 1,
    paginationClickable: true,
    mousewhell: true,
    mousewheelControl: true,
    mousewheelForceToAxis: true,
    speed: 350,
    autoplay: false,
    // autoplay: {
    //     delay: 1100,
    //     reverseDirection: false
    // },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

var showChar = 300;
var ellipsestext = "";
var moretext = 'more';
var lesstext = 'less';
var width = $(window).width();

if(width > 590) {
    $('#jewellry-description-block p').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="more-content"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="more-link">' + moretext + '</a></span>';
            $(this).html(html);
        }
    });
}

$(".more-link").click(function(){
    if($(this).hasClass("less")) {
        $(this).removeClass("less");
        $(this).html(moretext);
    } else {
        $(this).addClass("less");
        $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
});