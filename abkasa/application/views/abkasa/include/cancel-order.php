<?php
foreach ($ordered_product as $product) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body panelbody2">
                    <div class="row">
                        <div class="p_flex_main boxs">
                            <div class="p_flex">
                                <div class="col-md-3"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="125px" width="95px"/></div>
                                <div class="col-md-2"><p><?php echo $product['title']; ?></p></div>
                                <div class="col-md-2"><p><?php echo $product['quantity']; ?></p></div>
                                <div class="col-md-2"><p><?php echo $product['size_type']; ?></p></div>
                                <div class="col-md-2"><p>
                                        <?php
                                        if ($product['status'] == 'Canceled') {
                                            echo $product['status'];
                                        } else {
                                            ?>
                                            <a href="<?php echo base_url('account/doCancelOrderedProduct/' . $product['ordered_product_id']); ?>" class="returnbtn cncl-order">Cancel</a>
                                            <?php }
                                        ?>
                                    </p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
