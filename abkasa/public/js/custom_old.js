$('input[type="radio"]').click(function () {
    var inputValue = $(this).attr("value");
    var targetBox = $("." + inputValue);
    $(".payementtabs").not(targetBox).slideUp();
    $(targetBox).slideDown();
});

$('.form-control').keyup(function () {
    if ($(this).val().length > 0) {
        $(this).closest('.input-effect').addClass('filled');
    } else {
        $(this).closest('.input-effect').removeClass('filled');
    }
});
//$(window).load(function () {
//    $("input").val("");
//    $(".input-effect input").focusout(function () {
//        if ($(this).val() != "") {
//            $(this).addClass("has-content");
//        } else {
//            $(this).removeClass("has-content");
//        }
//    })
//});

$(document).ready(function () {

    //Show carousel-control

    $("#myCarousel").mouseover(function () {
        $("#myCarousel .carousel-control").show();
    });

    $("#myCarousel").mouseleave(function () {
        $("#myCarousel .carousel-control").hide();
    });

    //Active thumbnail

    $("#thumbCarousel .thumb").on("click", function () {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");

    });

    //When the carousel slides, auto update

    $('#myCarousel').on('slid.bs.carousel', function () {
        var index = $('.carousel-inner .item.active').index();
        //console.log(index);
        var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="' + index + '"]');
        thumbnailActive.addClass('active');
        $(thumbnailActive).siblings().removeClass("active");
        //console.log($(thumbnailActive).siblings()); 
    });
});

function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    value < 2 ? value = 2 : '';
    value--;
    document.getElementById('number').value = value;
}
$('.forcartlink').click(function () {
    $('.forcartlink').removeClass('active');
    $(this).addClass('active');
});
$(window).load(function () {
    setTimeout(function () {
        $('.header').removeClass('headerloader')
    }, 2000);
});
$('.typeA').hide();
$('.typesa').show();
$('.clickme').click(function () {
    var type = $(this).data('type');
    $('.typeA').hide();
    $('.types' + type).fadeIn();
    $('.clickme').removeClass('active');
    $(this).addClass('active');

});
$('.ShirtsN').hide();
$('.shirt001').show();
$('.shtylink').click(function () {
    var id = $(this).data('id');
    $('.ShirtsN').hide();
    $('.shirt' + id).fadeIn();
    $('.shtylink').removeClass('active');
    $(this).addClass('active');

});
$('.acnttab').hide();
$('.acnttab1').show();
$('.myactablinks').click(function () {
    var id = $(this).data('id');
    $('.acnttab').hide();
    $('.acnttab' + id).fadeIn();
    $('.myactablinks').removeClass('active');
    $(this).addClass('active');

});
$('.Ordertabd').hide();
$('.Ordertabd1').show();
$('.orderlink').click(function () {
    var id = $(this).data('id');
    $('.Ordertabd').hide();
    $('.Ordertabd' + id).fadeIn();
    $('.orderlink').removeClass('active');
    $(this).addClass('active');

});
wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
);
wow.init();
//$('.filterBtnN').click(function () {
//    $('.onclickfilterbox').toggleClass('active');
//});
$('.filterBtnN').click(function () {
    $('.onclickfilterbox').slideToggle();
});
$('.cartopenlink').click(function () {
    $('.cartsidenav').addClass('active');
});
$('.cartclose').click(function () {
    $('.cartsidenav').removeClass('active');
});
$(document).on('click', '#closeCart', function () {
    $('.cartsidenav').removeClass('active');
});

//var userFeed = new Instafeed({
//    // get: 'user',
//    // userId: '1486062463',
//    get: 'tagged',
//    tagName: 'buildings',
//    limit: '8',
//    resolution: 'standard_resolution',
//    accessToken: '1486062463.ba4c844.416c15f74ebf4f2498c0d37084acd387',
//    template: '<a href="{{link}}" target="_blank"><img src="{{image}}"/></a>',
//});
//userFeed.run();
$('.dropdown').click(function () {
    if ($(this).children('.links').hasClass('active')) {
        $(this).children('.links').removeClass('active');
        $(this).children('.items').slideUp();
    } else {
        $('.dropdown').children('.links').removeClass('active');
        $('.dropdown').children('.items').slideUp();

        $(this).children('.links').addClass('active');
        $(this).children('.items').slideDown();
    }

});


var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
// Replace the 'ytplayer' element with an <iframe> and
// YouTube player after the API code downloads.
var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
        height: '1080',
        width: '1920',
        videoId: 'P8Jd9QdNXAo',
        playerVars: {
            'autoplay': 1,
            'showinfo': 0,
            'controls': 0
        }
    });
}



$(window).scroll(function () {
    if ($(window).scrollTop() >= 20) {
        $('.header').addClass('fixed_header');
        $(".prodetailheader").fadeOut(500);
    } else {
        $('.header').removeClass('fixed_header');
        $(".prodetailheader").fadeIn(500);
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

//    if ($(this).hasClass('is-active')) {
//        $('#mySidenav').css('right', '20px');
//    }
//    else {
//        $('#mySidenav').css('right', '-100%');
//    }
    $('.header').toggleClass('is-open');
    $('body').toggleClass('bodyhidden');
});

$('.slick').slick({
    dots: false,
    arrows: true,
    autoplay: false,
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
$('.productslick').slick({
    dots: false,
    arrows: false,
    autoplay: true,
    fade: true,
    autoplaySpeed: 2000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    adaptiveHeight: false,
});
$('.productslicklist').slick({
    dots: false,
    arrows: true,
    autoplay: false,
    fade: true,
    autoplaySpeed: 2000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    adaptiveHeight: false,
});
$('.tab').click(function () {
    if ($(this).hasClass('active')) {
        $('.tab').find('span').removeClass('color');
        $('.tab').find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        $('.tab').removeClass('active');
        $('.tabs').slideUp();
    } else {
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
$(window).scroll(function () {
    // $('.fixheader').removeClass('fixheadercase');
});
inView('.inView').on('enter', function (el) {
    var type = $(el).data('type');
    if (type == "white") {
        $('.header').removeClass('fixheaderblack');
        $('.header').addClass('fixheaderwhite');
    } else if (type == "black") {
        $('.header').addClass('fixheaderblack');
        $('.header').removeClass('fixheaderwhite');
    } else {
        $('.header').removeClass('fixheaderblack');
    }
});
$('.checkdiv').change(function () {
    if ($(this).prop("checked") == true) {
        $(".filtersection ul").append("<li class='tagbox'><input type='checkbox' class='checkdiv'  checked><label>Heritage<span><img src='img/close.svg' alt='close'></span></label></li>");
    } else {
        $(".filtersection ul li").remove();
    }
});
//$('.filtersection .tagbox .checkdiv').change(function () {
//    if ($(this).prop("checked") == false) {
//    $(".filtersection ul li").remove();
//}
//});