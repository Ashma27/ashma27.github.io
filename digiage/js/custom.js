$(window).scroll(function () {
    if ($(window).scrollTop() >= 45) {
        $('.header').addClass('fixed_header');
    }
    else {
        $('.header').removeClass('fixed_header');
    }
});

AOS.init();


$('.inputs').click(function () {
    $(this).siblings().addClass('active');
});


//Signup form 2 step validation
$("#register").click(function () {
    if ($("#signupform").valid()) {
        $.ajax({
            url: "mail.php",
            type: "POST",
            data: $('#signupform').serialize(),
            success: function (data) {
                $('.msgs').slideDown();
                $("#signupform")[0].reset();
            }
        });
    }
});