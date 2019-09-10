$(window).scroll(function () {
    if ($(window).scrollTop() >= 5) {
        $('.header').addClass('fixed_header');
    }
    else {
        $('.header').removeClass('fixed_header');
    }
});
$('.nopass').on('keyup keypress change', function (event) {
    var value = $(this).val();
    $('#usr11').val(Math.ceil(value / 4));
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
var book = document.querySelectorAll(".book");
if (book.length > 0) {
    forEach(book, function (book) {
        book.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}
$('.book').click(function () {
    if ($(this).hasClass('is-active')) {
        $('.form-set').css('right', '60px');
    }
    else {
        $('.form-set').css('right', '-100%');
    }
});

var next = document.querySelectorAll(".next");
if (next.length > 0) {
    forEach(next, function (book) {
        book.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}
$('.relative').css({'height': (($('.firstbook').height())) + 'px'});
$('.next').click(function () {
    $('.firstbook').css('right', '104%');
    $('.secondbook').css('right', '0%');
});

$('.backbt').click(function () {
    $('.firstbook').css('right', '0%');
    $('.secondbook').css('right', '-101%');
});
$('.shape').css({'height': (($(window).height()) - 100) + 'px'});
if ($(window).width() <= 1366) {
    $('.book').click(function () {
        if ($(this).hasClass('is-active')) {
            $('.form-set').css('right', '54px');
        }
        else {
            $('.form-set').css('right', '-100%');
        }
    });
}
;
if ($(window).width() <= 767) {
    $('.firstbook').css({'width': (($(window).width()) - 40)});
    $('.firstbook').css({'width': (($(window).width()) - 40)});
    $('.firstbook, .secondbook').css({'height': (($(window).innerHeight()))});
    $('.book').click(function () {
        $('.form-set').css('right', '0px');
    });
    $('.form-close').click(function () {
        $('.form-set').css('right', '-100%');
    });
}
;
$(document).ready(function () {
    $('a[href*=#]').bind('click', function (e) {
        e.preventDefault(); // prevent hard jump, the default behavior

        var target = $(this).attr("href"); // Set the target as variable

        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 2000, function () {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });

        return false;
    });
});