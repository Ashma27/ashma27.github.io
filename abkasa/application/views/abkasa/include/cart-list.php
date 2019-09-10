<div class="cartsidemiddle boxs" style="overflow-y: auto; max-height: 400px">
    <?php
    if (!empty($this->cart->contents())) {
        foreach ($this->cart->contents() as $cart) {
            ?>
            <form method="post" id="cart-form" action="<?php echo base_url('cart/updateCart'); ?>">
                <div class="Crtadditems boxs">
                    <div class="left">
                        <ul class="leftul">
                            <li><a href="<?php echo base_url('abkasa/product/' . str_replace(' ', '-', $cart['name'])); ?>"><img src="<?php echo base_url('uploads/product/'.$cart['image']); ?>" alt="image"></a></li>
                            <li><a href="<?php echo base_url('abkasa/product/' . str_replace(' ', '-', $cart['name'])); ?>"><?php echo $cart['name']; ?></a></li>
                            <li><a href="<?php echo base_url('abkasa/product/' . str_replace(' ', '-', $cart['name'])); ?>"><?php echo str_replace('_', ' ', $cart['size']); ?></a></li>
                        </ul>
                    </div>
                    <div class="right">
                        <ul class="rightul">
                            <li>
                                <div class="incdec">
                                    <div class="buttons">
                                        <button class="value-button cart-qty-minus" type="button" value="-">-</button>
                                        <input type="number" class="qty" data-rowid="<?php echo $cart['rowid']; ?>" data-id="<?php echo $cart['id']; ?>" value="<?php echo $cart['qty']; ?>" class="packnumber">
                                        <button class="value-button cart-qty-plus" type="button" value="+">+</button>
                                    </div>
                                </div>
                            </li>
                            <li><a href="<?php echo base_url('abkasa/product/' . str_replace(' ', '-', $cart['name'])); ?>">&#x20B9; <?php echo $this->cart->format_number($cart['subtotal']); ?></a></li>
                            <li><a href="<?php echo base_url('cart/deleteCart/' . $cart['rowid']); ?>" data-id="<?php echo $cart['id']; ?>" class="remove-cart"><i class="fa fa-times-circle"></i></a></li>
                        </ul>
                    </div>
                </div>
            </form>
            <?php
        }
    } else {
        ?>
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <img src="<?php echo base_url('public/image/cart.png'); ?>" height="200px" width="200px"/>
                <br/><br/>
                <h3>Empty Cart</h3>
            </div>
        </div>
        <?php
    }
    ?>

</div>
<div class="cartsidebottom boxs">
    <div class="left">
        <div class="leftinner boxs">
            <h6>Total</h6>
            <h5>&#x20B9;<?php echo $this->cart->format_number($this->cart->total()); ?></h5>
        </div>
    </div>
    <div class="right">
        <ul class="checkoutsidenav">
            <li>
                <?php
                if (!empty($client)) {
                    ?>
                    <a class="sr-button cartsidebtn" href="<?php echo base_url('cart/checkout'); ?>">
                        <span class="text">
                            <span>Checkout</span>
                            <span>Checkout</span>
                        </span>
                        <span class="arrowbtnN">
                            <img src="<?php echo base_url('public/image/arrowwhite.png'); ?>" alt="arrow" class="img-responsive">
                        </span>
                    </a>
                <?php } else {
                    ?>
                    <a href="javascript:void(0)" class="sr-button cartsidebtn" id="closeCart" data-toggle="modal" data-target="#myModal">
                        <span class="text">
                            <span>Checkout</span>
                            <span>Checkout</span>
                        </span>
                        <span class="arrowbtnN">
                            <img src="<?php echo base_url('public/image/arrowwhite.png'); ?>" alt="arrow" class="img-responsive">
                        </span>
                    </a> 
                <?php }
                ?>
            </li>
        </ul>
    </div>
</div>