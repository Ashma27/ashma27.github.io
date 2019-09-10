jQuery(function ($) {
// Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: true,
        zoomControl: true,
        disableDefaultUI: false,
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
        ,
        mapTypeId: 'roadmap'
    };
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
    // Multiple Markers
    var markers = [
        ['København, Denmark', 55.6760968, 12.5683371],
        ['Aalborg, Denmark', 57.046707, 9.935932],
        ['Århus, Denmark', 56.162939, 10.203921],
        ['Esbjerg, Denmark', 55.476466, 8.459405],
        ['Odense, Denmark', 55.403756, 10.40237],
    ];
    // Info Window Content
    var infoWindowContent = [
        ["<section class='forth map-forth boxs'>"+
                    "<div class='offers-for shopes-for shop-cate-brands boxs'>"+
                    "<div class='skyblue-offer hover-to boxs' style='background: #ff2d2d !important;'>"
                    +"<h2>mc donalds</h2>"+
                    "<div class='hover-effect boxs'></div></div>"+
                    "<div class='shop-icons boxs'>"+
                    "<div class='col-sm-4 nopadding red-forth'>"+
                    "<div class='heighr-off js-hight-set'>"+
                    "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                    +"<div class='col-sm-4 nopadding'><div class='heighr-off'>"
                    +"<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                    +"</div><div class='col-sm-4 nopadding skyblue'>"
                    +"<div class='heighr-off'><p>+</p> </div></div></div></div></section>"
        ],
        ["<section class='forth map-forth boxs'>"+
                    "<div class='offers-for shopes-for shop-cate-brands boxs'>"+
                    "<div class='skyblue-offer hover-to boxs' style='background: #ff2d2d !important;'>"
                    +"<h2>mc donalds</h2>"+
                    "<div class='hover-effect boxs'></div></div>"+
                    "<div class='shop-icons boxs'>"+
                    "<div class='col-sm-4 nopadding red-forth'>"+
                    "<div class='heighr-off js-hight-set'>"+
                    "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                    +"<div class='col-sm-4 nopadding'><div class='heighr-off'>"
                    +"<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                    +"</div><div class='col-sm-4 nopadding skyblue'>"
                    +"<div class='heighr-off'><p>+</p> </div></div></div></div></section>"
        ],
        ["<section class='forth map-forth boxs'>"+
                    "<div class='offers-for shopes-for shop-cate-brands boxs'>"+
                    "<div class='skyblue-offer hover-to boxs' style='background: #ff2d2d !important;'>"
                    +"<h2>mc donalds</h2>"+
                    "<div class='hover-effect boxs'></div></div>"+
                    "<div class='shop-icons boxs'>"+
                    "<div class='col-sm-4 nopadding red-forth'>"+
                    "<div class='heighr-off js-hight-set'>"+
                    "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                    +"<div class='col-sm-4 nopadding'><div class='heighr-off'>"
                    +"<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                    +"</div><div class='col-sm-4 nopadding skyblue'>"
                    +"<div class='heighr-off'><p>+</p> </div></div></div></div></section>"
        ],
        ["<section class='forth map-forth boxs'>"+
                    "<div class='offers-for shopes-for shop-cate-brands boxs'>"+
                    "<div class='skyblue-offer hover-to boxs' style='background: #ff2d2d !important;'>"
                    +"<h2>mc donalds</h2>"+
                    "<div class='hover-effect boxs'></div></div>"+
                    "<div class='shop-icons boxs'>"+
                    "<div class='col-sm-4 nopadding red-forth'>"+
                    "<div class='heighr-off js-hight-set'>"+
                    "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                    +"<div class='col-sm-4 nopadding'><div class='heighr-off'>"
                    +"<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                    +"</div><div class='col-sm-4 nopadding skyblue'>"
                    +"<div class='heighr-off'><p>+</p> </div></div></div></div></section>"
        ],
        ["<section class='forth map-forth boxs'>"+
                    "<div class='offers-for shopes-for shop-cate-brands boxs'>"+
                    "<div class='skyblue-offer hover-to boxs' style='background: #ff2d2d !important;'>"
                    +"<h2>mc donalds</h2>"+
                    "<div class='hover-effect boxs'></div></div>"+
                    "<div class='shop-icons boxs'>"+
                    "<div class='col-sm-4 nopadding red-forth'>"+
                    "<div class='heighr-off js-hight-set'>"+
                    "<img src='img/drop-offer.png' class='img-responsive'></div></div>"
                    +"<div class='col-sm-4 nopadding'><div class='heighr-off'>"
                    +"<h4>ouvert de<span>9h30 a 19h</span></h4></div> "
                    +"</div><div class='col-sm-4 nopadding skyblue'>"
                    +"<div class='heighr-off'><p>+</p> </div></div></div></div></section>"
        ]
    ];
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(),
            marker, i;
    // Loop through our array of markers & place each one on the map  
    for (i = 0; i < markers.length; i++) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
            animation: google.maps.Animation.DROP,
            icon: {
                url: "img/red-marker.png", //change your custom marker icon here
                scaledSize: new google.maps.Size(30, 30)
            }
        });
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));
        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
        this.setZoom(6);
        google.maps.event.removeListener(boundsListener);
    });
    // color overlay
    var color = "#fff"; //Set your tint color. Needs to be a hex value.
    bounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-84.999999, -179.999999),
            new google.maps.LatLng(84.999999, 179.999999));
    rect = new google.maps.Rectangle({
        bounds: bounds,
        fillColor: color,
        fillOpacity: 0.15,
        strokeWeight: 0,
        map: map
    });
}
// get coordinates http://www.mapcoordinates.net/en