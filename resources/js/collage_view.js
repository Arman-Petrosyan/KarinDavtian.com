import Swiper from '../js/swiper.min.js';

var swiper = new Swiper(".collage-slider", {
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