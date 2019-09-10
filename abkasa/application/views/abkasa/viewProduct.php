<?php
if (!empty($product['discount_type'])) {
    if ($product['discount_type'] == 'percent') {
        $res = ($product['discount'] / 100) * $product['price'];
        $discounted_price = $product['price'] - $res;
        ?>
        <?php
    } else {
        $discounted_price = $product['price'] - $product['discount'];
        ?>
        <?php
    }
}
?>
<section class="productDetail boxs inView MainProduct_detail" data-type="black">
    <div class="container height100">
        <div class="proDetailinner boxs height100">
            <div class="Proboxinner boxs">
                <div class="productListW">
                    <div class="boxs ProListNew">
                        <h2> <?php echo $product['title'] ?></h2>
                        <input type="hidden" name="id" id="id" value="<?php echo $product['product_id']; ?>"/>
                        <input type="hidden" name="name" id="name" value="<?php echo $product['title']; ?>"/>
                        <?php if (!empty($product['discount_type'])) { ?>
                            <h3 class="PriceO"><strike style="color:#878787;font-size: 25px">&#8377 <?php echo $product['price']; ?></strike></h3>

                            <?php if ($product['discount_type'] == 'percent') {
                                ?>
                                <h3 class="PriceO" style="color:#E67170"><?php echo $product['discount']; ?>%Off</h3>
                            <?php } else {
                                ?>
                                <h3 class="PriceO" style="color:#E67170"><?php echo $product['discount']; ?>&#8377 Off</h3>
                                <?php
                            }
                            ?>
                            <h5 class="PriceN">&#x20B9; <?php echo $discounted_price; ?></h5>
                            <input type="hidden" name="price" id="price" value="<?php echo $discounted_price; ?>"/>
                            <?php
                        } else {
                            ?>
                            <h5 class="PriceN">&#x20B9; <?php echo $product['price']; ?></h5>
                            <input type="hidden" name="price" id="price" value="<?php echo $product['price']; ?>"/>
                            <?php
                        }
                        ?>
                        <div class="shareN boxs">
                            <ul>
                                <li>
                                    share
                                </li>
                                <li>
                                    <?php $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . base_url('product/' . str_replace(' ', '-', $product['title'])); ?> 
                                    <a target="_blank" href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="javascript:void(0)"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="Thumbslider">
                    <div id="myCarousel" class="carousel slide boxs" data-interval="false">
                        <div class="carousel-inner boxs" role="listbox">
                            <div class="item active">
                                <img src="<?php echo base_url('uploads/product/' . $product['main_image']); ?>" alt="p1">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url('uploads/product/' . $product['hover_image']); ?>" alt="p1">
                            </div>
                            <?php
                            if (!empty($product_images)) {
                                foreach ($product_images as $image) {
                                    ?>
                                    <div class="item">
                                        <img src="<?php echo base_url('uploads/product/' . $image['image_url']); ?>" alt="p1">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="thumbCarousel">
                            <div class="thumbsliderwidth">
                                <div data-target="#myCarousel" data-slide-to="0" class="thumb active">    
                                    <img src="<?php echo base_url('uploads/product/' . $product['main_image']); ?>" alt="p1" style="width: 50px">
                                </div>
                                <div data-target="#myCarousel" data-slide-to="1" class="thumb">
                                    <img src="<?php echo base_url('uploads/product/' . $product['hover_image']); ?>" alt="p1" style="width: 50px">
                                </div>
                                <?php
                                if (!empty($product_images)) {
                                    $i = 2;
                                    foreach ($product_images as $image) {
                                        ?>
                                        <div data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="thumb">
                                            <img src="<?php echo base_url('uploads/product/' . $image['image_url']); ?>" alt="p1" style="width: 50px">
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="colsizeNboxs boxs">
                <div class="left">
                    <?php
                    //print_r($stock);
                    $num = $stock['small_slim'] + $stock['small_regular'] + $stock['medium_slim'] + $stock['medium_regular'] + $stock['large_slim'] + $stock['large_regular'] + $stock['xl_slim'] + $stock['xl_regular'];
                    ?>
                    <input type="hidden" name="small_slim" id="small_slim" value="<?php echo $stock['small_slim'] ?>" />
                    <input type="hidden" name="small_regular" id="small_regular" value="<?php echo $stock['small_regular'] ?>" />
                    <input type="hidden" name="medium_slim" id="medium_slim" value="<?php echo $stock['medium_slim'] ?>" />
                    <input type="hidden" name="medium_regular" id="medium_regular" value="<?php echo $stock['medium_regular'] ?>" />
                    <input type="hidden" name="large_slim" id="large_slim" value="<?php echo $stock['large_slim'] ?>" />
                    <input type="hidden" name="large_regular" id="large_regular" value="<?php echo $stock['large_regular'] ?>" />
                    <input type="hidden" name="xl_slim" id="xl_slim" value="<?php echo $stock['xl_slim'] ?>" />
                    <input type="hidden" name="xl_regular" id="xl_regular" value="<?php echo $stock['xl_regular'] ?>" />
                    <div class="leftinner boxs">
                        <ul class="pickColsizeN">
                            <li>
                                <?php if ($num > 0) {
                                    ?>
                                    <span class="colpickN">
                                        <div class="form-group">
                                            <div data-toggle="buttons">
                                                <?php if (!empty($stock['small_slim'] or ! empty($stock['small_regular']))) {
                                                    ?>
                                                    <label class="btn btn-default btn-circle btn-lg active"><input type="radio" class="viewsize" name="viewsize" value="small" ><i class="viewsize">S</i></label>
                                                    <?php
                                                }
                                                if (!empty($stock['medium_slim'] or ! empty($stock['medium_regular']))) {
                                                    ?>
                                                    <label class="btn btn-default btn-circle btn-lg"><input type="radio" class="viewsize" name="viewsize" value="medium" ><i class="viewsize"></i>M</label>
                                                    <?php
                                                }
                                                if (!empty($stock['large_slim'] or ! empty($stock['large_regular']))) {
                                                    ?>
                                                    <label class="btn btn-default btn-circle btn-lg"><input type="radio" class="viewsize" name="viewsize" value="large" ><i class="viewsize"></i>L</label>
                                                    <?php
                                                }
                                                if (!empty($stock['xl_slim'] or ! empty($stock['xl_regular']))) {
                                                    ?>
                                                    <label class="btn btn-default btn-circle btn-lg"><input type="radio" class="viewsize" name="viewsize" value="xl" ><i class="viewsize"></i>XL</label>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="colpickN">
                                        <div class="funkyradio">
                                            <div class="funkyradio-primary" id="slim_size">
                                                <input type="radio" name="size" id="radio1" value="slim" class="size"/>
                                                <label for="radio1">Slim</label>
                                            </div>
                                            <div class="funkyradio-primary" id="regular_size">
                                                <input type="radio" name="size" id="radio2" value="regular" class="size"/>
                                                <label for="radio2">Regular</label>
                                            </div>
                                        </div>
                                    </span>
                                    <?php }
                                ?>

                                <div id="error-message"></div>
                                <a href="#mySizeView" class="porsize sizelink" data-toggle="modal" data-target="#mySizeView"><span class="colN">Size</span></a>
                                <a href="<?php echo base_url('abkasa/sizing') ?>" class="porsize sizelink"><span class="colN">find my size</span></a>
                            </li>
                        </ul> 
                    </div>
                </div>
                <div class="right">
                    <?php if ($num > 0) {
                                ?>
                    <div class="rightinner boxs">
                        <ul class="AddCartN">
                            <li>
                                <div class="incdec">
                                    <div class="buttons">
                                        <span class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</span>
                                        <input type="number" id="number" name="number" value="1" class="packnumber">
                                        <span class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <input type="hidden" name="url" id="url" value="<?php echo base_url('cart/addToCart'); ?>"/>
                                
                                <div class="AddcartBtn boxs">
                                    <a href="#" class="sr-button" id="add-to-cart">
                                        <span class="text">
                                            <span>Add to cart</span>
                                            <span>Add to cart</span>
                                        </span>
                                        <span class="cartarrowbtn">
                                            <img src="<?php echo base_url('public/image/arrowwhite.png'); ?>" alt="arrow" class="img-responsive">
                                        </span>
                                    </a>
                                </div>
                                
                                
                            </li>
                        </ul>
                    </div>
                    <?php    
                                }?>
                </div>
            </div>

        </div>

    </div>
</section>
<section class="DescriptionN boxs">
    <div class="container">
        <div class="descinner boxs">
            <h6>Description</h6>
<?php echo $product['description']; ?>    
        </div>
    </div>
</section>
<section class="boxs ProOuter">
    <div class="container">
        <div class="slider boxs">
            <div class="boxs">
                <h2>Related Products</h2>
                <div class="Productboxinner relatepro boxs">
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


            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="mySizeView">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center">Product Size</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
               
            <div class="modal-body">
            <?php foreach($sizeGuide as $values)
            { 
            ?>
                <img src="<?php echo base_url(); ?>uploads/size_guide/<?php echo $values['image_url']; ?>" alt="p1" class="img-responsive">
            <?php    
            }
            ?>
            </div>


        </div>
    </div>
</div>

