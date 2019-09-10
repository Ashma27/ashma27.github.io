<section class="productDetail boxs productlist inView" data-type="black">
    <div class="container">
        <div class="proDetailinner boxs">
            <div class="Checkoutpage boxs">
                <div class="ShopN boxs">
                    <h3>Checkout</h3>
                </div>
                <div class="formcheckout boxs">
                    <form method="post" action="<?php echo base_url('cart/add_order'); ?>" autocomplete="off" id="add-order">
                    <div class="col-ms-12 delivery_address inline">
                        <!-- <div class="col-ms-6 form-check-inline">
                          <label class="form-check-label" for="delry_address">
                            <input type="radio" class="form-check-input" id="address1" name="final_address" value="address1" checked>Primary
                            <input type="radio" class="form-check-input" id="address2" name="final_address" value="address2">Secondry
                          </label>
                        </div> -->

                        <!-- <div class="col-ms-6 form-check-inline">
                          <label class="form-check-label" for="delry_address">
                            <input type="radio" class="form-check-input" id="address2" name="final_address" value="address2">Secondry
                          </label>
                        </div> -->
                    </div>
                
                        <div class="checkoutformtop boxs">
                            <div class="col-sm-6 noleft">
                                <div class="boxs input-effect <?php
                                if (!empty($client['name'])) {
                                    echo 'filled';
                                }
                                ?>">
                                    <input class="effect-16  form-control" autocomplete="nope" type="text" name="name" id="name" value="<?php
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
                                    <input class="effect-16  form-control" autocomplete="nope" type="email" name="email" id="email" value="<?php
                                    if (!empty($client['email'])) {
                                        echo $client['email'];
                                    }
                                    ?>" required="" readonly="" style="background-color: white; "/>
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
                                    <input class="effect-16  form-control" autocomplete="nope" type="text" name="company_name" id="company_name" value="<?php
                                    if (!empty($client['company_name'])) {
                                        echo $client['company_name'];
                                    }
                                    ?>" />
                                    <label class="">Company Name(optional)</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 noright">
                                <div class="boxs searchinput input-effect">
                                    <h6>Country*</h6>
                                    <select class="search-select boxs" autocomplete="nope" name="country" id="country">
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
                                    <input class="effect-16  form-control" autocomplete="nope" type="text" placeholder="" name="address" id="address" value="<?php
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
                                    <input class="effect-16  form-control" autocomplete="nope" type="text" name="city" id="city" value="<?php
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
                                ?> required">
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
                                    <input class="effect-16  form-control" type="text" autocomplete="nope" placeholder="" name="mobile" id="mobile" value="<?php
                                    if (!empty($client['mobile'])) {
                                        echo $client['mobile'];
                                    }
                                    ?>" required=""/>
                                    <label class="">Mobile*</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                        </div>

                       <!--  <div class="checkoutformmid boxs">
                            <div class="ShopN boxs">
                                <a href="" class="btn btn-primary col-md-offset-10" data-toggle="modal" data-target="#myModal">Add New Address</a>
                            </div>
                        </div>
 -->
                        <div class="checkoutformmid boxs">
                            <div class="ShopN boxs">
                                <h3>Your order</h3>
                            </div>
                            <div class="crtItemsselected boxs">
                                <?php
                                foreach ($this->cart->contents() as $cart) {
                                    $id = explode('_', $cart['id']);
                                    ?>
                                    <input type="hidden" name="product_id[]" value="<?php echo end($id); ?>"/>
                                    <input type="hidden" name="qty[]" value="<?php echo $cart['qty']; ?>"/>
                                    <input type="hidden" name="size_type[]" value="<?php echo $cart['size']; ?>"/>
                                    <input type="hidden" name="price[]" value="<?php echo $cart['price']; ?>"/>
                                    <div class="Crtadditems boxs">
                                        <div class="left">
                                            <ul class="leftul">
                                                <li><a><img src="<?php echo base_url('uploads/product/'.$cart['image']); ?>" alt="image"></a></li>
                                                <li><a><?php echo $cart['name']; ?></a></li>
                                                <li><a class="cartitemcr"><i class="fa fa-times" aria-hidden="true"></i><span class="cartnum"><?php echo $cart['qty']; ?></span></a></li>
                                            </ul>

                                        </div>
                                        <div class="right">
                                            <ul class="rightul">
                                                <li><a>₹<?php echo $this->cart->format_number($cart['subtotal']); ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <div class="Crtadditems boxs">
                                    <div class="left">
                                        <ul class="leftul">
                                            <li><a>Subtotal</a></li>
                                        </ul>

                                    </div>
                                    <div class="right">
                                        <ul class="rightul">
                                            <input type="hidden" name="sub_total" id="sub-total" value="<?php echo $this->cart->total() ?>"/>
                                            <li><a> ₹ <?php echo $this->cart->format_number($this->cart->total()); ?></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="Crtadditems boxs" id="discount">
                                    <div class="left">
                                        <ul class="leftul">
                                            <li><a id="">Discount <span id="discount-info"></span></a></li>
                                        </ul>
                                        <input type="hidden" name="referral_code" id="referral_code" value=""/>
                                        <input type="hidden" name="coupon_id" value="" id="coupon_id"/>
                                        <input type="hidden" name="discount_val" value="" id="discount-val" />
                                    </div>
                                    <div class="right">
                                        <ul class="rightul">
                                            <li><a><span id="discount-value">-₹ 0.00</span></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="Crtadditems boxs Totalam">
                                    <div class="left">
                                        <ul class="leftul">
                                            <li><a>Total</a></li>
                                        </ul>

                                    </div>
                                    <div class="right">
                                        <ul class="rightul">
                                            <input type="hidden" name="total" id="total" value="<?php echo $this->cart->total(); ?>"/>
                                            <li><a><span id="tot"> ₹ <?php echo $this->cart->format_number($this->cart->total()); ?></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="coupen boxs">
                                <div class="hidden" id="remove-coupon">
                                    <a href="javascript:void(0)" id="remove-coupon" class="remove coupenlink">Remove coupon or referral?</a>
                                </div>
                                <div class="" id="show-coupon">
                                    <a href="javascript:void(0)" data-target="#myModal2" id="coupon-modal" class="coupenlink">Have a coupon or referral?</a>
                                </div>
                            </div>
                        </div>
                        <div class="checkoutformbottom boxs">
                            <div class="ShopN boxs">
                                <h3>Payment</h3>
                            </div>
                            <div class="paymentoptiondiv boxs">
                                <ul class="paymenttabul">
                                    <li>
                                        <input type="radio" name="payment_mode" checked id="cod" value="COD" >
                                        <label for="cod">Cash on delivery</label>
                                        <div class="payementtabs cod">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="payment_mode" id="pp" value="Online">
                                        <label for="pp">Razor Pay<a href="javascript:void(0)">What is Razor pay?</a></label>
                                        <div class="payementtabs pp">
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="payment_mode" id="pr" value="Points">
                                        <label for="pr">Points Redeem<a href="javascript:void(0)"></a></label>
                                        <div class="payementtabs pr">
                                        </div>
                                    </li>
                                </ul>

                                <div class="PrivacyPolicy boxs">
                                    <p>Your personal data will be used to process your order, support your experience <br/>throughout this website, and for other purposes described in our <a target="_blank" href="<?php echo base_url('privacy-policy'); ?>">privacy policy.</a></p>
                                </div>
                                <div class="tick boxs">
                                    <input type="checkbox" id="terms" name="terms"><label for="terms"><span></span>I have read and agree to the website <a target="_blank" href="<?php echo base_url('terms-and-condition'); ?>">terms and conditions </a>*.</label>
                                </div>

                                <div class="proceedbtnbox boxs">
                                    <button class="proceedbtn">
                                        Confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Referral or Coupon</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('cart/getDiscount'); ?>" method="post" id="coupon">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="code">Enter Coupon or Referral code</label>
                            <input type="text" name="code" id="code" class="effect-16 form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- 
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Add New Address</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="checkoutformtop boxs">
              <div class="col-sm-6 noleft">
                <div class="boxs input-effect <?php
                if (!empty($client['name'])) {
                    echo 'filled';
                }
                ?>">
                <input class="effect-16  form-control" autocomplete="nope" type="text" name="name" id="name" value="<?php
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
                                    <input class="effect-16  form-control" autocomplete="nope" type="email" name="email" id="email" value="<?php
                                    if (!empty($client['email'])) {
                                        echo $client['email'];
                                    }
                                    ?>" required="" readonly="" style="background-color: white; "/>
                                    <label class="">Email Address*</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div> -->