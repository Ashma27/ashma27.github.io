$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
        $('.menu1').addClass('fixed_header');
    }
    else {
        $('.menu1').removeClass('fixed_header');
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

$('.slick1').slick({
    dots: false,
    infinite: true,
    speed: 500,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    //autoplay: true,
    adaptiveHeight: true,
    prevArrow: $('.slprev1'),
    nextArrow: $('.slnext1'),
});


