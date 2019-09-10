var scroll = document.getElementById("scroll-range");
scroll.oninput = function () {
    var panel = document.getElementById("scrolling-container");
    var total = panel.scrollWidth - panel.offsetWidth;
    var percentage = total * (this.value / 100);
    console.log(total);
    panel.scrollLeft = percentage;
}

$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
        $('.menu1').addClass('fixed_header');
    }
    else {
        $('.menu1').removeClass('fixed_header');
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

if ($(window).width() <= 767) {
    $('#heading1').insertBefore($('#rightF1'));
}

if ($(window).width() <= 767) {
    $('#heading2').insertBefore($('#rightF2'));
}

if ($(window).width() <= 767) {
    $('#heading3').insertBefore($('#rightF3'));
}

if ($(window).width() <= 767) {
    $('#netRight').insertBefore($('#netLeft'));
}

if ($(window).width() <= 767) {
    $('#rightWhite').insertBefore($('#leftWhite'));
}

if ($(window).width() <= 767) {
    $('#rightCrypto').insertBefore($('#leftCrypto'));
}

function makeTimer() {

    var endTime = new Date("11 June 2018 07:00:00 GMT+05:30");
    endTime = (Date.parse(endTime) / 1000);

    var now = new Date();
    now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") {
        hours = "0" + hours;
    }
    if (minutes < "10") {
        minutes = "0" + minutes;
    }
    if (seconds < "10") {
        seconds = "0" + seconds;
    }

    $("#days").html(days + "<span>Day</span>");
    $("#hours").html(hours + "<span>Hour</span>");
    $("#minutes").html(minutes + "<span>Min</span>");
    $("#seconds").html(seconds + "<span>Sec</span>");

}
setInterval(function () {
    makeTimer();
}, 1000);

if ($(window).width() < 768) {
    $(document).ready(function () {
        var bigimage = $("#big");
        var thumbs = $("#thumbs");
        //var totalslides = 10;
        var syncedSecondary = true;

        bigimage
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: false,
                    autoplay: false,
                    slideBy: 1,
                    dots: false,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    loop: true
                })
                .on("changed.owl.carousel", syncPosition);

        thumbs
                .on("initialized.owl.carousel", function () {
                    thumbs
                            .find(".owl-item")
                            .eq(0)
                            .addClass("current");
                })
                .owlCarousel({
                    items: 1,
                    dots: true,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    autoplay: false
                })
                .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            //to this
            thumbs
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
            var onscreen = thumbs.find(".owl-item.active").length - 1;
            var start = thumbs
                    .find(".owl-item.active")
                    .first()
                    .index();
            var end = thumbs
                    .find(".owl-item.active")
                    .last()
                    .index();

            if (current > end) {
                thumbs.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage.data("owl.carousel").to(number, 300, true);
        });
    });
}

if ($(window).width() < 768) {
    $(document).ready(function () {
        var bigimage1 = $("#big1");
        var thumbs1 = $("#thumbs1");
        //var totalslides = 10;
        var syncedSecondary = true;

        bigimage1
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: false,
                    autoplay: false,
                    slideBy: 1,
                    dots: false,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    loop: true
                })
                .on("changed.owl.carousel", syncPosition);

        thumbs1
                .on("initialized.owl.carousel", function () {
                    thumbs1
                            .find(".owl-item")
                            .eq(0)
                            .addClass("current");
                })
                .owlCarousel({
                    items: 1,
                    dots: true,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    autoplay: false
                })
                .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            //to this
            thumbs1
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
            var onscreen = thumbs1.find(".owl-item.active").length - 1;
            var start = thumbs1
                    .find(".owl-item.active")
                    .first()
                    .index();
            var end = thumbs1
                    .find(".owl-item.active")
                    .last()
                    .index();

            if (current > end) {
                thumbs1.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs1.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage1.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs1.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage1.data("owl.carousel").to(number, 300, true);
        });
    }
    );

}

if ($(window).width() < 768) {
    $(document).ready(function () {
        var bigimage2 = $("#big2");
        var thumbs2 = $("#thumbs2");
        //var totalslides = 10;
        var syncedSecondary = true;

        bigimage2
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: false,
                    autoplay: false,
                    slideBy: 1,
                    dots: false,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    loop: true
                })
                .on("changed.owl.carousel", syncPosition);

        thumbs2
                .on("initialized.owl.carousel", function () {
                    thumbs2
                            .find(".owl-item")
                            .eq(0)
                            .addClass("current");
                })
                .owlCarousel({
                    items: 1,
                    dots: true,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    autoplay: false
                })
                .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            //to this
            thumbs2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
            var onscreen = thumbs2.find(".owl-item.active").length - 1;
            var start = thumbs2
                    .find(".owl-item.active")
                    .first()
                    .index();
            var end = thumbs2
                    .find(".owl-item.active")
                    .last()
                    .index();

            if (current > end) {
                thumbs2.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs2.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage2.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs2.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage2.data("owl.carousel").to(number, 300, true);
        });
    }
    );

}


