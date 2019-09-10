
<section class="banner boxs bannermgt videobanner" style="background:url(<?php // echo base_url('public/image/mainbanner.jpg'); ?>)no-repeat center center; background-size:cover;">
    <div class="forbannerlayer boxs">
        <div class="logo_banner boxs">
            <!--<span class="middle_logo">  <img src="<?php echo base_url('public/image/logo.png'); ?>" alt="logo" class="img-responsive"></span>-->
<!--            <h2>abkasa</h2>-->
            <!--<div class="banner_shop_nowbtn boxs">-->
            <!--    <button class="sr-button srbtn">-->
            <!--        <a href="<?php echo base_url('shop') ?>"><span class="text">-->
            <!--            <span>Shop Now</span>-->
            <!--            <span>Shop Now</span>-->
            <!--        </span>-->
            <!--        <span class="arrowbtnN">-->
            <!--            <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow" class="img-responsive">-->
            <!--        </span></a>-->
            <!--    </button>-->
            <!--</div>-->
        </div>
    </div>
    <!--            <video autoplay="true" loop="true" muted="true" poster="" src="video.mp4" type="video/mp4"></video>-->
    <!--<div id="ytplayer"></div>-->
    <div class="video-wrapper">
                <!--<iframe  src="https://www.youtube.com/embed/qk0Yzi0pY9o?autoplay=1&controls=0&loop=1&playlist=qk0Yzi0pY9o&amp;showinfo=0" allow="autoplay" frameborder="0" allowfullscreen></iframe>-->
              <iframe src="https://player.vimeo.com/video/316088497?autoplay=1&loop=1&title=0&byline=0&portrait=0&muted=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              <!--<iframe src="https://player.vimeo.com/video/316088497?background=1&amp;autoplay=1&amp;loop=1&amp;byline=0&amp;title=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>-->
    <!--<iframe src="https://player.vimeo.com/video/316088497?background=1&amp;autoplay=1&amp;loop=1&amp;byline=0&amp;title=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>-->
    </div>
 
</section>
   <div class="boxs forHeight inView" data-type="white" ></div>
<section class="Aboutouter boxs " >
    <div class="Aboutproducts boxs inView" data-type="black">
        <div class="container">
            <div class="About_inner boxs">
                <div class="col-md-8">
                    <div class="About_Left boxs">
                        <h2>About Abkasa</h2>
                        <?php echo $about['description']; ?>    
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="About_Right boxs">
                        <img src="<?php echo base_url('public/image/livenewsp.jpg'); ?>" alt="image" class="img-responsive">
                        <!--                            <img src="img/12.jpg" alt="image" class="img-responsive">-->
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</section>
<div class="Sliderouter boxs inView" data-type="white">
     <div class="shopslide_btn"><div class="banner_shop_nowbtn boxs">
                <button class="sr-button srbtn">
                    <a href="<?php echo base_url('shop') ?>"><span class="text">
                        <span>Shop Now</span>
                        <span>Shop Now</span>
                    </span>
                    <span class="arrowbtnN">
                        <img src="http://designoweb.work/abkasa/public/image/arrowimg.png" alt="arrow" class="img-responsive">
                    </span></a>
                </button>
            </div>
    </div>
        <div class="productslick boxs">
        
        <?php if(!empty($carousels)){
            $i=1;
            foreach($carousels as $carousel){
        ?>
        
            <div class="sliderinnerbox boxs slider<?php echo $i; ?>">
            <div class="Shopbtn boxs">
                 <?php if (!empty($carousel['name'])) {
                            ?>
                            <h2><?php echo $carousel['name']; ?></h2>
                            <?php }
                        ?>
            </div>
            <img src="<?php echo base_url('uploads/carousel/'.$carousel['image_url']) ?>" alt="specialdesign" class="img-responsive" />

        </div>
 
        <?php
        $i++;
            }
        } ?>
        
    </div>
</div>

<section class="Shop_home boxs">
    <div class="Shop_Box boxs">
        <div class="shop_headings boxs">
            <h2>Shop</h2>
        </div>
      
         <div class="shop_data boxs">

                <div class="shopLeft boxs">
                    <?php
                    $categories=$this->admin_model->getCategory();
                    if (!empty($categories)) {
                        $i=1;
                        foreach ($categories as $category) {
                            ?>
                            <div class="col-md-4 col-sm-6 <?php if($i==2){echo 'shopmg1';}else if($i==3){echo 'shopmg2';}else if($i==4){echo 'shopmg3';}?>">
                                <a href="<?php echo base_url('abkasa/category/'.str_replace(' ', '-', $category['category_name'])) ?>" class="shop_img_txt boxs">
                                    <img src="<?php echo base_url('uploads/category/'.$category['category_image']) ?>" alt="shop" class="img-responsive width1">
                                    <div class="shop_text shop_text_left">
                                        <h3><span><?php echo $category['category_name']; ?></span></h3>
                                        <!--<h6>Get Classy </h6>-->
                                        <button class="shopexplore exppadd">Explore <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                    </div>
                                </a>
                            </div>
                            <?php
                            if($i==4){ $i=0;}
                            $i++;
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="special boxs">
    <div class="shop_headings boxs">
        </div>
    <div class="specialde_slide boxs">
        <?php if(!empty($designer_products)){
            foreach($designer_products as $product){
        ?>
        <div class="special_item boxs">
            <img src="<?php echo base_url('uploads/carousel/'.$product['image_url']); ?>" alt="specialdesign" class="img-responsive">
            <div class="special_offer_cont boxs animated  fadeIn delay-2s">
                <p><?php echo $product['text']; ?></p>
            </div>
        </div>
        <?php 
            }
        } ?>
        
    </div>
</div>

<section class="Products hometop_sale boxs inView" data-type="black">
    <div class="container">
        <h2>Top Selling</h2>
        <?php foreach ($products as $product) {
            $count = $product['small_slim'] + $product['small_regular'] + $product['medium_slim'] + $product['medium_regular'] + $product['large_slim'] + $product['large_regular'] + $product['xl_slim'] + $product['xl_regular'];
            ?>
            <div class="col-sm-4 col-md-4 pro_w">
                <a class="Probox boxs" href="<?php echo base_url('product/' . str_replace(' ', '-', $product['title'])); ?>">
                    <div class="Prontop boxs">
                        <img src="<?php echo base_url('uploads/product/' . $product['main_image']); ?>" alt="shirt" class="img-responsive normalimg">
                        <img src="<?php echo base_url('uploads/product/' . $product['hover_image']); ?>" alt="shirt" class="img-responsive hoverimg">
                        <button class="sr-button srbtn">
                            <span class="text">
                                <span>View Product</span>
                                <span>View Product</span>
                            </span>
                            <span class="arrowbtnN">
                                <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow" class="img-responsive">
                            </span>
                        </button>
                        <?php if ($count < 1) {
        ?>
                            <div class="outofstock boxs">
                                <h2>Out of Stock</h2>
                            </div>
    <?php }
    ?>
                    </div>
                    <div class="Pronbottom boxs">
                        <h5><?php echo $product['title']; ?></h5>
                        <p>&#8377;<?php echo $product['price']; ?></p>
                    </div>
                </a>
            </div>
        <?php }
        ?>
    </div>
</section>
<div class="special special_pro boxs">
    <div class="boxs">
        <div class="special_item boxs">
            <img src="<?php echo base_url('uploads/carousel/'.$special_product['image_url']); ?>" alt="specialdesign" class="img-responsive">
            <div class="special_pro_btn boxs">
                <a href="<?php echo $special_product['product_url']; ?>" class="special_pro_btn">View Product <span class="arrowbtnN">
                                <img src="http://designoweb.work/abkasa/public/image/arrowimg.png" alt="arrow" class="img-responsive">
                            </span></a>
            </div>
        </div>
    </div>
</div>
<section class="instagramfeeds boxs inView" data-type="black">
    <div class="container">
        <div class="instainnner boxs">
            <div class="instatext boxs">
                <div class="col-sm-6 col-sm-offset-5">
                    <h2>Abkasa Men on Instagram</h2>
                    <p><a target="_blank" href="https://www.instagram.com/abkasaofficial/"><span>Follow us <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow"></span></a></p>
                </div>
            </div>
            <div  class="boxs instafeeds"></div>

        </div>
    </div>
</section>

<!--<section class="banner boxs bannermgt videobanner">
    <div class="forbannerlayer boxs"></div>
                <video autoplay="true" loop="true" muted="true" poster="" src="video.mp4" type="video/mp4"></video>
    <div id="ytplayer"></div>
</section>
<div class="boxs forHeight inView" data-type="white" ></div>
<section class="Aboutouter boxs " >
    <div class="Aboutproducts boxs inView" data-type="black">
        <div class="container">
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>  
        </div>
    </div>
</section>
<div class="Sliderouter boxs inView" data-type="white">
    <div class="productslick boxs">
        <div class="sliderinnerbox boxs slider1">
            <div class="Shopbtn boxs">
                <a href="#" class="btn">shop <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow" class="img-responsive"></a>
            </div>
        </div>
        <div class="sliderinnerbox boxs slider2">
            <div class="Shopbtn boxs">
                <a href="#" class="btn">shop <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow" class="img-responsive"></a>
            </div>
        </div>
        <div class="sliderinnerbox boxs slider3">
            <div class="Shopbtn boxs">
                <a href="#" class="btn">shop <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow" class="img-responsive"></a>
            </div>
        </div>
    </div>
</div>
<section class="Products boxs inView" data-type="black">
    <div class="container">
        <h2>Top Selling</h2>
<?php foreach ($products as $product) {
    ?>
                                <div class="col-sm-4 col-xs-6 pro_w">
                                    <a class="Probox boxs" href="<?php echo base_url('abkasa/product/' . str_replace(' ', '-', $product['title'])); ?>">
                                        <div class="Prontop boxs">
                                            <img src="<?php echo base_url('uploads/product/' . $product['main_image']); ?>" alt="shirt" class="img-responsive normalimg">
                                            <img src="<?php echo base_url('uploads/product/' . $product['hover_image']); ?>" alt="shirt" class="img-responsive hoverimg">
                                            <button class="sr-button srbtn">
                                                <span class="text">
                                                    <span>View Product</span>
                                                    <span>View Product</span>
                                                </span>
                                                <span class="arrowbtnN">
                                                    <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow" class="img-responsive">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="Pronbottom boxs">
                                            <h5><?php echo $product['title']; ?></h5>
                                            <p>&#8377;<?php echo $product['price']; ?></p>
                                        </div>
                                    </a>
                                </div>
<?php }
?>
    </div>
</section>
<section class="instagramfeeds boxs inView" data-type="black">
    <div class="container">
        <div class="instainnner boxs">
            <div class="instatext boxs">
                <div class="col-sm-6 col-sm-offset-5">
                    <h2>Abkasa Men on Instagram</h2>
                    <p><a href="#"><span>Follow us <img src="<?php echo base_url('public/image/arrowimg.png'); ?>" alt="arrow"></span></a></p>
                </div>
            </div>
            <div id="instafeed" class="boxs"></div>

        </div>
    </div>
</section>-->
