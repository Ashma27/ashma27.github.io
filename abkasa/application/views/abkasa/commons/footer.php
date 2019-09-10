<div class="footer boxs">
    <div class="footerbottom boxs">
        <div class="container">
            <div class="footerbottominner boxs">
                <div class="col-sm-6 noleft borderright">
                    <div class="left boxs">
                        <div id="error_msg"></div>
                        <h4>Sign up to our newsletter and <span>receive 10% off your first order!</span></h4>
                        <div class="newsletter boxs">
                            <form method="post" id="add-newsletter" action="<?php echo base_url('abkasa/addNewsletter'); ?>">
                                <div class="col-sm-8 nopadding newswidth1">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                                </div>
                                <div class="col-sm-4 nopadding newswidth2">
                                    <button class="btn signup"  >subscribe <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 noleft rightW1">
                    <div class="right boxs right1">
                        <ul>
                            <li>
                                <?php if (!empty($this->session->userdata('user_email'))) {
                            ?>
                                <a href="<?php echo base_url('account'); ?>" class="underline-from-left">Account</a>
                            <?php    
                            }else{
                            ?>
                              <a href="javascript:void(0)" class="underline-from-left" id="closeCart" data-toggle="modal" data-target="#myModal">Account</a>   
                            <?php
                            } ?>  
                            </li>
                            <li><a href="<?php echo base_url('contact-us') ?>" class="underline-from-left">Contact</a></li>
                            <li><a href="<?php echo base_url('about-us') ?>" class="underline-from-left">About</a></li>
                            <li><a href="<?php echo base_url('shop') ?>" class="underline-from-left">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 noleft rightW2">
                    <div class="right boxs">
                        <ul>
                            <li><a href="<?php echo base_url('shipping-policy') ?>" class="underline-from-left">Shipping Policy</a></li>
                            <li><a href="<?php echo base_url('sizing') ?>" class="underline-from-left">Find my size</a></li>
                            <li><a href="#" class="underline-from-left">Stockists</a></li>
                            <li><a href="<?php echo base_url('frequently-asked-question') ?>" class="underline-from-left">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footertop boxs">
        <div class="container">
            <div class="col-sm-8 noleft">
                <div class="left boxs">
                    <ul>
                        <li><a href="<?php echo base_url('return-policy'); ?>" class="underline-from-left">Return policy</a></li>
                        <li><a href="<?php echo base_url('privacy-policy'); ?>" class="underline-from-left">privacy policy</a></li>
                        <li><a href="<?php echo base_url('terms-and-condition'); ?>" class="underline-from-left">terms & condition</a></li>
                        <li><a href="<?php echo base_url('fit-guarantee'); ?>" class="underline-from-left">Fit Guarantee</a></li>
                        <!--<li><a href="<?php echo base_url('special-design'); ?>" class="underline-from-left">Special</a></li>-->
                         <li><a href="<?php echo base_url('special-product'); ?>" class="underline-from-left">Special Product</a></li>
                           
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 noright">
                <div class="right boxs">
                    <ul>
                         <li><a href="https://www.facebook.com/abkasaofficial/" target="_blank"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                        <li><a href="https://www.instagram.com/abkasaofficial/" target="_blank"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright boxs">
        <div class="container">
            <div class="col-sm-6 noleft">
                <p><span>© 2018 Abkasa. All rights reserved.</span></p>
            </div>
            <div class="col-sm-6 noright">
                <p><span class="flotright">Made, with love, by <a href="#">Designoweb Technologies</span></a></p>
            </div>
        </div>
    </div>
</div>

<div class="cartsidenav">
    <div class="cartsideinner boxs">
        <div class="cartsidetop boxs">

            <a class="cartclose" href="javascript:void(0)">
                <img src="<?php echo base_url('public/image/close.svg'); ?>" alt="close">
            </a>

            <h4>Your Cart</h4>
        </div>
        <div id="cart-wrapper" data-url="<?php echo base_url('cart/get-cart-list') ?>"></div>
        <?php  ?>
    </div>
</div>

<div class="modal fade loginmodal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content boxs">
            <a class="modalclose" href="javascript:void(0)" data-dismiss="modal">
                <img src="<?php echo base_url('public/image/close.svg'); ?>" alt="close">
            </a>
            <div class="modal-body boxs">
                <p><span>Abkasa</span></p>
                <div class="Login_btn boxs">
                    <a href="<?php echo $this->facebook->login_url(); ?>" class="fblogin"><i class="fa fa-facebook-f" aria-hidden="true"></i><span>Login with facebook</span></a>
                    <a href="<?php echo $this->google->get_login_url(); ?>" class="gogglelogin"><i class="fa fa-google" aria-hidden="true"></i><span>Login with Google</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('public/js/slick.js'); ?>"></script>
<script src="<?php echo base_url('public/js/wow.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.scrollie.min.js'); ?>"></script>
<!--<script src="<?php //echo base_url('public/js/instafeed.js');  ?>"></script>-->
<script src="<?php echo base_url('public/js/materialselect.js'); ?>"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.swipebox/1.4.4/js/jquery.swipebox.min.js'></script>
<script src="<?php echo base_url('public/js/custom.js'); ?>"></script>
<script src="<?php echo base_url('public/js/front/script.js'); ?>"></script>
</body>
</html>