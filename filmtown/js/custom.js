$('.slick').slick({
    dots: true,
    infinite: true,
    speed: 350,
    arrow: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    //autoplay: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                infinite: true,
                dots: true
            }
        }]
});

$('.slick1').slick({
    dots: true,
    infinite: true,
    speed: 350,
    arrow: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    //autoplay: true,
    prevArrow: $('.slider_button--prev'),
    nextArrow: $('.slider_button--next'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                infinite: true,
                dots: true
            }
        }]
});

$('.slick2').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    adaptiveHeight: true,
    //autoplay: true,
    evArrow: $('#prev2'),
    nextArrow: $('#next2'),
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 561,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});

$('.slick3').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    //autoplay: true,
    prevArrow: $('#prev3'),
    nextArrow: $('#next3'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                infinite: true,
                dots: true
            }
        }]
});

$('.slick4').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    //autoplay: true,
    prevArrow: $('#prev4'),
    nextArrow: $('#next4'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                infinite: true,
                dots: true
            }
        }]
});



$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
        $('.headtop').addClass('fixed_header');
    }
    else {
        $('.headtop').removeClass('fixed_header');
    }
});

var forEach = function (t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t))
        for (var c in t)
            Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
    else
        for (var e = 0, l = t.length; l > e; e++)
            o.call(r, t[e], e, t)
};
var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
    forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}
$('.hamburger').click(function () {
    if ($(this).hasClass('is-active')) {
        $('#mySidenav').css('left', '0px');
    }
    else {
        $('#mySidenav').css('left', '-250px');
    }
});