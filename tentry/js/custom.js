// // Dropbox Menu Start

$(document).ready(function(){
    $('.menuLogin a.openUserMenu').on('click', function(){
        if($(this).hasClass('menuOpen')){
            $(this).removeClass('menuOpen');
            $(this).parents('.menuLogin').find('.menuDropbox').slideUp(200);
        }
        else{
            $('.menuLogin a.openUserMenu').removeClass('menuOpen');
            $('.menuLogin a.openUserMenu').parents('.menuLogin').find('.menuDropbox').slideUp(200);
            $(this).addClass('menuOpen');
            $(this).parents('.menuLogin').find('.menuDropbox').slideDown(200);
        }
    });

    $(document).on("click", function (event) {
        var $trigger = $(".menuLogin");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $('.openUserMenu').removeClass('menuOpen');
            $('.openUserMenu').parents('.menuLogin').find('.menuDropbox').slideUp('fast');
        }
    });

});
// // Dropbox Menu End
// //   Scroll to Top Start

$(document).ready(function(){
    var scrollTop = $(".scrollTop");
    $(scrollTop).on('click', function(){
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
});

// //   Scroll to Top End

// slider with crousel start
$('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: false,
    asNavFor: '.slider-nav-thumbnails',

});

$('.slider-nav-thumbnails').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider',
    dots: false,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 5
            }
        },
        {
                breakpoint: 415,
                settings: {
                    slidesToShow: 4,
                    arrows: false,
        }
        }]
});


//remove active class from all thumbnail slides
$('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

//set active class to first thumbnail slides
$('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
$('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var mySlideNumber = nextSlide;
    $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
    $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
});


// slider with crousel end


$(document).ready(function(){
    $('.productsSlider').slick({
    autoplay: false,
    autoplaySpeed: 1000,
    arrows: true,
    dots: false,
    slidesToShow: 5,
    infinite: false,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        },
        {
                breakpoint: 561,
                settings: {
                    slidesToShow: 2
        }
        },
        {
            breakpoint: 415,
            settings: {
                slidesToShow: 1
    }
    }]
    });
});


$('.msg_icon').click(function(){
    $('.chatbox').slideToggle();
});

$('.redicon').click(function(){
    $('.chatbox').slideToggle('hide');
});



// // create password start
// $(".toggle-password").click(function() {
//     $(this).toggleClass("fa-eye fa-eye-slash");
//     var input = $($(this).attr("toggle"));
//     if (input.attr("type") == "password") {
//       input.attr("type", "text");
//     } else {
//       input.attr("type", "password");
//     }
//   });

// $('.toggle-createpassword').click(function(){
//     $(this).toggleClass('fa-eye fa-eye-slash');
//     var input = $($(this).attr("toggle"));
//     if (input.attr("type") == "password") {
//       input.attr("type", "text");
//     } else {
//       input.attr("type", "password");
//     } 
// });
// // create password end


  // Sidebar Start

    $('.navbar-toggler').click(function () {
        if ($(this).parents('.navbar').find('.navbar-collapse').hasClass('show')) {
            $('.navbar-expand-md .navbar-collapse').css('top', '-100%');
        } else {
            $('.navbar-expand-md .navbar-collapse').css('top', '0px');
        }
    });
  
  // Sidebar End

//   // Navbar Button Style Start

    $(document).ready(function(){
        $('.navbar-toggler').click(function(){
            if($(this).hasClass('active'))
            {
                $(this).removeClass('active')
            }
            else{
                $(this).addClass('active')
            }
        });
    });
  
//   // Navbar Button Style End

// create password start
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

$('.toggle-createpassword').click(function(){
    $(this).toggleClass('fa-eye fa-eye-slash');
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    } 
});
// create password end
  





