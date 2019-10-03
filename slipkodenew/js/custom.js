
var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});

$(document).ready(function () {
    $('.all').hide();
    $('.all1').show();
    $('.clickme').click(function () {
        var type = $(this).data('type');
        $('.all').hide();
        $('.all' + type).fadeIn();
        $('.clickme').removeClass('active');
        $(this).addClass('active');
    });
});

/*for slick*/

$('.slick1').slick({
    dots: true,
    fade: true,
    infinite: true,
    speed: 350,
    arrow: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: false,
    autoplay: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                infinite: true,
                dots: true
            }
        }]
});
if ($(window).width() <= 767) {
    $('.slick2').slick({
        dots: false,
        fade: false,
        infinite: true,
        speed: 350,
        arrow: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    infinite: true,
                    dots: true
                }
            }]
    });
}

$(window).scroll(function () {
    if ($(window).scrollTop() >= 1) {
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
        $('#mySidenav').css('top', '48px');
        $('#mySidenav').css('left', '0');
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
    items: 3,
    margin: 0,
    autoplay: false,
    dots: false,
    arrow: true,
    autoplayTimeout: 1500,
    smartSpeed: 450,
    
    navText: ["<img src='./img/arrow-left.png'>", "<img src='./img/arrow-right.png'>"],
    responsive: {
        0:{
            items:1
        },
        767:{
            items:3
        }
    }
});


if ($(window).width() <= 767) {
    $('#before1').insertAfter($('#after1'));
    $('#before2').insertAfter($('#after2'));
     $('#before3').insertAfter($('#after3'));
}