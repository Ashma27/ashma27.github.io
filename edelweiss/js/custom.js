$("#Joinstep2").hide();
$("#Modalstep2").hide();

$("#register").click(function () {
    if (jQuery("#signupform").valid()) {
        jQuery.ajax({
            url: "mail",
            type: "POST",
            data: $('#signupform').serialize(),
            success: function (data) {
                $("#Modalstep2").show();
                $("#Modalstep1").hide();
                $("#signupform")[0].reset();
            }
        });
    }
});
$('.activelink').click(function () {
    $('.activelink').removeClass('active');
    $(this).addClass('active');
});
$('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
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
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });
// INCLUDE JQUERY & JQUERY UI 1.12.1
$('.datep').datetimepicker({
    format: 'DD/MM/YYYY',
//     inline: true,    
});
$('.timep').datetimepicker({
    format: 'h:m:a',
//    inline: true,

});

$(window).scroll(function () {
    if ($(window).scrollTop() >= 5) {
        $('.header').addClass('fixed_header');
    }
    else {
        $('.header').removeClass('fixed_header');
    }
});

/*----------------------for smooth scrolling-----------*/

//$('#Scroll_menu li:nth-child(2)').click(function () {
//    $('.active').css("color", "#fff");
//});

//$('#Scroll_menu li:nth-child(3),.sidenav a:nth-child(3)').click(function () {
//    $('html,body').animate({
//        scrollTop: $('.follow_us').offset().top,
//    }, "slow");
//    $('.active').css("color", "#fff");
//    $('.sidenav').toggle();
//});
//
//$("#Scroll_menu li:nth-child(4),.sidenav a:nth-child(4)").click(function () {
//    $('html,body').animate({
//        scrollTop: $('.special').offset().top,
//    }, "slow");
//
//    $('.active').css("color", "#fff");
//    $('.sidenav').toggle();
//});
//
//$("#Scroll_menu li:nth-child(5),.sidenav a:nth-child(5)").click(function () {
//    $('html,body').animate({
//        scrollTop: $('.contact').offset().top,
//    }, "slow");
//
//    $('.active').css("color", "#fff");
//    $('.sidenav').toggle();
//});

/*----------------------for smooth scrolling-----------*/

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
        $('#mySidenav').css('top', '75px');
    }
    else {
        $('#mySidenav').css('top', '-100%');
    }
});
$('.Sidelink').click(function () {
    $('.hamburger').removeClass('is-active');
    $('#mySidenav').css('top', '-100%');

});

var disableSubmit = false

document.getElementById("form").addEventListener("submit", function (e) {
    if (disableSubmit) {
        e.preventDefault()
        disableSubmit = false
        return false
    }

    // rest of send stuff

});

/*
 Tag script
 */
(function () {
    'use-strict'

    var toView = document.getElementById("tagContainer")
    var toServer = document.getElementById("tagArray")
    var transientTagField = document.getElementById("transientTagField")
    var validate = document.getElementById("validate")
    var dragSrcEl = null
    var tags = []

    function input(ignoreComma) {

        if (!/^([a-zA-Z0-9\.\-+]{2,20},?)+$/g.test(this.value)) {
            disableSubmit = true
            if (typeof this.willValidate !== "undefined")
                validate.click()
            else
                alert("Min: 2 Chars and [a-z,+,-, ] (and update your goddman browser)")

            return
        }

        if (this.value.indexOf(",") != -1 || ignoreComma) {
            if (this.value.substring(this.value.length - 1) === ',')
                this.value = this.value.substring(0, this.value.length - 1)

            var newTags = this.value.split(",")
            for (var i = 0, newTag = newTags[0]; newTag = newTags[i]; i++) {
                if (tags.indexOf(newTag) === -1)
                    tags.push(newTag)
            }

            this.value = ""
            render()

        }
    }

    transientTagField.addEventListener("input", function (e) {
        input.call(this, false)
    })

    transientTagField.addEventListener("keypress", function (e) {
        if (e.keyCode === 13) {
            e.preventDefault()
            input.call(this, true)
        }
    })

    function render() {
        var childs = toView.childNodes
        for (var i = 0; i < tags.length; i++) {
            if (childs[i]) {
                childs[i].childNodes[0].nodeValue = tags[i]
                childs[i].classList.remove('delete')
            } else
                appendNewTag(tags[i])

        }

        for (; i < childs.length; i++)
            toView.removeChild(childs[i])

        toServer.value = tags

    }

    function toggleRemoveTag() {
        if (!this.classList.contains('delete'))
            this.classList.add('delete')
        else
            this.classList.remove('delete')
    }

    function removeTag() {
        tags.splice(tags.indexOf(this.parentNode.childNodes[0].nodeValue), 1)
        render()

    }

    /*
     drag and drop
     */

    function handleDragStart(e) {
        this.style.opacity = '0.4'
        this.classList.remove('delete')
        dragSrcEl = this

        e.dataTransfer.effectAllowed = 'move'
    }

    function handleDragEnter(e) {
        this.classList.add('over')
    }

    function handleDragLeave(e) {
        this.classList.remove('over')
    }

    function handleDragEnd(e) {
        this.style.opacity = '1'
    }

    function handleDragOver(e) {
        if (e.preventDefault)
            e.preventDefault()
        e.dataTransfer.dropEffect = 'move'
    }

    function handleDrop(e) {
        if (e.stopPropagation)
            e.stopPropagation()

        if (dragSrcEl != this) {
            var indexTwo = tags.indexOf(this.childNodes[0].nodeValue)
            tags[tags.indexOf(dragSrcEl.childNodes[0].nodeValue)] = this.childNodes[0].nodeValue
            tags[indexTwo] = dragSrcEl.childNodes[0].nodeValue

            render()
        }

        this.classList.remove('over')

    }

    function appendNewTag(name) {

        var para = document.createElement("span")
        para.className = "tag"
        para.draggable = true

        para.addEventListener("click", toggleRemoveTag)
        para.addEventListener("dragstart", handleDragStart)
        para.addEventListener("dragenter", handleDragEnter)
        para.addEventListener("dragleave", handleDragLeave)
        para.addEventListener("dragover", handleDragOver)
        para.addEventListener("dragend", handleDragEnd)
        para.addEventListener("drop", handleDrop)

        para.appendChild(document.createTextNode(name))

        var remove = document.createElement("span")
        remove.appendChild(document.createTextNode('x'))
        remove.className = "remove"
        remove.addEventListener("click", removeTag)
        para.appendChild(remove)

        toView.appendChild(para)

    }

    /*
     Init
     */

    if (toServer.value && toServer.value.length > 0) {
        var newTags = toServer.value.split(",")
        for (var i = 0, newTag = newTags[0]; newTag = newTags[i]; i++) {
            if (tags.indexOf(newTag) === -1)
                tags.push(newTag)
            render()
        }
    }

}());

//
//modal.close.then(function (result) {
//    $scope.yesNoResult = result ? "You said Yes" : "You said No";
//}, function () {
//    modal.element.on('hidden.bs.modal', function () {
//        $('.modal').remove();
//    });
//});




