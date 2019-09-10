<section class="boxs bannermgt">
    <div class="container">
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