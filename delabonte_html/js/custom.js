
$(".myBox").click(function () {
    window.location = $(this).find("a").attr("href");
    return false;
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
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                
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
 var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
$(document).ready(function() {
    $('.hideContentHeader').prepend('<span class="indicator">+</span> ');
    $('.hideContentHeader').click(function() {
        $(this).parent().find('.hideContent').slideToggle("slow");
    });
    $('.hideContentHeader').click(function() {
        $(this).toggleClass("active");
    });
    $('.hideContentHeader').click(function() {
        $(this).find('.indicator').toggleClass("rotate");
    });
});
var points = [
	    ['1178 Rue Lussier Saint-Dominique QC J0H 1L0', 45.566746,-72.851148, 12, 'https://www.google.co.in/maps/place/1178+Rue+Lussier,+Saint-Dominique,+QC+J0H+1L0,+Canada/@45.566746,-72.8533365,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc84a59e5496565:0x20bc16aa3025aad4!8m2!3d45.566746!4d-72.8511478', 'A']
	];

	function setMarkers(map, locations) {
	    var shape = {
	        coord: [1, 1, 1, 20, 18, 20, 18, 1],
	        type: 'poly'
	    };
	    for (var i = 0; i < locations.length; i++) {
	        
	        var place = locations[i];
	        var myLatLng = new google.maps.LatLng(place[1], place[2]);

	        var marker = new google.maps.Marker({
	            position: myLatLng,
	            map: map,
	            shape: shape,
	            title: place[0],
	            icon: "img/locator.png",
	            zIndex: place[4],
	            url: place[4]
	        });
	        google.maps.event.addListener(marker, 'click', function () {
	            //alert('go to ' + this.url);
	            window.location.href = this.url;
	        });
	    }
	}

	function initialize() {
	    var myOptions = {
	        center: new google.maps.LatLng(45.566746,-72.851148),
	        zoom: 11,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
             };
	    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	    setMarkers(map, points);
	}

$(document).ready(function() {
	initialize();
});
