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
                            <h3>Upcoming</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $order) {
                                                if ($order['status'] == 'Pending' and $order['order_status'] == NULL) {
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-1">Order Id: </div>
                                                                <div class="col-md-1"><?php echo $order['order_id']; ?> </div>
                                                                <div class="col-md-2">Payment Date: </div>
                                                                <div class="col-md-2"><?php echo $order['date']; ?> </div>
                                                                <div class="col-md-2">Payment Mode: </div>
                                                                <div class="col-md-2"><?php echo $order['payment_mode']; ?> </div>
                                                                <div class="col-md-2"><a href="<?php echo base_url('myOrder/cancel-order/' . $order['order_id']); ?>" class="btn btn-primary">Cancel Order</a></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-2 col-md-offset-3"><b>Image</b></div>
                                                                                <div class="col-md-2"><b>Product Name</b></div>
                                                                                <div class="col-md-2"><b>Quantity</b></div>
                                                                                <div class="col-md-2"><b>Price</b></div>
                                                                            </div>
                                                                            <?php
                                                                            $products = $order['ordered_products'];
                                                                            foreach ($products as $product) {
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="col-md-2 col-md-offset-3"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="100px" width="75px"/></div>
                                                                                    <div class="col-md-2"><?php echo $product['title']; ?></div>
                                                                                    <div class="col-md-2"><?php echo $product['quantity']; ?></div>
                                                                                    <div class="col-md-2"><?php echo '&#x20b9; ' . $product['price']; ?></div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 col-md-offset-8"><b>Subtotal</b></div>
                                                                <div class="col-md-2"><?php echo '&#x20b9; ' . $order['sub_total']; ?></div>
                                                            </div>
                                                            <?php
                                                            if (!empty($order['coupon'])) {
                                                                $coupon = $order['coupon'];
                                                                if ($coupon['discount_type'] == 'percent') {
                                                                    $discount_value = ' (' . $coupon['discount'] . '% OFF)';
                                                                } else {
                                                                    $discount_value = ' (' . $coupon['discount'] . '/- OFF)';
                                                                }
                                                                $discount = $order['total'] - $order['sub_total'];
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-1 col-md-offset-8"><b>Discount</b></div>
                                                                    <div class="col-md-2"><?php
                                                                        echo '-&#x20b9; ' . $discount;
                                                                        if (!empty($discount_value)) {
                                                                            echo $discount_value;
                                                                        }
                                                                        ?></div>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-1 col-md-offset-8"><b>Total</b></div>
                                                                <div class="col-md-2"><?php echo '&#x20b9; ' . $order['total']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Delivered</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $order) {
                                                if ($order['status'] == 'Delivered' and $order['order_status'] == NULL) {
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-1">Order Id: </div>
                                                                <div class="col-md-1"><?php echo $order['order_id']; ?> </div>
                                                                <div class="col-md-2">Payment Date: </div>
                                                                <div class="col-md-2"><?php echo $order['date']; ?> </div>
                                                                <div class="col-md-2">Payment Mode: </div>
                                                                <div class="col-md-2"><?php echo $order['payment_mode']; ?> </div>
                                                                <div class="col-md-2"><a href="<?php echo base_url('myOrder/product-return/' . $order['order_id']); ?>" class="btn btn-primary">Replace/Return</a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-2 col-md-offset-3"><b>Image</b></div>
                                                                                <div class="col-md-2"><b>Product Name</b></div>
                                                                                <div class="col-md-2"><b>Quantity</b></div>
                                                                                <div class="col-md-2"><b>Price</b></div>
                                                                            </div>
                                                                            <?php
                                                                            $products = $order['ordered_products'];
                                                                            foreach ($products as $product) {
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="col-md-2 col-md-offset-3"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="100px" width="75px"/></div>
                                                                                    <div class="col-md-2"><?php echo $product['title']; ?></div>
                                                                                    <div class="col-md-2"><?php echo $product['quantity']; ?></div>
                                                                                    <div class="col-md-2"><?php echo $product['price']; ?></div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 col-md-offset-8"><b>Subtotal</b></div>
                                                                <div class="col-md-2"><?php echo '&#x20b9; ' . $order['sub_total']; ?></div>
                                                            </div>
                                                            <?php
                                                            if (!empty($order['coupon'])) {
                                                                $coupon = $order['coupon'];
                                                                if ($coupon['discount_type'] == 'percent') {
                                                                    $discount_value = ' (' . $coupon['discount'] . '% OFF)';
                                                                } else {
                                                                    $discount_value = ' (' . $coupon['discount'] . '/- OFF)';
                                                                }
                                                                $discount = $order['total'] - $order['sub_total'];
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-1 col-md-offset-8"><b>Discount</b></div>
                                                                    <div class="col-md-2"><?php
                                                                        echo '-&#x20b9; ' . $discount;
                                                                        if (!empty($discount_value)) {
                                                                            echo $discount_value;
                                                                        }
                                                                        ?></div>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-1 col-md-offset-8"><b>Total</b></div>
                                                                <div class="col-md-2"><?php echo '&#x20b9; ' . $order['total']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Canceled</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $order) {
                                                if ($order['order_status'] == 'Cancel') {
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-1">Order Id: </div>
                                                                <div class="col-md-1"><?php echo $order['order_id']; ?> </div>
                                                                <div class="col-md-2">Payment Date: </div>
                                                                <div class="col-md-2"><?php echo $order['date']; ?> </div>
                                                                <div class="col-md-2">Payment Mode: </div>
                                                                <div class="col-md-2"><?php echo $order['payment_mode']; ?> </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-2 col-md-offset-3"><b>Image</b></div>
                                                                                <div class="col-md-2"><b>Product Name</b></div>
                                                                                <div class="col-md-2"><b>Quantity</b></div>
                                                                                <div class="col-md-2"><b>Price</b></div>
                                                                            </div>
                                                                            <?php
                                                                            $products = $order['ordered_products'];
                                                                            foreach ($products as $product) {
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="col-md-2 col-md-offset-3"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="100px" width="75px"/></div>
                                                                                    <div class="col-md-2"><?php echo $product['title']; ?></div>
                                                                                    <div class="col-md-2"><?php echo $product['quantity']; ?></div>
                                                                                    <div class="col-md-2"><?php echo $product['price']; ?></div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 col-md-offset-8"><b>Subtotal</b></div>
                                                                <div class="col-md-2"><?php echo '&#x20b9; ' . $order['sub_total']; ?></div>
                                                            </div>
                                                            <?php
                                                            if (!empty($order['coupon'])) {
                                                                $coupon = $order['coupon'];
                                                                if ($coupon['discount_type'] == 'percent') {
                                                                    $discount_value = ' (' . $coupon['discount'] . '% OFF)';
                                                                } else {
                                                                    $discount_value = ' (' . $coupon['discount'] . '/- OFF)';
                                                                }
                                                                $discount = $order['total'] - $order['sub_total'];
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-1 col-md-offset-8"><b>Discount</b></div>
                                                                    <div class="col-md-2"><?php
                                                                        echo '-&#x20b9; ' . $discount;
                                                                        if (!empty($discount_value)) {
                                                                            echo $discount_value;
                                                                        }
                                                                        ?></div>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-1 col-md-offset-8"><b>Total</b></div>
                                                                <div class="col-md-2"><?php echo '&#x20b9; ' . $order['total']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
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
    </body>
</html>




