<section class="productDetail boxs productlist inView" data-type="black">
    <div class="container">
        <div class="proDetailinner boxs">
            <div class="ShopN boxs">
                <h3><?php echo $category['category_name']; ?> <span class="menshirtlink"><a href='<?php echo base_url('shop'); ?>'>Shop</a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo $category['category_name']; ?></span></h3>
            </div> 
            <div class="filterN boxs">
                <ul class="Shirttypes">
                   <?php
                    $i=1;
                    foreach ($sub_categories as $sub_category) {
                        ?>
                        <li><a href="javascript:void(0)" class="shtylink <?php if($i==1){ echo 'active'; } ?>" data-id="<?php echo $sub_category['sub_category_id']; ?>"><?php echo $sub_category['sub_category_name']; ?></a></li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
                <ul class="filterRight">
                    <li><a href="javascript:void(0)" class="filterBtnN">Filter</a></li>
                </ul>
                <div class="onclickfilterbox boxs">
                    <div class="container">
                        <div class="filterselectinner boxs">
                            <div class="left">
                                <ul>
                                    <li>Price</li>
                                    <li class="tagbox"><input type="checkbox" name="low_to_high" data-value="asc" class="checkdiv" id="low_to_high"><label for="low_to_high">Low to High<span><img src="<?php echo base_url('public/image/close.svg'); ?>" alt="close"></span></label></li>
                                    <li class="tagbox"><input type="checkbox" name="high_to_low" data-value="desc"  class="checkdiv" id="high_to_low"><label for="high_to_low">High to Low<span><img src="<?php echo base_url('public/image/close.svg'); ?>" alt="close"></span></label></li>
                                </ul>
                            </div>
                            <div class="left">
                                <ul>
                                    <li>Sleeves</li>
                                    <li class="tagbox"><input type="checkbox" name="long_sleeve" data-value="long_sleeve" class="checkdiv" id="long_sleeve"><label for="long_sleeve">Long Sleves<span><img src="<?php echo base_url('public/image/close.svg'); ?>" alt="close"></span></label></li>
                                    <li class="tagbox"><input type="checkbox" name="short_sleeve" data-value="short_sleeve" class="checkdiv" id="short_sleeve"><label for="short_sleeve">Short Sleves<span><img src="<?php echo base_url('public/image/close.svg'); ?>" alt="close"></span></label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="filter-wrapper" data-url="<?php echo base_url('abkasa/filter-product-list/'.str_replace(' ', '-', $category['category_name'])); ?>"></div>
        </div>
    </div>
</section>