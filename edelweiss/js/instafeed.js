$(document).ready(function () {
    $('.slider-nav').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        dots: true,
        focusOnSelect: true,
        adaptiveHeight: false,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            }]
    });

    setTimeout(function () {
        $('.slider-nav').slick('refresh');
    }, 1000);
});

var token = '1491323652.1677ed0.0af9299eec1d46d3b270d1f0bb8da77a', // learn how to obtain it below
        userid = 1491323652, // User ID - get it in source HTML of your Instagram profile
        num_photos = 100; // how much photos do you want to get

$.ajax({
    url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent', // or /users/self/media/recent for Sandbox
    dataType: 'jsonp',
    type: 'GET',
    data: {
        access_token: token,
        count: num_photos
    },
    success: function (data) {
        console.log(data);
        for (x in data.data) {
            $('.slider').append('<div><img src="' + data.data[x].images.low_resolution.url + '"></div>'); // data.data[x].images.low_resolution.url - URL of image, 306х306
            // data.data[x].images.thumbnail.url - URL of image 150х150
            // data.data[x].images.standard_resolution.url - URL of image 612х612
            // data.data[x].link - Instagram post URL 
        }
    },
    error: function (data) {
        console.log(data); // send the error notifications to console
    }
});