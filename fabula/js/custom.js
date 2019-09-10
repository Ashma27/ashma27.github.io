
$(document).ready(function () {
    $(".sidenav1").hide();
    $(".show_hide").show();
    $('.show_hide').click(function () {
        $(".sidenav1").animate({'width': 'toggle'});
    });
});

$(document).ready(function () {
    $(".member1").hide();
    $(".show_hide1").show();
    $('.show_hide1').click(function () {
        $(".member1").animate({'width': 'toggle'});
        $('html, body').animate({scrollTop: '0px'}, 0);
        $(".team").fadeOut('slow');
    });
    $('.showteam').click(function () {
        $(".team").show();

    });
});

$(document).ready(function () {
    $(".program").hide();
    $(".show_hide2").show();
    $('.show_hide2').click(function () {
        $(".program").animate({'width': 'toggle'});
        $('html, body').animate({scrollTop: '0px'}, 0);
        $(".event").fadeOut('slow');
    });
    $('.showteam2').click(function () {
        $(".event").show();

    });
});

$(document).ready(function () {
    $(".gallary").hide();
    $(".show_hide3").show();
    $('.show_hide3').click(function () {
        $(".gallary").animate({'width': 'toggle'});
        $('html, body').animate({scrollTop: '0px'}, 0);
        $(".team").fadeOut('slow');
    });
    $('.showteam3').click(function () {
        $(".team").show();
    });
});

$('.closeterms').click(function () {
    $(".agreetop").hide();
});

$('#cookiesModal').modal('show');

$(document).ready(function () {
    $(".socialshare").hide();
    $('.sharebtn').click(function () {
        $(".socialshare").slideToggle();
    });
});


$('.slick').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                infinite: true,
            }

        }]

});

$('.slick1').slick({
    dots: false,
    infinite: true,
    speed: 350,
    arrow: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                infinite: true,
            }

        }]

});

$('.galimgs a').click(function () {
    
    $(".slick1").slick("refresh");
});

$('.calender .calenders .member .plus a').click(function () {
    $(".slick").slick("refresh");
});
