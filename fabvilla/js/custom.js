
$(window).scroll(function () {
    if ($(window).scrollTop() >= 150) {
        $('.headerbtm').addClass('fixed_header');
    }
    else {
        $('.headerbtm').removeClass('fixed_header');
    }
});

$(window).scroll(function () {
    if ($(window).scrollTop() >= 150) {
        $('.headerbtm2').addClass('fixed_header');
    }
    else {
        $('.headerbtm2').removeClass('fixed_header');
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
    dots: false,
    infinite: true,
    arrow: false,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
});


$(document).ready(function () {
    $('.cards').hide();
    $('.carda').show();
    $('.clickme').click(function () {
        var type = $(this).data('type');
        $('.cards').hide();
        $('.card' + type).fadeIn();
        $('.clickme').removeClass('active');
        $(this).addClass('active');
    });
});

jQuery(document).ready(function () {
    // This button will increment the value
    $('.qtyplus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
});

if ($(window).width() <= 767) {
    $('.btmnavs').hide();
    $('.clickme1').click(function () {
        if ($(this).hasClass('active')) {
            $('.clickme1').removeClass('active');
            $('.btmnavs').slideUp();
        }
        else {
            $('.clickme1').removeClass('active');
            $(this).addClass('active');
            $('.btmnavs').slideUp();
            var type = $(this).data('type');
            $('.btmnav' + type).slideDown();
        }
    });
}

$(document).ready(function () {
    $('.morecolor').hide();
    $('.showmorecolor').click(function () {
        $('.morecolor').slideToggle();
        $(this).toggleClass('active');
    });
});

$(document).ready(function () {
    $('.morework').hide();
    $('.showmorework').click(function () {
        $('.morework').slideToggle();
        $(this).toggleClass('active');
    });
});

$('.product-slider').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    //autoplay: true,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 669,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 469,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        }],
});

$('.showsidenav').click(function () {
    if ($(this).hasClass('active')) {
        $('.headerbtm2').css('left', '-260px');
        $(this).removeClass('active');
    }
    else {
        $('.headerbtm2').css('left', '0px');
        $(this).addClass('active');
    }
});

