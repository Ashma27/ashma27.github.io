//var windowWidth = $(window).width();
//if (windowWidth > 767) {
//    var windowheight = $('body').outerHeight();
//    var header = $('.header-height').outerHeight();
//    $('.height-get').outerHeight(windowheight - header);
//    $('.leftHeight').outerHeight(windowheight);
//    $(window).resize(function () {
//        var windowheight = $('body').outerHeight();
//        var header = $('.header-height').outerHeight();
//        $('.height-get').outerHeight(windowheight - header);
//        $('.leftHeight').outerHeight(windowheight);
//    });
//}

$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
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
var search = document.querySelectorAll(".searchme");
if (hamburgers.length > 0) {
    forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}
if (search.length > 0) {
    forEach(search, function (search) {
        search.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}
$('.searchme').click(function () {
    $('.hamburger').addClass('is-active');
    $('.hamburger').css('background', '#142738');
    $('#mySidenav').css('left', '0px');
    $('.festivel').animate({'margin-left': '290px'}, 'slow');
});
$('.hamburger').click(function () {
    if ($(this).hasClass('is-active')) {
        $('.hamburger').css('background', '#142738');
        $('#mySidenav').css('left', '0px');
        $('.festivel').animate({'margin-left': '290px'}, 'slow');
    }
    else {
        $('.hamburger').css('background', '#000');
        $('#mySidenav').css('left', '-290px');
        $('.festivel').animate({'margin-left': '0px'}, 'slow');
    }
});
var windowWidth = $(window).width();
if (windowWidth < 561) {
    $('.hamburger, .searchme').click(function () {

        if ($(this).hasClass('is-active')) {
            $('#mySidenav').css('left', '0px');
            $('.festivel').animate({'margin-left': '265px'}, 'slow');
        }
        else {
            $('#mySidenav').css('left', '-265px');
            $('.festivel').animate({'margin-left': '0px'}, 'slow');
        }
    });
}



$('.slick').slick({
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 2,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        }]
});
$('.tab').click(function () {
    if ($(this).hasClass('active')) {
        $('.tab').find('span').removeClass('color');
        $('.tab').find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        $('.tab').removeClass('active');
        $('.tabs').slideUp();
    }
    else {
        var id = $(this).data('id');
        $('.tab').find('span').removeClass('color');
        $(this).find('span').addClass('color');
        $('.tab').find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        $(this).find('.fa').addClass('fa-chevron-up').removeClass('fa-chevron-down');
        $('.tab').removeClass('active');
        $(this).addClass('active');
        $('.tabs').slideUp();
        $('#tab' + id).slideDown();
    }
});
$('ul.nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
var windowWidth = $(window).width();
if (windowWidth < 768) {
    $('.dropdown').on('show.bs.dropdown', function (e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });
    $('.dropdown').on('hide.bs.dropdown', function (e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });
}



$('.hamburger').click(function () {
    $('#target').show(500);
    $('search1').hide(0);
    $('.left_inner').show(0);
    $('.search1 ').hide();
});
$('.searchme').click(function () {
    $('#target').hide(500);
    $('.search1').show(0);
    $('.left_inner').hide(0);
});
$('.toggle').click(function () {
    $('#target').toggle('slow');
});
$("body").on("click", ".hamburger", function () {
    $(".box").toggle(); /*shows or hides #box*/


});
$("body").on("click", ".searchme", function () {
    $(".box").toggle(); /*shows or hides #box*/


});