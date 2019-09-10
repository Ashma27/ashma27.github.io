


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
$(window).load(function() {
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
    });
    wow.init();
});

//$( ".user_map_inner:gt(5):after" ).css( "backgroundColor", "url(../img/right.png) no-repeat 50% 50%" );


$("#customers-testimonials")
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                    .find('.owl-item').removeClass('last')
                    .eq(event.item.index + event.page.size - 2).addClass('last');
        })
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                    .find('.owl-item').removeClass('last1')
                    .eq(event.item.index + event.page.size + 0).addClass('last1');
        }).owlCarousel({
    loop: true,
    center: true,
    items: 4,
    margin: 0,
    autoplay: true,
    dots: false,
    arrow: true,
    autoplayTimeout: 1500,
    smartSpeed: 450,
      responsive: {
        0:{
            items:2
        },
        767:{
            items:4
        }
    }
  
});
AOS.init({
  duration: 2500,
});

// ===== Scroll to Top ==== 
$(window).scroll(function () {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function () {      // When arrow is clicked
    $('body,html').animate({
        scrollTop: 0                       // Scroll to top of body
    }, 500);
});


//var li = $('.user_map_inner ').find('p');
//
//var iEra, thumbLi = $('.user_map_inner');
//for (iEra = 1; iEra <= 0; iEra++) {
//    thumbLi.eq(iEra).addClass('class'+iEra);
//}