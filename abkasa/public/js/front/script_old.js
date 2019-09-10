var Event = function () {
    this.__construct = function () {
        this.getCount();
        this.getCart();
        this.selectSize();
        this.addToCart();
        this.increament();
        this.decreament();
        this.deleteFromCart();
        this.callModal();
        this.cancelOrderModel();
        this.cancelOrder();
        this.applyCoupon();
        this.removeCoupon();
        this.addOrder();
        this.doReturnProduct();
        this.replaceProduct();
        this.doReplaceProduct();
        this.addContact();
        this.filter();
        this.getSize();
        this.getFit();
        this.getFitValue();
        this.addNewsletter();
        this.addConsultation();

    };

    this.getCount = function () {
        $(document).ready(function () {
            var url = $('#cart-count').data('url');
            $.post(url, '', function (out) {
                $('#cart-count').html(out.cart_count);
            });
        });
    };

    this.getCart = function () {
        $(document).ready(function () {
            var url = $('#cart-wrapper').data('url');
            $.post(url, '', function (out) {
                $('#cart-wrapper').html(out.cart_list);
            });
        });
    };
    
    this.selectSize=function(){
        $(document).ready(function () {
            var size = $('.viewsize').val();
            if (size === 'small') {
                var slim = $('#small_slim').val();
                var regular = $('#small_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
            if (size === 'medium') {
                var slim = $('#medium_slim').val();
                var regular = $('#medium_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
            if (size === 'large') {
                var slim = $('#large_slim').val();
                var regular = $('#large_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
            if (size === 'xl') {
                var slim = $('#xl_slim').val();
                var regular = $('#xl_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }

        });

        $('.viewsize').change(function () {
            var size = $(this).val();
            if (size === 'small') {
                var slim = $('#small_slim').val();
                var regular = $('#small_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
            if (size === 'medium') {
                var slim = $('#medium_slim').val();
                var regular = $('#medium_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
            if (size === 'large') {
                var slim = $('#large_slim').val();
                var regular = $('#large_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
            if (size === 'xl') {
                var slim = $('#xl_slim').val();
                var regular = $('#xl_regular').val();
                if (slim === '0') {
                    $('#slim_size').addClass('hidden');
                }else{
                    $('#slim_size').removeClass('hidden');
                }
                if (regular === '0') {
                    $('#regular_size').addClass('hidden');
                }else{
                    $('#regular_size').removeClass('hidden');
                }
            }
        });
    };

    this.addToCart = function () {
        $('#add-to-cart').click(function (evt) {
            evt.preventDefault();
            var url = $('#url').val();
            var qty = $('#number').val();
            var price = $('#price').val();
            var name = $('#name').val();
            var id = $('#id').val();
            var viewsize = $("input:radio.viewsize:checked").val();
            var size = $("input:radio.size:checked").val();
            $.post(url, {product_id: id, size: size, qty: qty, price: price, name: name, viewsize: viewsize}, function (out) {
                $("#error-message > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#error-message").append('<span class="error">' + out.errors[i] + '</span>');
                    }
                }
                if (out.result === 1) {
                    location.reload();
                    obj.getCount();
                }
            });
        });
    };
    this.increament = function () {
        $(document).on('click', '.cart-qty-plus', function () {
            var $n = $(this).parent(".buttons").find(".qty");
            $n.val(Number($n.val()) + 1);
            var qty = $n.val();
            var rowid = $n.data('rowid');
            var url = $('#cart-form').attr("action");
            var id = $n.data('id');
            $.post(url, {rowid: rowid, qty: qty, id: id}, function (out) {
                if (out.result === 1) {
                    obj.getCart();
                    obj.getCount();
                }
            });
        });
    };

    this.decreament = function () {
        $(document).on('click', '.cart-qty-minus', function () {
            var $n = $(this).parent(".buttons").find(".qty");
            var amount = Number($n.val());
            if (amount > 1) {
                amount -= 1;
                $n.val(amount);
            }
            var qty = amount;
            var rowid = $n.data('rowid');
            var url = $('#cart-form').attr("action");
            var id = $n.data('id');
            $.post(url, {rowid: rowid, qty: qty, id: id}, function (out) {
                if (out.result === 1) {
                    obj.getCart();
                    obj.getCount();
                }
            });
        });
    };

    this.deleteFromCart = function () {
        $(document).on('click', '.remove-cart', function (evt) {
            var val = $(this).data('id');
            evt.preventDefault();
            var url = $(this).attr('href');
            $.post(url, {id: val}, function (out) {
                if (out.result === 1) {
                    obj.getCart();
                    obj.getCount();
                }
            });
        });
    };

    this.callModal = function () {
        $('#coupon-modal').click(function () {
            $('#myModal2').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    };

    this.cancelOrderModel = function () {
        $('.cancle-button').click(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('href');
            $.post(url, '', function (out) {
                $('#cancel-order-wrapper').html(out.ordered_product_list);
            });
            $('#product-cancel-modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    };

    this.cancelOrder = function () {
        $(document).on('click', '.cncl-order', function (evt) {
            evt.preventDefault();
            var url = $(this).attr('href');
            $.post(url, '', function (out) {
                location.reload();
            });
        });
    };

    this.applyCoupon = function () {
        $(document).on('submit', '#coupon', function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".col-md-8 > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".col-md-8").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === 1) {
                    form.reset();
                    $('#show-coupon').addClass('hidden');
                    $('#remove-coupon').removeClass('hidden').addClass('show');
                    $('#myModal2').modal('hide');
                    $('#discount-info').html('(Referral Code: 10% Off)');
                    var sub_total = $('#sub-total').val();
                    var discounted_value = (sub_total / 10);
                    $('#discounted_price').val(discounted_value);
                    $('#referral_code').val(out.referral_code);
                    $('#discount-val').val(discounted_value);
                    $('#discount-value').html('-₹' + discounted_value.toFixed(2));
                    var total = sub_total - discounted_value;
                    $('#tot').html(addCommas(total.toFixed(2)));
                    $('#total').val(total);
                }
                if (out.result === 2) {
                    form.reset();
                    $('#show-coupon').addClass('hidden');
                    $('#remove-coupon').removeClass('hidden').addClass('show');
                    $('#myModal2').modal('hide');
                    var sub_total = $('#sub-total').val();
                    if (out.discount_type === 'percent') {
                        $('#discount-info').html(' (' + out.discount + '% OFF)');
                        var discounted_value = (sub_total * out.discount) / 100;
                        $('#discounted_price').val(discounted_value);
                    }
                    if (out.discount_type === 'val') {
                        $('#discount-info').html(' ( ₹' + out.discount + '/- OFF)');
                        var discounted_value = parseInt(out.discount);
                        $('#discounted_price').val(discounted_value);
                    }
                    $('#discount-value').html('-₹' + discounted_value.toFixed(2));
                    var total = sub_total - discounted_value;
                    $('#tot').html(addCommas(total.toFixed(2)));
                    $('#total').val(total);
                    $('#coupon_id').val(out.coupon_id);
                }
                if (out.result === -1) {
                    $("#code").parents(".col-md-8").append('<span class="error">' + out.msg + '</span>');
                }
            });
        });
    };

    function addCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    this.removeCoupon = function () {
        $('#remove-coupon').click(function () {
            $('#discount-info').html('');
            $('#coupon_id,#referral_code').val('');
            $('#discount-value').html('-₹0.00');
            var subtotal = $('#sub-total').val();
            $('#tot').html(addCommas(subtotal + '.00'));
            $('#total').val(subtotal);
            $('#coupon_id').val('');
            $('#remove-coupon').addClass('hidden');
            $('#show-coupon').removeClass('hidden').addClass('show');
        });
    };

    this.addOrder = function () {
        $('#add-order').submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                $(".focus-border > .error").remove();
                $(".tick > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i + " .focus-border").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    $("#terms").parents(".tick").append('<span class="error">' + out.msg + '</span>');
                }
                if (out.result === 1) {
                    window.location.href = out.url;
                }
            });
        });
    };

    this.doReturnProduct = function () {
        $('.return').click(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('href');
            if (confirm('Are you sure you want to Return this product?')) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    };

    this.replaceProduct = function () {
        $('.replace-model').click(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('href');
            $.post(url, '', function (out) {
                $('#modal-wrapper').html(out.stock_list);
            });
            $("#product-replace-modal").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    };

    this.doReplaceProduct = function () {
        $(document).on('submit', '#replace-product', function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                $(".message > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $(".message").append('<span class="error">' + out.errors[i] + '</span>');
                    }
                }
                if (out.result === -1) {
                    $(".message").append('<span class="error">' + out.error + '</span>');
                }
                if (out.result === 1) {
                    location.reload();
                }
            });
        });
    };

    this.addContact = function () {
        $(document).on('submit', '#do-add-contact', function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".form-group > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".form-group").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === 1) {
                    form.reset();
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                    }, 2000);
                }
                if (out.result === -1) {
                    //$("#code").parents(".col-md-8").append('<span class="error">' + out.msg + '</span>');
                }
            });
        });
    };

    this.filter = function () {

        var url = $('#filter-wrapper').data('url');
        
        $(document).ready(function () {
            $.post(url, '', function (out) {
                $('#filter-wrapper').html(out.filter_product);
                var id;
                if ($('.shtylink').hasClass('active')) {
                    id = $('.active').attr('data-id');
                }
                $('.ShirtsN').hide();
                $('.shirt'+id).show();
            });
        });

        $('#low_to_high').click(function () {
            var id;
            if ($('.shtylink').hasClass('active')) {
                id = $('.active').attr('data-id');
            }
            $("#high_to_low").prop('checked', false);
            if ($(this).prop('checked') === true) {
                var price = $(this).data('value');
            } else {
                var price = '';
            }
            var sleeve;
            if ($("#short_sleeve").prop('checked')) {
                sleeve = $("#short_sleeve").data('value');
            } else if ($("#long_sleeve").prop('checked')) {
                sleeve = $("#long_sleeve").data('value');
            } else {
                sleeve = "";
            }
            $.post(url, {price_filter: price, sleeve_filter: sleeve}, function (out) {
                $('#filter-wrapper').html(out.filter_product);
                $('.ShirtsN').hide();
                $('.shirt' + id).show();
            });
        });

        $('#high_to_low').click(function () {
            var id;
            if ($('.shtylink').hasClass('active')) {
                id = $('.active').attr('data-id');
            }
            $("#low_to_high").prop('checked', false);
            if ($(this).prop('checked') === true) {
                var price = $(this).data('value');
            } else {
                var price = '';
            }
            var sleeve;
            if ($("#short_sleeve").prop('checked')) {
                sleeve = $("#short_sleeve").data('value');
            } else if ($("#long_sleeve").prop('checked')) {
                sleeve = $("#long_sleeve").data('value');
            } else {
                sleeve = "";
            }
            $.post(url, {price_filter: price, sleeve_filter: sleeve}, function (out) {
                $('#filter-wrapper').html(out.filter_product);
                $('.ShirtsN').hide();
                $('.shirt' + id).show();
            });
        });

        $('#long_sleeve').click(function () {
            var id;
            if ($('.shtylink').hasClass('active')) {
                id = $('.active').attr('data-id');
            }
            $('#short_sleeve').prop('checked', false);
            if ($(this).prop('checked') === true) {
                var sleeve = $(this).data('value');
            } else {
                var sleeve = '';
            }
            var price;
            if ($('#low_to_high').prop('checked')) {
                price = $("#low_to_high").data('value');
            } else if ($('#high_to_low').prop('checked')) {
                price = $("#high_to_low").data('value');
            } else {
                price = "";
            }
            $.post(url, {price_filter: price, sleeve_filter: sleeve}, function (out) {
                $('#filter-wrapper').html(out.filter_product);
                $('.ShirtsN').hide();
                $('.shirt' + id).show();
            });
        });

        $('#short_sleeve').click(function () {
            var id;
            if ($('.shtylink').hasClass('active')) {
                id = $('.active').attr('data-id');
            }
            $("#long_sleeve").prop('checked', false);
            if ($(this).prop('checked') === true) {
                var sleeve = $(this).data('value');
            } else {
                var sleeve = '';
            }
            var price;
            if ($('#low_to_high').prop('checked')) {
                price = $("#low_to_high").data('value');
            } else if ($('#high_to_low').prop('checked')) {
                price = $("#high_to_low").data('value');
            } else {
                price = "";
            }
            $.post(url, {price_filter: price, sleeve_filter: sleeve}, function (out) {
                $('#filter-wrapper').html(out.filter_product);
                $('.ShirtsN').hide();
                $('.shirt' + id).show();
            });
        });
    };
    
    this.getSize = function () {
        $(document).ready(function () {
            var val = $('.brand_wrap').val();
            var url = $('.brand_wrap').data('url');
            $.post(url, {brand_id: val}, function (out) {
                $('#size-wrapper').html(out.size_list);
            });
        });
        
        $(document).on('change', '.brand_wrap', function (evt) {
            evt.preventDefault();
            var val = $(this).val();
            var url = $(this).data('url');
            $.post(url, {brand_id: val}, function (out) {
                $('#size-wrapper').html(out.size_list);
                $('#fit-wrapper').html('');
            });
        });
    };

    this.getFit = function () {
        $(document).on('change', '.viewsize', function () {
            var url = $(this).data('url');
            var size_id = $(this).val();
            $.post(url, {size_id: size_id}, function (out) {
                $('#fit-wrapper').html(out.fit_list);
            });
        });
    };

    this.getFitValue = function () {
        $(document).on('change', '.fit', function () {
            var fit = $(this).val();
            $('#fit-row').removeClass('hidden');
            if (fit === 'slim') {
                $('#fit-regular').addClass('hidden');
                $('#fit-slim').removeClass('hidden');
            } else {
                $('#fit-regular').removeClass('hidden');
                $('#fit-slim').addClass('hidden');
            }
        });
    };
    
    this.addNewsletter=function(){
        $('#add-newsletter').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".col-sm-8 > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".col-sm-8").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                }
                if (out.result === 1) {
                    form.reset();
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                    }, 2000);
                }
            });
        });
    };
    
    this.addConsultation = function () {
        $('#add-consultation').submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".form-group > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".form-group").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                }
                if (out.result === 1) {
                    form.reset();
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                    }, 2000);
                }
            });
        });
    };

    this.__construct();
};
var obj = new Event();