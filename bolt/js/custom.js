

$('.slick').slick({
    dots: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        }]

});

$('.map_cmn').click(function () {
    //$('.slick')[0].slick.refresh();
});
$('.map_box ul li a').click(function () {
    //$('.slick')[0].slick.refresh();
});




//map

$(document).ready(function () {
    $("#cir_click1").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click2").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click3").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click4").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click5").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click6").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click7").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click8").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click9").click(function () {
        $("#mapslider1").show();
    });

    $("#cir_click10").click(function () {
        $("#mapslider1").show();
    });

});


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
$('.slickhome').slick({
    dots: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 1560,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 1420,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        }]
});
$('.slick2home').slick({
    dots: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 4,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 1560,
            settings: {
                slidesToShow: 4,
                infinite: false,
            }
        },
        {
            breakpoint: 1420,
            settings: {
                slidesToShow: 3,
                infinite: false,
            }
        },
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 3,
                infinite: false,
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                infinite: false,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                infinite: false,
            }
        }
    ]
});

var $stt = $(".carousel-status2");
var $slickE3 = $(".slick2home");
$slickE3.on("init reInit afterChange", function (
        event,
        slick,
        currentSlide,
        nextSlide
        ) {
    var ikk = (currentSlide ? currentSlide : 0) + 1;
   $stt.html("<span>0"+ikk+"</span>"+"&nbsp;" + "&nbsp;"+" / "+"&nbsp;" +"&nbsp;" + "0" + slick.slideCount);
});
$('.carousel-status2').html("<span>01</span>"+"&nbsp;"+"&nbsp;" + " / "+"&nbsp;" +"&nbsp;"+ '07');
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


$(".map_img_text h2 .fa").click(function(){
    $(".map_slider ").hide();
});


$('.closes').click(function() {
    $('.map_slider').hide();
})


window.onclick = function() {closeModel(event)};

function closeModel(event) {
    var m = document.getElementById('mapslider1');
    if(event.target == m) {
        m.style.display = 'none';
    }
}
var slide_Index = 1;
showSlidess(slide_Index);

function plusSlidess(n) {
    showSlidess(slide_Index += n);
}

function currentSlides(n) {
    showSlidess(slide_Index = n);
}

function showSlidess(n) {
    var i;
    var slides = document.getElementsByClassName("my_Slides");
    var links = document.getElementsByClassName("link");
    if (n > slides.length) {
        slide_Index = 1
    }
    if (n < 1) {
        slide_Index = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < links.length; i++) {
        links[i].className = links[i].className.replace(" activ_e", "");
    }
    
    slides[slide_Index - 1].style.display = "block";
    links[slide_Index - 1].className += " activ_e";
}


/*----*/

