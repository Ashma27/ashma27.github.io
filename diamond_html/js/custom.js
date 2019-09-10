$('.slick').slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    speed: 1000,
    arrow: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    centerMode: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
});
$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
        $('.header').addClass('fixed_header');
    }
    else {
        $('.header').removeClass('fixed_header');
    }
});
$('.swipebox').swipebox();
var forEach = function (t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t))
        for (var c in t)
            Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
    else
        for (var e = 0, l = t.length; l > e; e++)
            o.call(r, t[e], e, t)
};
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
        $('#mySidenav').css('left', '-290px');
    }
});
if ($(window).width() < 768) {
    $('#before1').insertAfter('#after1');
    $('#before2').insertAfter('#after2');
    $('#before3').insertAfter('#after3');
    $('#afterbtn').insertAfter('#beforebtn');
    $('#orderafter').insertAfter('#orderbefore');
    /*$('.labelbefore').insertBefore('.labelafter');
     $('#labelafter').insertAfter('#labelbefore');*/

    $('.advancec').click(function () {
        $('.advancediv').slideDown();
    });
    $('.advancec1').click(function () {
        $('.advancediv').slideUp();
    });
}
else {

    $('.advancec').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('.advancediv').slideUp();
            $(this).children('.fa').removeClass('this');
        }
        else {
            $(this).addClass('active');
            $('.advancediv').slideDown();
            $(this).children('.fa').addClass('this');
        }
    });
}
$('.advancediv').hide();
$('ul.nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
    $(this).addClass('active');
}, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
    $(this).removeClass('active');
});
$('.searchme').click(function (event) {
    $('.sinput').css('width', '160px').css('padding', '5px 5px 5px 33px').css('border', '1px solid #FF5B67');
    $(this).addClass('active');
    event.stopPropagation();
});
$('body').click(function () {
    if ($('.searchme').hasClass('active')) {
        $('.sinput').css('width', '0px').css('padding', '0').css('border', 'none');
        $(this).removeClass('active');
    }

});
$('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                    ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 2000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });

$(document).on("click", ".myshap", function (e) {
    e.preventDefault();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.myshap').children('input').prop("checked", false);
    }
    else {
        $(this).addClass('active');
        $(this).children('input').prop("checked", true);
    }
});

$(document).on("click", ".mylab", function (e) {
    e.preventDefault();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.mylab').children('input').prop("checked", false);
    }
    else {
        $(this).addClass('active');
        $(this).children('input').prop("checked", true);
    }
});

$(document).on("click", ".mystyle", function (e) {
    e.preventDefault();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.mystyle').children('input').prop("checked", false);
    }
    else {
        $(this).addClass('active');
        $(this).children('input').prop("checked", true);
    }
});
$(document).on("click", ".metals", function (e) {
    e.preventDefault();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.metals').children('input').prop("checked", false);
    }
    else {
        //$('.metals').removeClass('active');
        $(this).addClass('active');
        $(this).children('input').prop("checked", true);
    }
});
$(document).on("click", ".metal", function (e) {
    e.preventDefault();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.metals').children('input').prop("checked", false);
    }
    else {
        $('.metals').removeClass('active');
        $(this).addClass('active');
        $(this).children('input').prop("checked", true);
    }
});


$("#slider-range").slider({
    range: true,
    min: 200,
    max: 500,
    values: [200, 100],
    slide: function (event, ui) {
        $("#amount1").val(ui.values[ 0 ]);
        $("#amount2").val(ui.values[ 1 ]);
    }
});


$("#amount1").on("keyup", function () {
    $("#slider-range").slider('values', 0, $(this).val());
});
$("#amount2").on("keyup", function () {
    $("#slider-range").slider('values', 1, $(this).val());
});



$("#amount1").slider({
    range: true,
    min: 0,
    max: 1000,
    values: [200, 300]
});
$("#amount1").on("slide", function (slideEvt) {
    $('#amount1left').val(slideEvt.value[0]);
    $('#amount1right').val(slideEvt.value[1]);
});
$('#amount2').slider({
    range: true,
    min: 0,
    max: 1000,
    values: [200, 300]
});
$("#amount2").on("slide", function (slideEvt) {
    $('#amount2left').val(slideEvt.value[0]);
    $('#amount2right').val(slideEvt.value[1]);
});

$('#amount3').slider({
    range: true,
    min: 0,
    max: 1000,
    values: [200, 300]
});
$("#amount3").on("slide", function (slideEvt) {
    $('#amount3left').val(slideEvt.value[0]);
    $('#amount3right').val(slideEvt.value[1]);
});

$('#amount4').slider({
    range: true,
    min: 0,
    max: 1000,
    values: [200, 300]
});
$("#amount4").on("slide", function (slideEvt) {
    $('#amount4left').val(slideEvt.value[0]);
    $('#amount4right').val(slideEvt.value[1]);
});

$("#ex11").slider({
    ticks: [0, 100, 200, 300, 400, 500],
    ticks_labels: ['Poor', 'Fair', 'Good', 'Very Good', 'Excellent', 'Good'],
    value: [0, 500],
    min: 0,
    max: 500,
    focus: true
});
$("#ex12").slider({
    ticks: [0, 100, 200, 300, 400, 500, 600, 700],
    ticks_labels: ['I2', 'I1', 'SI2', 'VS2', 'VS1', 'VVS1', 'IF', 'FL'],
    value: [0, 500],
    min: 0,
    max: 500,
    focus: true,
});
$("#ex13").slider({
    ticks: [0, 100, 200, 300, 400, 500, 600],
    ticks_labels: ['J', 'I', 'H', 'G', 'F', 'E', 'D'],
    value: [0, 500],
    min: 0,
    max: 500,
    focus: true,
});

$("#ex14").slider({
    ticks: [0, 100, 200, 300, 400, 500, 600],
    ticks_labels: ['J', 'I', 'H', 'G', 'F', 'E', 'D'],
    value: [0, 500],
    min: 0,
    max: 500,
    focus: true,
});
$("#ex15").slider({
    ticks: [0, 100, 200, 300, 400, 500, 600],
    ticks_labels: ['J', 'I', 'H', 'G', 'F', 'E', 'D'],
    value: [0, 500],
    min: 0,
    max: 500,
    focus: true,
});

$("#ex16").slider({
    ticks: [0, 100, 200, 300, 400, 500, 600],
    ticks_labels: ['J', 'I', 'H', 'G', 'F', 'E', 'D'],
    value: [0, 500],
    min: 0,
    max: 500,
    focus: true,
});


$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});




$('.myfilterhide').click(function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.myfilters').slideDown();
        $(this).children('.fa').removeClass('this');
        $(this).children('span').html("Hide Filters");
    }
    else {
        $(this).addClass('active');
        $('.myfilters').slideUp();
        $(this).children('span').html("Show Filters");
        $(this).children('.fa').addClass('this');
    }
});

$('.cbtns').click(function () {
    var id = $(this).data('id');
    $('.filter' + id).addClass('active');
});
$('.closeffilter').click(function () {
    $('.ffilter').removeClass('active');
});

$('.dmenu').click(function () {
    if ($(this).hasClass('active')) {
        $('.inset').slideUp();
        $('.dmenu').removeClass('active');
    }
    else {
        $('.inset').slideUp();
        $('.dmenu').removeClass('active');
        $(this).next('.inset').slideDown();
        $(this).addClass('active');
    }
});

if ($(window).width() <= 767) {
    $('#stepstop1').insertAfter($('#certified1'));
}


$('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                    ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 2000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });

$('.selectGrid').hide();
$('.changeView').click(function () {
    $('.changeView').removeClass('active');
    $(this).addClass('active');
    var type = $(this).data('type');
    $('.mytypes').hide();
    $('.' + type).fadeIn();
});

$('.mobilelistview').change(function () {
    var val = $(this).val();
    if (val == 1) {
        $('.mytypes').hide();
        $('.selectGrid').fadeIn();
    }
    else {
        $('.mytypes').hide();
        $('.selectList1').fadeIn();
    }
});

$('.allibox').click(function () {
    $('.allibox').removeClass('active');
    $(this).addClass('active');
    var src = $(this).children('img').attr('src');
    $(this).parents('.ringdet').prev('.ringpic ').children('img').attr('src', src);
});

$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});

$('.slicksimilar').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 5,
    slidesToScroll: 2,
    adaptiveHeight: true,
    prevArrow: $('.slider_button--prev'),
    nextArrow: $('.slider_button--next'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                infinite: true,
                dots: true
            }
        }]
});


$('.slick1').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 5,
    slidesToScroll: 2,
    adaptiveHeight: true,
    prevArrow: $('.slider_button--prev'),
    nextArrow: $('.slider_button--next'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 581,
            settings: {
                slidesToShow: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 414,
            settings: {
                slidesToShow: 1,
                infinite: true,
                dots: true
            }
        }]
});
