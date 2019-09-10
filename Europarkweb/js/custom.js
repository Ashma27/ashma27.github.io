$(window).scroll(function () {
    if ($(window).scrollTop() >= 75) {
        $('.header').addClass('fixed_header');
    }
    else {
        $('.header').removeClass('fixed_header');
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

$('.slick').slick({
    slide: '.slider__item',
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    fade: true,
    slidesToShow: 1,
    adaptiveHeight: false
});

var slideCount = $('.slideCount');
var slickSlide = $('.slick');

slickSlide.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $(this).find('.slideCount').html('<span class="slideCountItem">' + i + ' / </span> ' + ' <span class="slideCountAll"> ' + slick.slideCount + '</span>');
});
$('.search i').click(function () {
    $('.search span').toggleClass('active');
});


$('.slidedini').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    adaptiveHeight: false,
    autoplay: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                infinite: true
            }
        },
    {
            breakpoint: 560,
            settings: {
                slidesToShow: 1
            }
        }]
});