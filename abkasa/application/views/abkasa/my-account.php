<?php $this->load->view('abkasa/commons/header'); ?>
<section class="productDetail boxs productlist inView productlist2" data-type="black">
    <div class="container">
        <div class="proDetailinner boxs">
            <div class="myaccountpage boxs">
                <div class="col-sm-3 accw1">
                    <div class="left boxs">
                        <ul class="myaccounttabs">
                            <li><a href="javascript:void(0)" class="myactablinks active" data-id="1">Orders</a></li>
                            <li><a href="javascript:void(0)" class="myactablinks" data-id="2">Account details</a></li>
                            <li><a href="<?php echo base_url('abkasa/logout'); ?>" class="myactablinks" >Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 accw2">
                    <div class="right boxs">
                        <div class="acnttab acnttab1 boxs">
                            <div class="order_tab boxs">
                                <ul class="ordertab">
                                    <li><a href="javascript:void(0)" data-id="1" class="orderlink upcomingN active">Upcoming</a></li>
                                    <li><a href="javascript:void(0)" data-id="2" class="orderlink deliveredN">Delivered</a></li>
                                    <li><a href="javascript:void(0)" data-id="3" class="orderlink CanceledN">Canceled/Return</a></li>
                                </ul>
                            </div>
                            <div class="order_tab_data boxs">
                                <div class="Ordertabd Ordertabd1 boxs">
                                    <div class="orderstat boxs">
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $order) {
                                                if ($order['status']!='Delivered' and $order['order_status'] == NULL) {
                                                    $products = $order['ordered_products'];
                                                    $count=0;
                                                    foreach ($products as $product){
                                                        if($product['status']==NULL){
                                                            $count++;
                                                        }
                                                    }
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body padzero">
                                                            <div class="row">
                                                                <div class="up_heading boxs">
                                                                    <ul class="up_head_inner boxs">
                                                                        <li>Id: <span><?php echo $order['order_id']; ?></span></li>
                                                                        <li>Date: <span><?php echo $order['date']; ?></span></li>
                                                                        <li>Mode: <span><?php echo $order['payment_mode']; ?></span></li>
                                                                        <li>Status: <span><?php  echo str_replace('_', ' ', $order['status']); ?></span></li>
                                                                        <li>
                                                                            <?php if($order['status']=='Pending'){ if($count>1){
                                                                            ?>
                                                                            <a href="<?php echo base_url('account/cancel-order-model/'.$order['order_id']); ?>" class="canclebtn cancle-button" data-target="#product-cancel-modal">Cancel Order</a>
                                                                            <?php
                                                                            }else{
                                                                            ?>
                                                                            <a href="<?php echo base_url('account/cancel_order/'.$order['order_id']); ?>" class="canclebtn">Cancel Order</a>
                                                                            <?php
                                                                            } }?>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body panelbody2">
                                                                            <?php
                                                                            foreach ($products as $product) {
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="p_flex_main boxs">
                                                                                        <div class="p_flex">
                                                                                            <div class="col-md-3"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="125px" width="95px"/></div>
                                                                                            <div class="col-md-3"><p><?php echo $product['title']; ?></p></div>
                                                                                            <div class="col-md-3"><p><?php echo $product['quantity']; ?></p></div>
                                                                                            <div class="col-md-3">
                                                                                                <p><?php echo '&#x20b9; ' . $product['price']; if($product['status']=='Canceled'){ echo '('.$product['status'].')';}  ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="total boxs">
                                                                <div class="col-sm-4 col-sm-offset-8">
                                                                    <div class="subtotal boxs">
                                                                        <p><span>Subtotal: </span> <?php echo '&#x20b9; ' . $order['sub_total']; ?></p>
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
                                                                        <div class="subtotal boxs">
                                                                            <p><span>Discount: </span><?php
                                                                                echo '-&#x20b9; ' . $discount;
                                                                                if (!empty($discount_value)) {
                                                                                    echo $discount_value;
                                                                                }
                                                                                ?> </p>
                                                                        </div>
                                                                    <?php }
                                                                    ?>
                                                                    <div class="subtotal boxs">
                                                                        <p><span>Total: </span> <?php echo '&#x20b9; ' . $order['total']; ?></p>
                                                                    </div>
                                                                </div>
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
                                <div class="Ordertabd Ordertabd2 boxs">
                                    <div class="orderstat boxs">
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $order) {
                                                if ($order['status'] == 'Delivered' and $order['order_status'] == NULL) {
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body padzero">
                                                            <div class="row">
                                                                <div class="up_heading boxs">
                                                                    <ul class="up_head_inner boxs">
                                                                        <li>Id: <span><?php echo $order['order_id']; ?></span></li>
                                                                        <li>Date: <span><?php echo $order['date']; ?></span></li>
                                                                        <li>Mode: <span><?php echo $order['payment_mode']; ?></span></li>
                                                                        <li>Status: <span><?php echo $order['status']; ?></span></li>
                                                                        <li><a href="<?php echo base_url('account/returnProduct/' . $order['order_id']); ?>" class="canclebtn">Replace/Return</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body panelbody2">
                                                                            <?php
                                                                            $products = $order['ordered_products'];
                                                                            foreach ($products as $product) {
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="p_flex_main boxs">
                                                                                        <div class="p_flex">
                                                                                            <div class="col-md-3"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="125px" width="95px"/></div>
                                                                                            <div class="col-md-3"><p><?php echo $product['title']; ?></p></div>
                                                                                            <div class="col-md-3"><p><?php echo $product['quantity']; ?></p></div>
                                                                                            <div class="col-md-3"><p><?php echo '&#x20b9; ' . $product['price']; ?></p></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="total boxs">
                                                                <div class="col-sm-4 col-sm-offset-8">
                                                                    <div class="subtotal boxs">
                                                                        <p><span>Subtotal: </span> <?php echo '&#x20b9; ' . $order['sub_total']; ?></p>
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
                                                                        <div class="subtotal boxs">
                                                                            <p><span>Discount: </span><?php
                                                                                echo '-&#x20b9; ' . $discount;
                                                                                if (!empty($discount_value)) {
                                                                                    echo $discount_value;
                                                                                }
                                                                                ?> </p>
                                                                        </div>
                                                                    <?php }
                                                                    ?>
                                                                    <div class="subtotal boxs">
                                                                        <p><span>Total: </span> <?php echo '&#x20b9; ' . $order['total']; ?></p>
                                                                    </div>
                                                                </div>
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
                                <div class="Ordertabd Ordertabd3 boxs">
                                    <div class="orderstat boxs">
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $order) {
                                                if ($order['order_status'] == 'Cancel' or $order['order_status'] == 'Replace' or ( $order['order_status'] == 'Return')) {
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body padzero">
                                                            <div class="row">
                                                                <div class="up_heading boxs">
                                                                    <ul class="up_head_inner boxs">
                                                                        <li>Id: <span><?php echo $order['order_id']; ?></span></li>
                                                                        <li>Date: <span><?php echo $order['date']; ?></span></li>
                                                                        <li>Mode: <span><?php echo $order['payment_mode']; ?></span></li>
                                                                        <li>Status: <span><?php echo $order['order_status']; ?></span></li>
                                                                        <li></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body panelbody2">
                                                                            <?php
                                                                            $products = $order['ordered_products'];
                                                                            foreach ($products as $product) {
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="p_flex_main boxs">
                                                                                        <div class="p_flex">
                                                                                            <div class="col-md-2"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="125px" width="95px"/></div>
                                                                                            <div class="col-md-3"><p><?php echo $product['title']; ?></p></div>
                                                                                            <div class="col-md-1"><p><?php echo $product['quantity']; ?></p></div>
                                                                                            <div class="col-md-3"><p><?php echo $product['status']; ?></p></div>
                                                                                            <div class="col-md-3"><p><?php echo '&#x20b9; ' . $product['price']; ?></p></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="total boxs">
                                                                <div class="col-sm-4 col-sm-offset-8">
                                                                    <div class="subtotal boxs">
                                                                        <p><span>Subtotal: </span> <?php echo '&#x20b9; ' . $order['sub_total']; ?></p>
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
                                                                        <div class="subtotal boxs">
                                                                            <p><span>Discount: </span><?php
                                                                                echo '-&#x20b9; ' . $discount;
                                                                                if (!empty($discount_value)) {
                                                                                    echo $discount_value;
                                                                                }
                                                                                ?> </p>
                                                                        </div>
                                                                    <?php }
                                                                    ?>
                                                                    <div class="subtotal boxs">
                                                                        <p><span>Total: </span> <?php echo '&#x20b9; ' . $order['total']; ?></p>
                                                                    </div>
                                                                </div>
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
                        <div class="acnttab acnttab2 boxs">
                            <p class="dashb_data">The following addresses will be used on the checkout page by default.</p>
                           
                            <p class="dashb_data"><b>You Referral Code is: <?php echo $client['referral_code']; ?>. Share this code with your friends and get points</b></p>
                            <p class="dashb_data"><b>Your Current point is: <?php if(!empty($client['points'])){ echo $client['points']; }else{ echo '0'; } ?> </b></p>
                            <form action="<?php echo base_url('Account/updateAddress'); ?>" method="post" autocomplete="off">
                                <div class="checkoutformtop boxs">
                                    <div class="col-sm-6 noleft">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['name'])) {
                                            echo 'filled';
                                        }
                                        ?>">
                                            <input class="effect-16  form-control" type="text" autocomplete="nope" name="name" id="name" value="<?php
                                            if (!empty($client['name'])) {
                                                echo $client['name'];
                                            }
                                            ?>"required="" />
                                            <label class="">Name*</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noright">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['email'])) {
                                            echo 'filled';
                                        }
                                        ?> ">
                                            <input class="effect-16  form-control" type="email" autocomplete="nope" name="email" id="email" value="<?php
                                            if (!empty($client['email'])) {
                                                echo $client['email'];
                                            }
                                            ?>" readonly="" style="background-color: white;" />
                                            <label class="">Email Address*</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noleft">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['company_name'])) {
                                            echo 'filled';
                                        }
                                        ?>">
                                            <input class="effect-16  form-control" type="text" autocomplete="nope" name="company_name" id="company_name" value="<?php
                                            if (!empty($client['company_name'])) {
                                                echo $client['company_name'];
                                            }
                                            ?>" required="" />
                                            <label class="">Company Name(optional)</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noright">
                                        <div class="boxs searchinput input-effect">
                                            <h6>Country*</h6>
                                            <select class="search-select boxs" name="country" autocomplete="nope" id="country">
                                                <option value="India">India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noleft">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['address'])) {
                                            echo 'filled';
                                        }
                                        ?>">
                                            <input class="effect-16  form-control" type="text" autocomplete="nope" placeholder="" name="address" id="address" value="<?php
                                            if (!empty($client['address'])) {
                                                echo $client['address'];
                                            }
                                            ?>" required=""/>
                                            <label class="">Street Address*</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noright">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['city'])) {
                                            echo 'filled';
                                        }
                                        ?>">
                                            <input class="effect-16  form-control" type="text" autocomplete="nope" name="city" id="city" value="<?php
                                            if (!empty($client['city'])) {
                                                echo $client['city'];
                                            }
                                            ?>" required=""/>
                                            <label class="">Town/City *</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noleft">
                                        <div class="boxs searchinput input-effect">
                                            <h6>State*</h6>
                                            <?php echo form_dropdown(['class' => 'search-select boxs','autocomplete'=>'nope', 'name' => 'state', 'id' => 'state'], ['UP' => 'UP', 'MP' => 'MP', 'Delhi' => 'Delhi', 'Rajasthan' => 'Rajasthan'], isset($client['state']) ? $client['state'] : ''); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noright">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['pincode'])) {
                                            echo 'filled';
                                        }
                                        ?> required=""">
                                            <input class="effect-16  form-control" type="text" autocomplete="nope" name="pincode" id="pincode" value="<?php
                                            if (!empty($client['pincode'])) {
                                                echo $client['pincode'];
                                            }
                                            ?>" />
                                            <label class="">Postcode/ZIP*</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 noleft">
                                        <div class="boxs input-effect <?php
                                        if (!empty($client['mobile'])) {
                                            echo 'filled';
                                        }
                                        ?>">
                                            <input class="effect-16  form-control" type="hidden" autocomplete="nope" placeholder="" name="mobile" id="mobile" value="<?php
                                            if (!empty($client['mobile'])) {
                                                echo $client['mobile'];
                                            }
                                            ?>" required=""/>
                                            <!--<label class="">Mobile*</label>-->
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="proceedbtnbox boxs">
                                        <button class="proceedbtn">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="product-cancel-modal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cancel Order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="cancel-order-wrapper"></div>
            </div>
        </div>
    </div>
</div>