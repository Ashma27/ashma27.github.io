<html>
    <head>
        <title>Login</title>
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
                    <h2>Cart</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!empty($this->cart->contents())) { ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <table class="table table-bordered"> 
                                        <tr>
                                            <th style="text-align:center">QTY</th>
                                            <th style="text-align:center">Item Title</th>
                                            <th style="text-align:center">Size</th>
                                            <th style="text-align:center">Item Price</th>
                                            <th style="text-align:center">Sub-Total</th>
                                        </tr>
                                        <?php foreach ($this->cart->contents() as $items): ?>
                                            <form method="post" id="cart-form" action="<?php echo base_url('cart/updateCart'); ?>">
                                                <tr>
                                                    <td style="text-align:center"><?php echo form_input(array('name' => 'qty', 'value' => $items['qty'], 'data-rowid' => $items['rowid'], 'data-id' => $items['id'], 'class' => 'qty')); ?></td>
                                                    <td style="text-align:center"><?php echo $items['name']; ?></td>
                                                    <td style="text-align:center"><?php echo $items['size']; ?></td>
                                                    <td style="text-align:center">&#8377; <?php echo $items['price']; ?></td>
                                                    <td style="text-align:center">&#8377; <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                                </tr>
                                            </form>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td style="text-align:center"><strong>Total</strong></td>
                                            <td style="text-align:center">&#8377; <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><a href="<?php echo base_url('abkasa'); ?>" class="btn btn-danger">Continue Shopping</a></div>
                            <div class="col-md-2 col-md-offset-7"><?php if (!empty($this->session->userdata('email'))) { ?><a href="<?php echo base_url('cart/check-address'); ?>" class="btn btn-primary">Next</a><?php
                                } else {
                                    echo 'Please Login to process further';
                                }
                                ?></div>
                        </div>
                    <?php } else {
                        ?>
                        <h3 style="text-align: center">Cart is empty</h3>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <script>
            $('.qty').change(function () {
                var qty = $(this).val();
                var rowid = $(this).data('rowid');
                var url = $('#cart-form').attr("action");
                var id = $(this).data('id');
                $.post(url, {rowid: rowid, qty: qty, id: id}, function (out) {
                    if (out.result === 1) {
                        window.location.href = out.url;
                    }
                });
            });
        </script>
    </body>
</html>




