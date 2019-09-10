<div class="Proboxinner boxs">
    <div class="Productboxinner boxs">
        <?php
        foreach ($sub_categories as $sub_category) {
            ?>
            <div class="ShirtsN shirt<?php echo $sub_category['sub_category_id'] ?> boxs">
                <?php
                foreach ($products as $product) {
                    if ($product['sub_category_id'] == $sub_category['sub_category_id']) {
                        $count = $product['small_slim'] + $product['small_regular'] + $product['medium_slim'] + $product['medium_regular'] + $product['large_slim'] + $product['large_regular'] + $product['xl_slim'] + $product['xl_regular'];
                        ?>
                        <div class="col-sm-4 col-md-4 col-xs-6 pro_w">
                            <a class="Probox boxs" href="<?php echo base_url('product/' . str_replace(' ', '-', $product['title'])); ?>">
                                <div class="Prontop prontopheihght boxs">
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
                        <?php
                    }
                    ?>
                <?php }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>