
// $(".radiobox input[type='radio']").change(function(){
//     if($(this).is(":checked")){
//         $(this).parents(".radiobox").addClass("radio_back"); 
//     }
//     else{
//         $(".radiobox").removeClass("radio_back");  
//     }
// });
function openCity1(evt, cityName) {
    $('.tab_item').hide();
    $('#'+cityName).show();
    $('.year_anchor a').removeClass('active');
    evt.currentTarget.className += 'active';
}
$(function () {
    $(".point_table").slice(0, 4).show();
    $("#load").on('click', function (e) {
        e.preventDefault();
        $(".point_table:hidden").slice(0, 1).slideDown();
        if ($(".point_table:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top - 100
        }, 1500);
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
$('.slick').slick({
    dots: true,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    adaptiveHeight: true,
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
// $('a[href*="#"]')
//         // Remove links that don't actually link to anything
//         .not('[href="#"]')
//         .not('[href="#0"]')
//         .click(function (event) {
//             // On-page links
//             if (
//                     location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
//                     &&
//                     location.hostname == this.hostname
//                     ) {
//                 // Figure out element to scroll to
//                 var target = $(this.hash);
//                 target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//                 // Does a scroll target exist?
//                 if (target.length) {
//                     // Only prevent default if animation is actually gonna happen
//                     event.preventDefault();
//                     $('html, body').animate({
//                         scrollTop: target.offset().top
//                     }, 2000, function () {
//                         // Callback after animation
//                         // Must change focus!
//                         var $target = $(target);
//                         $target.focus();
//                         if ($target.is(":focus")) { // Checking if the target was focused
//                             return false;
//                         } else {
//                             $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
//                             $target.focus(); // Set focus again
//                         }
//                         ;
//                     });
//                 }
//             }
//         });


// function openCity1(evt, cityName) {
//     $('.tab_item').hide();
//     $('#'+cityName).show();
//     $('.year_anchor a').removeClass('active');
//     evt.currentTarget.className += 'active';
// }
// $(function () {
//     $(".point_table").slice(0, 4).show();
//     $("#load").on('click', function (e) {
//         e.preventDefault();
//         $(".point_table:hidden").slice(0, 1).slideDown();
//         if ($(".point_table:hidden").length == 0) {
//             $("#load").fadeOut('slow');
//         }
//         $('html,body').animate({
//             scrollTop: $(this).offset().top - 100
//         }, 1500);
//     });
// });

// $('a[href=#top]').click(function () {
//     $('body,html').animate({
//         scrollTop: 0
//     }, 600);
//     return false;
// });

// $(window).scroll(function () {
//     if ($(this).scrollTop() > 50) {
//         $('.totop a').fadeIn();
//     } else {
//         $('.totop a').fadeOut();
//     }
// });