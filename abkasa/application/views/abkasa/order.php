<html>
    <head>
        <title>Home</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

    </head>
    <body>

        <div class="row">
            <div class="col-md-1"> <a class="btn btn-default" href="<?php echo base_url('abkasa'); ?>">Home</a></div>
            <div class="col-md-2"><?php
                if (!empty($client)) {
                    echo 'Welcome ' . $client['name'];
                }
                ?>
            </div>
            <div class="col-md-1"><?php if (!empty($client)) { ?><a href="<?php echo base_url('myOrder'); ?>">My orders</a> <?php } ?></div>
            <div class="col-md-1"><?php if (!empty($client)) { ?> <span>Wallet: &#8377 <?php echo $client['points']; ?> </span> <?php } ?>  </div>
            <div class="col-md-2"></div>
            <div class="col-md-1">
                <a href="<?php echo base_url('cart\displayCart'); ?>"><i style="font-size: 20px" class="fa fa-cart-plus"></i></a>
            </div>
            <div class="col-md-3">
                <?php if (empty($this->session->userdata('email'))) { ?>
                    <a href="<?php echo $google_login_url ?>"class="waves-effect waves-light btn red" ><i class="fa fa-google left"></i>Google login</a>
                    <a href="<?php echo $fburl; ?>" class="waves-effect waves-light btn " style="background-color:#4267b2;">
                        <i class="pull-left fa fa-facebook" aria-hidden="true"></i>
                        Fb Login
                    </a>
                <?php } else { ?>
                    <a href="<?php echo base_url('abkasa/logout'); ?>" class="waves-effect waves-light btn gray"><i class="fa fa-sign-out left"></i> logout</a>
                <?php }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>Order Detail</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="error_msg"></div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Name</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form method="post" action="<?php echo base_url('cart/add-Order'); ?>">
                                    <?php
                                    foreach ($this->cart->contents() as $cart) {
                                        $id = explode('_', $cart['id']);
                                        ?>
                                        <input type="hidden" name="product_id[]" value="<?php echo end($id); ?>"/>
                                        <tr>
                                            <td><?php echo $cart['qty']; ?> <input type="hidden" name="qty[]" value="<?php echo $cart['qty']; ?>"/></td>
                                            <td><?php echo $cart['name']; ?></td>
                                            <td><?php echo $cart['size']; ?> <input type="hidden" name="size_type[]" value="<?php echo $cart['size']; ?>"/></td>
                                            <td>&#8377; <?php echo $cart['price']; ?> <input type="hidden" name="price[]" value="<?php echo $cart['price']; ?>"/></td>
                                            <td>&#8377; <?php echo $this->cart->format_number($cart['subtotal']); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><b>Sub Total</b></td>
                                        <td>&#8377; <input type="hidden" name="sub_total" id="sub-total" value="<?php echo $this->cart->total(); ?>"/><?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>
                                            Enter Coupon Code
                                            <input type="text" name="code" class="form-control" id="code"/>
                                            <a href="#" data-url="<?php echo base_url('cart/getDiscount'); ?>" id="coupon" class="btn btn-sm pull-right">Apply Coupon</a>
                                        </td>
                                        <td><b>Discount</b><span id="discount-info"></span></td>
                                        <td>-&#8377; <span id="disc">00.00</span><input type="hidden" name="discounted_price" value="" id="discounted_price"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><b>Total</b></td>
                                        <td>&#8377; <span id="tot"><?php echo $this->cart->format_number($this->cart->total()); ?></span> <input type="hidden" name="total" id="total" value="<?php echo $this->cart->total(); ?>"/></td>
                                    </tr>
                                    </tbody>
                            </table>
                            <input type="hidden" name="referral_code" value="" id="referral_code"/>
                            <input type="hidden" name="coupon_id" value="" id="coupon_id"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><a href="<?php echo base_url('cart/check-address'); ?>" class="btn btn-danger">Back</a></div>
                <div class="col-md-2 col-md-offset-7"><button type="submit" class="btn btn-primary">Proceed</button></div>
            </div>
        </form>
    </div>
    <script>
        $('#coupon').click(function (evt) {
            evt.preventDefault();
            var url = $(this).data('url');
            var code = $('#code').val();
            $.post(url, {code: code}, function (out) {
                $("td > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents("td").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === 1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    $('#discount-info').html(' (Referal Code Applied)');
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                    }, 3000);
                    $('#code').val('');
                    $('#referral_code').val(out.referral_code);
                }
                if (out.result === 2) {
                    var sub_total = $('#sub-total').val();
                    if (out.discount_type === 'percent') {
                        $('#discount-info').html(' (' + out.discount + '% OFF)');
                        var discounted_value = (sub_total * out.discount) / 100;
                        $('#discounted_price').val(discounted_value);
                    }
                    if (out.discount_type === 'val') {
                        $('#discount-info').html(' ( &#8377;' + out.discount + '/- OFF)');
                        var discounted_value = parseInt(out.discount);
                        $('#discounted_price').val(discounted_value);
                    }
                    $('#disc').html(discounted_value.toFixed(2));
                    var total = sub_total - discounted_value;
                    $('#tot').html(addCommas(total.toFixed(2)));
                    $('#total').val(total);
                    $('#code').val('');
                    $('#coupon_id').val(out.coupon_id);
                }
                if (out.result === -1) {
                    $("#code").parents("td").append('<span class="error">' + out.msg + '</span>');
                }
            });
        });

        function addCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }


    </script>
</body>
</html>