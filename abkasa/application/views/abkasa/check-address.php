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
                    <h2>Edit Address</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="error_msg"></div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="<?php echo base_url('cart/doUpdateAddress'); ?>" id="update-address">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-1">Update address</div>
                                        <div class="col-md-3"><textarea name="address" id="address" rows="5" class="form-control"><?php echo $client['address']; ?></textarea></div>
                                        <div class="col-md-2">Pin code</div>
                                        <div class="col-md-3"><input type="text" name="pincode" id="pincode" value="<?php echo $client['pincode']; ?>"/></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-10">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><a href="<?php echo base_url('cart/displayCart'); ?>" class="btn btn-danger">Back</a></div>
                <div class="col-md-2 col-md-offset-7"><a href="<?php echo base_url('cart/order'); ?>" class="btn btn-primary">Next</a></div>
            </div>
        </div>
        <script>
            $(document).on('submit', '#update-address', function (evt) {
                evt.preventDefault();
                var url = $(this).attr("action");
                var postdata = $(this).serialize();
                $.post(url, postdata, function (out) {
                    $(".col-md-3 > .error").remove();
                    if (out.result === 0) {
                        for (var i in out.errors) {
                            alert(out.errors[i]);
                            $("#" + i).parents(".col-md-3").append('<span class="error">' + out.errors[i] + '</span>');
                            $("#" + i).focus();
                        }
                    }
                    if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        window.setTimeout(function () {
                            $('#error_msg').slideUp();
                        }, 2000);
                    }
                    if (out.result === 1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        window.setTimeout(function () {
                            $('#error_msg').slideUp();
                        }, 2000);
                    }
                });
            });
        </script>
    </body>
</html>