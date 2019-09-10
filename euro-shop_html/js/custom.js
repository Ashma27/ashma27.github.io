$('.slider').slick({
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }]
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
        $('#mySidenav').css('left', '0');
    }
    else {
        $('#mySidenav').css('left', '-100%');
    }
});
$('.slick').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }]
});

$('.offer-slider').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 5,
    slidesToScroll: 2,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 985,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 560,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }]
});
if ($(window).width() <= 767){
$('.fb-posts-res ul li:first-child').insertAfter($('.fb-posts-res ul li:last-child'));
$('.youtube-posts .res-down-after').insertAfter($('.youtube-posts .res-down-before'));
};
$(".more").click(function () {
    $(".hidden_content").slideToggle("slow");
});

$("document").ready(function () {
    $(".selectpicker").selectpicker({
    });
});


$('.cate-slider').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }]
});
$('.slider-shows').slick({
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }]
});

$('.insta-slider').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 3,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 985,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true
            }
        }, 
        {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }
    ]
});
$('.fb-slider').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }]
});
$('.youtube-slider').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        }]
});
$('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .click(function (event) {
            // On-page links
            if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                    ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 2000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);

                        if ($target.is("")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

                        }
                        ;
                    });
                }
            }
        });
 

var locations = [
    ["<section class='forth map-forth boxs'>" +
                "<span id='iw-close-btn'><i class='fa fa-lg fa-times white'></i></span>" +
                "<div class='offers-for shopes-for shop-cate-brands boxs'>" +
                "<div class='skyblue-offer hover-to boxs' style='background: #ff2d2d !important;'>"
                + "<h2>zara</h2>" +
                "<div class='hover-effect boxs'></div></div>" +
                "<div class='shop-icons boxs'>" +
                "<div class='col-xs-4 nopadding red-forth'>" +
                "<div class='heighr-off js-hight-set'>" +
                "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                + "<div class='col-xs-4 nopadding'><div class='heighr-off'>"
                + "<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                + "</div><div class='col-xs-4 nopadding skyblue'>"
                + "<div class='heighr-off'><a href='#'>+</a> </div></div></div></div></section>", 44.854477, -93.240105, 1, "http://designoweb.com/demo/euro-shop/img/red-marker.png"],
    ["<section class='forth map-forth boxs'>" +
                "<span id='iw-close-btn'><i class='fa fa-lg fa-times white'></i></span>" +
                "<div class='offers-for shopes-for shop-cate-brands boxs'>" +
                "<div class='skyblue-offer hover-to boxs' style='background: #00cfeb !important;'>"
                + "<h2>mc donalds</h2>" +
                "<div class='hover-effect boxs'></div></div>" +
                "<div class='shop-icons boxs'>" +
                "<div class='col-xs-4 nopadding red-forth'>" +
                "<div class='heighr-off js-hight-set'>" +
                "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                + "<div class='col-xs-4 nopadding'><div class='heighr-off'>"
                + "<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                + "</div><div class='col-xs-4 nopadding skyblue'>"
                + "<div class='heighr-off'><a href='#'>+</a> </div></div></div></div></section>", 44.810808, -93.330943, 2, "http://designoweb.com/demo/euro-shop/img/skyblue-marker.png"],
];
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(44.81, -93.33),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
     styles: [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e9e9e9"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 18
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#dedede"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "saturation": 36
                    },
                    {
                        "color": "#333333"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f2f2f2"
                    },
                    {
                        "lightness": 19
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            }
        ]
});
var infowindow = new google.maps.InfoWindow();
var marker, i;
for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        icon: locations[i][4],
        map: map
    });
    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
            
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
};
google.maps.event.addListener(infowindow, 'domready', function() {

    var closeBtn = $('#iw-close-btn').get();
    console.log(closeBtn);

    google.maps.event.addDomListener(closeBtn[0], 'click', function() {
      console.log('closed');
      infowindow.close();
    });
});
