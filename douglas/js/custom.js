
$('.smalllinks').on('click', 'a', function () {
    $('.slick').slick('slickGoTo', $(this).data('index'));
});


$(window).scroll(function () {
    if ($(window).scrollTop() >= ($('.section1').innerHeight() - 10)) {
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

$('.link').click(function () {
    $('.hamburger').removeClass('is-active');
    $('#mySidenav').css('left', '-250px');
});

jQuery(".signup").click(function () {
    if (jQuery("#formid").valid()) {
        jQuery.ajax({
            url: "mail.php",
            type: "POST",
            data: jQuery('#formid').serialize(),
            success: function (data) {
                jQuery('.message').slideDown();
                jQuery('#formid')[0].reset();
            }
        });
    }
});

$(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});
if ($(window).width() >= 992) {
    $('#fullpage').fullpage({
        anchors: ['section1', 'section2', 'section3', 'section4', 'section5', 'footer'],
        menu: '#myMenu',
        touchSensitivity: 15,
        scrollHorizontally: true,
//    scrollHorizontallyKey: 'YWx2YXJvdHJpZ28uY29tX01mU2MyTnliMnhzU0c5eWFYcHZiblJoYkd4NVNRcg==',
        afterLoad: function (anchorLink, index) {
            history.pushState(null, null, "index.html");
        },
        onLeave: function (anchorLink, index) {

            //using index
            if (index >= '2') {
                setTimeout(function () {
                    $('.header').addClass('fixed_header');
                }, 350);
            }
            else {
                setTimeout(function () {
                    $('.header').removeClass('fixed_header');
                }, 550);
            }
        }
    });
}
else {
    for (a = 0; a <= 5; a++) {
        $('.section' + a).attr('id', 'section' + a);
    }
}

$(window).scroll(function () {
    var scrollDistance = $(window).scrollTop();
    $('.section').each(function (i) {
        if ($(this).offset().top <= scrollDistance) {
            $('#mySidenav a.active').removeClass('active');
            $('#mySidenav a').eq(i).addClass('active');
        }
    });
}).scroll();
