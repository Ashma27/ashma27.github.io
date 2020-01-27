//Header Search Box Start
$('.scrolltop a').click(function() {
    $('html,body').animate({
        scrollTop: $('.main99').offset().top - 100
    }, 300)
});



function autocomplete(inp, arr) {
    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");

        this.parentNode.appendChild(a);

        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                     (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x)
            x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
             increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
             decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x)
                    x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x)
            return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length)
            currentFocus = 0;
        if (currentFocus < 0)
            currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
         except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

/*An array containing all the country names in the world:*/
var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre & Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts & Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks & Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);

//Header Search Box End

$('.moolelopage').click(function() {
    window.open('strategy.html#moolelo_n', '_self');
});
$('.promisediv').click(function() {
    window.open('strategy.html#principle', '_self');
});

// for serach header
$('.searchIcon').click(function() {
    $('.headSearch').toggle();
});
// search header END

$(window).scroll(function() {
    if ($(window).scrollTop() >= 260) {
        $('.header').addClass('fixed_header');
        $('.scrolltop').show();
    } else {
        $('.header').removeClass('fixed_header');
        $('.scrolltop').hide();
    }
});
var forEach = function(t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t))
        for (var c in t)
            Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
    else
        for (var e = 0, l = t.length; l > e; e++)
            o.call(r, t[e], e, t)
};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
    forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
            this.classList.toggle("is-active");
        }, false);
    });
}

$('.hamburger').click(function() {

    if ($(this).hasClass('is-active')) {
        $('#mySidenav').css('top', '0px');
    } else {
        $('#mySidenav').css('top', '-100%');
    }
});
$('.slick').slick({
    dots: true,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    adaptiveHeight: true,
    responsive: [{
        breakpoint: 767,
        settings: {
            slidesToShow: 1,
        }
    }]
});
$('.tab').click(function() {
    if ($(this).hasClass('active')) {
        $('.tab').find('span').removeClass('color');
        $('.tab').find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        $('.tab').removeClass('active');
        $('.tabs').slideUp();
    } else {
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

/**-------------------*/
$('.menubx a').click(function() {
    $('.menubx a').removeClass('active');
    $(this).addClass('active');
});

$(document).ready(function() {
    $(".set > a").on("click", function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this)
                .siblings(".content")
                .slideUp(200);
            $(".set > a i")
                .removeClass("fa-minus")
                .addClass("fa-plus");
        } else {
            $(".set > a i")
                .removeClass("fa-minus")
                .addClass("fa-plus");
            $(this)
                .find("i")
                .removeClass("fa-plus")
                .addClass("fa-minus");
            $(".set > a").removeClass("active");
            $(this).addClass("active");
            $(".content").slideUp(200);
            $(this)
                .siblings(".content")
                .slideDown(200);
        }
    });
});

$('.role').click(function() {
    $('html,body').animate({
        scrollTop: $('.memuBtm ').offset().top
    }, 500)
});
$('.Moolelo').click(function() {
    $('html,body').animate({
        scrollTop: $('.ourmlo ').offset().top - 80
    }, 500)
});
$('.Mana1').click(function() {
    $('html,body').animate({
        scrollTop: $('.brand1').offset().top - 100
    }, 500)
});
$('.Principles').click(function() {
    $('html,body').animate({
        scrollTop: $('.bran_prin').offset().top - 100
    }, 500)
});
$('.Foundation').click(function() {
    $('html,body').animate({
        scrollTop: $('.brand_found').offset().top - 100
    }, 500)
});

$('.scrolltop a').click(function() {
    $('html,body').animate({
        scrollTop: $('.main').offset().top - 100
    }, 300)
});


// $('.main')



//new school
function cusDD(select, style) {
    /*Style Switcher*/
    var ddstyle = "";
    if (!style) {
        ddstyle = "cusDD_default";
    } else if (style == "slick dark") {
        ddstyle = "cusDD_slick_d";
    } else if (style == "slick light") {
        ddstyle = "cusDD_slick_l";
    } else {
        ddstyle = style;
    }

    for (var i = 0; i < $(select).length; i++) {
        var curr = $($(select)[i]);

        //Replace select with div
        curr.addClass(ddstyle + " cusDD").changeElementType("div");

        //put drop downs in a container
        //Replace options with divs
        curr = $($(select)[i]);
        curr.find("option").wrapAll("<div class='cusDD_options' />");
        curr.find("option").addClass("cusDD_opt").each(function() {
            $(this).changeElementType("div");
        });

        //Add selector and drop down
        curr.prepend("<div class='cusDD_select'><div class='cusDD_arrow'></div></div>");

        //Add default option
        var def = (curr.find("div[selected='selected']").length >= 1) ? $(curr.find("div[selected='selected']")) : $(curr.find(".cusDD_opt")[0]);
        curr.find(".cusDD_select").prepend(def.text());

    } //End for loop

    $(document).click(function() {
        $(".cusDD_options").slideUp(200);
        $(".cusDD_arrow").removeClass("active");
    })

    $(select).click(function(e) {
        e.stopPropagation();
        $(this).find(".cusDD_options").slideToggle(200);
        $(this).find(".cusDD_arrow").toggleClass("active");
    })
    $(".cusDD_opt").click(function() {
        $($(this).parent()).siblings(".cusDD_select").contents()[0].nodeValue = $(this).text();
        $(this).parent().find(".cusDD_opt").removeAttr("selected");
        $(this).attr("selected", "selected");
    });

} // End function)

(function($) {
    $.fn.changeElementType = function(newType) {
        var attrs = {};

        $.each(this[0].attributes, function(idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });

        this.replaceWith(function() {
            return $("<" + newType + "/>", attrs).append($(this).contents());
        });
    };
})(jQuery);

/* Call the cusDD function on any select elements by ID or Class */
$(document).ready(function() {
    cusDD(".select1");

    $(".cusDD_opt").on('click', function() {
        alert($(this).parent().find("[selected='selected']").text());
    });
});

//coming up Tab
$(document).ready(function() {
    $('.all').hide();
    $('.all1').show();
    $('.clickhere').click(function() {
        var type = $(this).data('type');
        $('.all').hide();
        $('.all' + type).fadeIn();
        $('.clickhere').removeClass('active');
        $(this).addClass('active');
    });
});

//news blog Tab
$(document).ready(function() {
    $('.newsdiv').hide();
    $('.newsdiv1').show();
    $('.clicknews').click(function() {
        var type = $(this).data('type');
        $('.newsdiv').hide();
        $('.newsdiv' + type).fadeIn();
        $('.clickhere').removeClass('active');
        $(this).addClass('active');
    });
});


$(document).ready(function() {
    $(".sidenav li a").on("click", function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).next(".menuCont").slideUp(500);
            $(".sidenav  li a img").removeClass("downarrow").addClass("uparrow");
        } else {
            $(".sidenav li a img").removeClass("downarrow").addClass("uparrow");
            $(this).find("img").removeClass("uparrow").addClass("downarrow");
            $(".sidenav  li a img").removeClass("active");
            $(this).addClass("active");
            $(".menuCont").slideUp(200);
            $(this).next(".menuCont").slideDown(500);
        }
    });
});