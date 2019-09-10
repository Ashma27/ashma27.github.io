<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url('public/image/logoicon.png'); ?>" type="image/ico" sizes="16x16">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/hamburgers.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/slick-theme.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/slick.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/animate.css'); ?>" rel="stylesheet">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.swipebox/1.4.4/css/swipebox.min.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/media.css'); ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header  <?php if(!empty($header)){ echo ''; }else{ echo 'commenheader'; } ?> fixheaderblack <?php if(!empty($account)){if($account=='1'){echo 'header2';}} ?>">
            <div class="headertop boxs">
                <div class="container">
                    <div class="headerInner boxs">
                        <div class="lefthamburwidth">
                            <button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <div class="leftwidth">
                            <div class="boxs logoimg">
                                <a href="<?php echo base_url(); ?>">
                                   <span class="headerlogo"> <img src="<?php echo base_url('public/image/logo.png'); ?>" alt="logo" class="logo_text img-responsive"></span>
                                   
                                   <span class="logotext">ABKASA</span>
                                </a>
                            </div>
                        </div>
                        <div class="rightwidth">
                            <div class="boxs">
                                <ul>
                                    <li class="">
                                        <?php
                                        if (!empty($client)) {
                                            ?>
                                            <a href="<?php echo base_url('abkasa/logout'); ?>">Logout</a>
                                        <?php } else {
                                            ?>
                                            <a href="javascript:void(0)" class="links" data-toggle="modal" data-target="#myModal">Login</a>    
                                        <?php } ?>
                                    </li>
                                    <li><a href="javascript:void(0)" class="cartopenlink" id="cart-count" data-url="<?php echo base_url('cart/get-cart-count') ?>"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidenav" id="mySidenav">
                <div class="sidenavinner boxs">
                    <div class="left ">
                        <div class="leftinner boxs">

                            <?php
                            $categories=$this->admin_model->getCategory();
                            foreach ($categories as $category) {
                                ?>
                                <a href="<?php echo base_url('category/'.str_replace(' ', '-', $category['category_name'])) ?>"><div class="sidenavproductbox boxs">
                                        <div class="sidenavboxinner boxs">
                                            <div class="left1">
                                                <img src="<?php echo base_url('uploads/category/'.$category['category_image']); ?>" alt="img" class="img-responsive">
                                            </div>
                                            <div class="right1">
                                                <div class="rightinner boxs">
                                                    <h6><?php echo $category['category_name']; ?></h6>
                                                    <p><?php echo $category['category_description']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="right " >
                        <div class="rightinner boxs">
                            <div class="sidenavright boxs">
                                <div class="rightwidth">
                            <div class="boxs">
                                <ul>
                                    <li class="">
                                        <?php
                                        if (!empty($client)) {
                                            ?>
                                            <a href="<?php echo base_url('abkasa/logout'); ?>">Logout</a>
                                        <?php } else {
                                            ?>
                                            <a href="javascript:void(0)" class="links" data-toggle="modal" data-target="#myModal">Login</a>    
                                        <?php } ?>
                                    </li>
                                    <li><a href="javascript:void(0)" class="cartopenlink" id="cart-count" data-url="<?php echo base_url('cart/get-cart-count') ?>"></a></li>
                                </ul>
                            </div>
                        </div>
                                <div class="top boxs ">
                                    <ul>
                                        <li><a href="<?php echo base_url('abkasa/shop'); ?>" class="underline-from-left">Shop</a></li>
                                        <li><a href="<?php echo base_url('abkasa/about') ?>" class="underline-from-left">About</a></li>
                                        <li><a href="<?php echo base_url('abkasa/contact-us'); ?>" class="underline-from-left">contact</a></li>
                                    </ul>
                                </div>
                                <div class="bottom boxs ">
                                    <ul>
                                        <li><a href="<?php echo base_url('shipping-policy') ?>" class="underline-from-left">Shipping Policy</a></li>
                                        <li><a href="<?php echo base_url('sizing') ?>" class="underline-from-left">Find my size</a></li>
                                        <li><a href="#" class="underline-from-left">Stocklists</a></li>
                                        <li><a href="<?php echo base_url('frequently-asked-question') ?>" class="underline-from-left">FAQs</a></li>
                                    </ul>
                                </div>
                                <div class="sidenavsocial boxs">
                                    <ul>
                                        <li><a href="https://www.facebook.com/abkasaofficial/" target="_blank"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                        <li><a href="https://www.instagram.com/abkasaofficial/" target="_blank"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>