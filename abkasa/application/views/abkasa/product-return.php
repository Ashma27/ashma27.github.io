<html>
    <head>
        <title>My Orders</title>
        <!-- Compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">-->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                    <a href="<?php echo base_url('abkasa/logout'); ?>" class="btn btn-warning"><i class="fa fa-sign-out left"></i> logout</a>
                <?php }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Replace/Return Product</h3><br/>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        foreach ($ordered_product as $product) {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="100px" width="75px"/></div>
                                                <div class="col-md-2"><?php echo $product['title']; ?></div>
                                                <div class="col-md-1"><?php echo $product['quantity']; ?></div>
                                                <div class="col-md-2"><?php echo $product['size_type']; ?></div>
                                                <?php if (empty($product['status'])) {
                                                    ?>
                                                    <a href="<?php echo base_url('myOrder/doReturnProduct/' . $product['ordered_product_id']); ?>" class="btn btn-success return">Return</a>
                                                    <a href="<?php echo base_url('myOrder/replaceProduct/' . $product['product_id']); ?>" class="btn btn-primary replace-model">Replace</a>
                                                    <?php
                                                } else {
                                                    echo $product['status'];
                                                }
                                                ?>
                                            </div>
                                            <br/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<!--        <div id="myModal" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                 Modal content
                <div class="modal-content">
                    <div id="modal-wrapper" data-url="<?php echo base_url('myOrder/replaceProductWrapper'); ?>"></div>
                </div>
            </div>
        </div>
        <script>
            $('.return').click(function (evt) {
                evt.preventDefault();
                var url = $(this).attr('href');
                if (confirm('Are you sure you want to Return this product?')) {
                    $.post(url, '', function () {
                        location.reload();
                    });
                }
            });

            $('.replace-model').click(function (evt) {
                evt.preventDefault();
                var url = $(this).attr('href');
                $.post(url, '', function (out) {
                    $('#modal-wrapper').html(out.stock_list);
                });
                $("#myModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        </script>-->
    </body>
</html>




