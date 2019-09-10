
$(function () {
    //hang on event of form with id=myform
    $("#myform").submit(function (e) {
//        $(".editor").val( $(".editor").val().replace(/<div.*>/gi, "\n").replace(/<span.*>/gi, "\n").replace(/<p.*>/gi, "\n").replace(/<br>/gi, "\n"));

        $(".editor").val($(".editor").val().replace(/<div.*>/gi, "\n"));
        e.preventDefault();

    });

});


function img_pathUrl(input) {
    $('.forImage img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    $('.forImage span').html("Clcik here to replace offer image");
}

function img_pathUrl1(input, classs) {
    $('.' + classs + ' img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    $('.' + classs + ' span').html("Clcik here to replace image");
}



$(document).ready(function () {
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
            $('#mySidenav').css('left', '-300px');
        }
    });

    $('.link').click(function () {
        $('.hamburger').removeClass('is-active');
        $('#mySidenav').css('left', '-250px');
    });

    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });


    // var table = $('#dataTable').DataTable({
    //     responsive: true,
    //     "order": []
    // });
    $('#myInputTextField').val('');
    $('#myInputTextField').keyup(function () {
        table.search($(this).val()).draw();
    });

    $("#length_change").val("10").change();
    $('#length_change').change(function () {
        table.page.len($(this).val()).draw();
    });

    $('.messages a').click(function () {
        $(this).parent().slideUp();
    });

    $(".messages").fadeTo(3000, 500).slideUp(500, function () {
        $(".messages").slideUp();
    });


    $('.dropdown').click(function () {
        if ($(this).children('.links').hasClass('active')) {
            $(this).children('.links').removeClass('active');
            $(this).children('.items').slideUp();
        }
        else {
            $('.dropdown').children('.links').removeClass('active');
            $('.dropdown').children('.items').slideUp();

            $(this).children('.links').addClass('active');
            $(this).children('.items').slideDown();
        }

    });

    $('.dropdown').each(function () {
        if ($(this).children('.links').hasClass('active')) {
            $(this).children('.items').show();
        }
    });

    $('[data-toggle="tooltip"]').tooltip();



//Signup Form validation
    // $("#myform").validate({
    //     submitHandler: function (form) {
    //         // do other things for a valid form
    //         form.submit();
    //     }
    // });

    //Winnings Accept Decline 

    $(document).on('click', '.winningsBtn', function () {
        var type = $(this).data('value');
        var id = $(this).data('id');

        if (type == 1) {
            $(this).html('<i class="fa fa-close" aria-hidden="true"></i> Decline');
            $(this).data('value', '0');
        }
        else {
            $(this).html('<i class="fa fa-check" aria-hidden="true"></i> Accept');
            $(this).data('value', '1');
        }

        $.ajax({
            type: "POST",
            cache: false,
            url: mybaseurl + "admin/accept_winnings",
            data: {'id': id, 'value': type},
            success: function (result) {

            }
        });
    });

//Common Delete Query
    $(document).on('click', '.delete', function () {
        var type = $(this).data('type');
        var id = $(this).data('id');
        if (confirm('Are you sure you want to Delete this ' + type)) {
            $.ajax({
                type: "POST",
                cache: false,
                url: mybaseurl + "admin/delete",
                data: {'id': id, 'type': type},
                success: function (result) {
                    $('#div_' + id).remove();
                }
            });
        }
    });

    //Remove this

    $(document).on('click', '.remove', function () {
        var type = $(this).data('type');
        var id = $(this).data('id');
        if (confirm('Are you sure you want to Remove this ' + type)) {
            $.ajax({
                type: "POST",
                cache: false,
                url: mybaseurl + "admin/delete",
                data: {'id': id, 'type': type},
                success: function (result) {
                    $('#div_' + id).remove();
                }
            });
        }
    });


    function setTextColor(picker) {
        document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
    }


//Home Page Category Select2
    // $("#hcategory").select2({
    //     placeholder: "Select Category",
    // });
    // $("#hsponsor").select2({
    //     placeholder: "Select Sponsor",
    // });
    // $("#hprizetype").select2({
    //     placeholder: "Select Prize Type",
    // });
    // $("#hofferype").select2({
    //     placeholder: "Select Offer Type",
    // });

    // $('#DataTables_Table_0').DataTable({
    //     responsive: true,
    //     "order": []
    // });

    $(document).on('click', '.deleteMe', function () {
        $(this).parent('.closeMe').remove();
    });

//Code for Category Edit
    $('body').on('click', '.editCat', function () {
        var id = $(this).data('id');
        document.getElementById("cats_" + id).contentEditable = true;
        $(this).addClass('updateCat').removeClass('editCat').html('<i class="fa fa-pencil-square-o"></i> Update');

        document.getElementById("cats_" + id).focus();
    });
    $('body').on('click', '.updateCat', function () {
        var id = $(this).data('id');
        $(this).removeClass('updateCat').addClass('editCat').html('<i class="fa fa-pencil"></i> Edit');
        document.getElementById("cats_" + id).contentEditable = false;
        $("#cats_" + id + " br").remove();
        var data = $("#cats_" + id).html();
        if (data != "") {
            $.ajax({
                type: "post",
                cache: false,
                url: mybaseurl + "admin/edit_category",
                data: {'id': id, 'data': data},
                success: function (result) {

                },
            });
        }
    });

// Code For Prize Type Edit
    $('body').on('click', '.editPrizeT', function () {
        var id = $(this).data('id');
        document.getElementById("types_" + id).contentEditable = true;
        $(this).addClass('updatePrizeT').removeClass('editPrizeT').html('<i class="fa fa-pencil-square-o"></i> Update');

        document.getElementById("types_" + id).focus();
    });
    $('body').on('click', '.updatePrizeT', function () {
        var id = $(this).data('id');
        $(this).removeClass('updatePrizeT').addClass('editPrizeT').html('<i class="fa fa-pencil"></i> Edit');
        document.getElementById("types_" + id).contentEditable = false;
        $("#types_" + id + " br").remove();
        var data = $("#types_" + id).html();
        $.ajax({
            type: "post",
            cache: false,
            url: mybaseurl + "admin/edit_prize_type",
            data: {'id': id, 'data': data},
            success: function (result) {

            },
        });
    });

    // Code For Offer Type Edit
    $('body').on('click', '.editOfferT', function () {
        var id = $(this).data('id');
        document.getElementById("types_" + id).contentEditable = true;
        $(this).addClass('updateOfferT').removeClass('editOfferT').html('<i class="fa fa-pencil-square-o"></i> Update');
        document.getElementById("types_" + id).focus();
    });
    $('body').on('click', '.updateOfferT', function () {
        var id = $(this).data('id');
        $(this).removeClass('updateOfferT').addClass('editOfferT').html('<i class="fa fa-pencil"></i> Edit');
        document.getElementById("types_" + id).contentEditable = false;
        $("#types_" + id + " br").remove();
        var data = $("#types_" + id).html();
        $.ajax({
            type: "post",
            cache: false,
            url: mybaseurl + "admin/edit_offer_type",
            data: {'id': id, 'data': data},
            success: function (result) {

            },
        });
    });

    // Code For Sponsor Edit
    $('body').on('click', '.editsponsor', function () {
        var id = $(this).data('id');
        document.getElementById("sponsor_" + id).contentEditable = true;
        $(this).addClass('updatesponsor').removeClass('editsponsor').html('<i class="fa fa-pencil-square-o"></i> Update');
        document.getElementById("sponsor_" + id).focus();
    });
    $('body').on('click', '.updatesponsor', function () {
        var id = $(this).data('id');
        $(this).removeClass('updatesponsor').addClass('editsponsor').html('<i class="fa fa-pencil"></i> Edit');
        document.getElementById("sponsor_" + id).contentEditable = false;
        $("#sponsor_" + id + " br").remove();
        var data = $("#sponsor_" + id).html();
        $.ajax({
            type: "post",
            cache: false,
            url: mybaseurl + "admin/edit_sponsor",
            data: {'id': id, 'data': data},
            success: function (result) {

            },
        });
    });



    $('.gbarcode').click(function () {
        if ($(this).hasClass('active')) {
            return false;
        }
        else {
            $(this).addClass('active');
            $.ajax({
                type: "post",
                cache: false,
                url: mybaseurl + "merchant/products/genarateBarCode",
                success: function (result) {
                    $('#codeStatus').prop("checked", true);
                    $('.barcodeInput').val(result).prop('readonly', true);
                    $(this).prop('disable', true);

                }
            });
        }
    });

//     $('.timepicker').datetimepicker({
//         format: 'HH:mm'
//     });
//     $('.datepicker').datetimepicker({
//         format: 'DD/MM/YYYY',
//     });

//     $('.datepicker1').datetimepicker({
//         format: 'DD/MM/YYYY',
//         minDate: new Date(),
// //    inline: true,
//     });
//     $('.datepicker2').datetimepicker({
//         format: 'DD/MM/YYYY',
//         minDate: new Date(),
//         defaultDate: new Date(),
// //    inline: true,
//     });

    $(document).on('click', '.ffirst input', function () {
        var count = $('.selected').html();
        if ($(this).is(':checked')) {
            $('.selected').html(parseInt(count) + 1);
        }
        else {
            $('.selected').html((parseInt(count) == 0) ? '0' : parseInt(count) - 1);
        }
    });

});


$(document).ready(function () {
    $(".editor").summernote({
        height: 300, // set editor height (toolbar not included???)
        focus: false, // set focus to editable area after initializing summernote

    });

//    $(".note-editable").on('keyup', function () {
//        $(this).html($(this).html().replace(/<(.|\n)*?>/g, ''));
//        $(this).parents('.note-editor').prev().show();
//    });
});