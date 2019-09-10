$(window).scroll(function () {
    if ($(window).scrollTop() >= 15) {
        $('.headerbtm').addClass('fixed_header');
    }
    else {
        $('.headerbtm').removeClass('fixed_header');
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
        $('#mySidenav').css('left', '-255px');
    }
});
$('.slick_update').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    //prevArrow: $('.prev'),
    //nextArrow: $('.next')

});
$('.slick_update_ar').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    rtl: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    //prevArrow: $('.prev'),
    //nextArrow: $('.next')

});
$('.slick_gallery').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    fade: true
});
$('.slick_gallery_ar').slick({
    dots: false,
    infinite: true,
    speed: 350,
    rtl: true,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    fade: true
});


window.onscroll = function () {
    scrollFunction()
};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

$("[data-fancybox]").fancybox({
    selector: '[data-fancybox="images"]',
    loop: true
});

$('.special').hide();
$('.special1').show();
$('.clickme').click(function () {
    var type = $(this).data('type');
    $('.special').hide();
    $('.special' + type).fadeIn();
    $('.clickme').removeClass('active');
    $(this).addClass('active');
});
if ($(window).width() <= 767) {
    $('.special').show();
}


$('.clickmenu').click(function () {
    $('.clickmenu').removeClass('active');
    $(this).addClass('active');
});

function previewImage(targetObj, View_area) {
    var preview = document.getElementById(View_area); //div id
    var ua = window.navigator.userAgent;
    //ie??(IE8 ????? ??)
    if (ua.indexOf("MSIE") > -1) {
        targetObj.select();
        try {
            var src = document.selection.createRange().text; // get file full path(IE9, IE10?? ?? ??)
            var ie_preview_error = document.getElementById("ie_preview_error_" + View_area);
            if (ie_preview_error) {
                preview.removeChild(ie_preview_error); //error? ??? delete
            }

            var img = document.getElementById(View_area); //???? ??? ?

            //??? ??, sizingMethod? div? ??? ???? ???? ?? ??
            img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')";
        } catch (e) {
            if (!document.getElementById("ie_preview_error_" + View_area)) {
                var info = document.createElement("<p>");
                info.id = "ie_preview_error_" + View_area;
                info.innerHTML = e.name;
                preview.insertBefore(info, null);
            }
        }
        //ie? ???(??, ???, FF)
    } else {
        var files = targetObj.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/; //??? ??????.. ????.
            if (!file.type.match(imageType))
                continue;
            var prevImg = document.getElementById("prev_" + View_area); //??? ????? ??? ??
            if (prevImg) {
                preview.removeChild(prevImg);
            }
            var img = document.createElement("img");
            img.id = "prev_" + View_area;
            img.classList.add("obj");
            img.file = file;
            img.style.width = '100px';
            img.style.height = '100px';
            preview.appendChild(img);
            if (window.FileReader) { // FireFox, Chrome, Opera ??.
                var reader = new FileReader();
                reader.onloadend = (function (aImg) {
                    return function (e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            } else { // safari is not supported FileReader
                //alert('not supported FileReader');
                if (!document.getElementById("sfr_preview_error_"
                        + View_area)) {
                    var info = document.createElement("p");
                    info.id = "sfr_preview_error_" + View_area;
                    info.innerHTML = "not supported FileReader";
                    preview.insertBefore(info, null);
                }
            }
        }
    }
}

//Signup form 2 step validation
$("#register").click(function () {
    if ($("#signupform").valid()) {

        $.ajax({
            url: "http://designoweb.work/mail",
            type: "POST",
            data: $('#signupform').serialize(),
            success: function (data) {
                $('.msgs').slideDown();
                $("#signupform")[0].reset();
            }

        });
        $('.msgs').slideDown();
        $("#signupform")[0].reset();
    }
});


$("#register1").click(function () {

    if ($("#signupform1").valid()) {
        var fd = new FormData(document.getElementById("signupform1"));
        fd.append("label", "WEBUPLOAD");

        $.ajax({
            url: "http://designoweb.work/dsah-html/mail1.php",
            async: false,
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (data) {
                $('.msgs1').slideDown();
                $("#signupform1")[0].reset();
            }

        });
        $('.msgs1').slideDown();
        $("#signupform1")[0].reset();
    }
});

$(window).load(function () {
    $('.myloader').fadeOut();
});

new WOW().init();

$(document).ready(function () {
    $('a[href*=#]').bind('click', function (e) {
        //e.preventDefault(); // prevent hard jump, the default behavior

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


var scrollDistance = $('.services').offset().top;
$(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    $('.page-section').each(function (f) {
        var topDistance = $(this).offset().top;
        if ((topDistance - 100) < scrollTop) {
            var id = $(this).attr('id');
            $('.navigation a').removeClass('active');
            $(".navigation a[href=#" + id + "]").addClass("active");
        }
    });
}).scroll();

$(window).scroll(function () {
    if ($(window).scrollTop() >= 500) {
        $('.servouter1').addClass('fixed_services');
        $('.servouter1').removeClass('absolute_services');
    }
    else {
        $('.servouter1').removeClass('fixed_services');
    }
});
$(window).scroll(function () {
    var s = $('.relative1').innerHeight();
    if ($(window).scrollTop() >= s + 100) {
        $('.servouter1').removeClass('fixed_services');
        $('.servouter1').addClass('absolute_services');
    }
});
$('.ramjanlink').click(function () {
    $(".ramjanbody").slick("refresh");
});
$(".ramjanbody").slick("refresh");

