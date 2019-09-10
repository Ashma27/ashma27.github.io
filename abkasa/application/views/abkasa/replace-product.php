
<section class="productDetail boxs productlist inView" data-type="black">
    <div class="container">
        <a class="btn btn-sm btn-danger" href="<?php echo base_url('account'); ?>">Back</a>
        <div class="Ordertabd Ordertabd1 boxs">
            <div class="orderstat boxs">
                <div class="panel panel-default">
                    <div class="panel-body padzero">
                        <div class="row">
                            <div class="up_heading boxs">
                                <ul class="up_head_inner boxs">
                                    <li><span>Replace/Return Product</span></li>

                                </ul>
                            </div>
                        </div>
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
                                                        <div class="col-md-2"><p><?php  echo str_replace('_', ' ', $product['size_type']); ?></p></div>
                                                        <div class="col-md-2"><p>
                                                                <?php if (empty($product['status'])) {
                                                                    ?>
                                                                    <a href="<?php echo base_url('account/doReturnProduct/' . $product['ordered_product_id'] . '/' . $product['order_id']); ?>" class="returnbtn return">Return</a>
                                                                    <a href="<?php echo base_url('account/replaceProduct/' . $product['product_id'] . '/' . $product['ordered_product_id'] . '/' . $product['order_id']); ?>" class="replacebtn replace-model">Replace</a>
                                                                    <?php
                                                                } else {
                                                                    if ($product['status'] == 'Replacing') {
                                                                        echo $product['status'] . ' with ' . $product['replacing_size'];
                                                                    } else {
                                                                        echo $product['status'];
                                                                    }
                                                                }
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
                    </div>
                </div>
            </div>
        </div>
        <br/>
<!--        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Replace/Return Product</h3><br/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            foreach ($ordered_product as $product) {
                                ?>
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-1"><img src="<?php echo base_url('uploads/product/' . $product['main_image']) ?>" height="100px" width="75px"/></div>
                                    <div class="col-md-2"><?php echo $product['title']; ?></div>
                                    <div class="col-md-1"><?php echo $product['quantity']; ?></div>
                                    <div class="col-md-2"><?php echo $product['size_type']; ?></div>
                                    <?php if (empty($product['status'])) {
                                        ?>
                                        <a href="<?php echo base_url('account/doReturnProduct/' . $product['ordered_product_id'] . '/' . $product['order_id']); ?>" class="btn btn-success return">Return</a>
                                        <a href="<?php echo base_url('account/replaceProduct/' . $product['product_id'] . '/' . $product['ordered_product_id'] . '/' . $product['order_id']); ?>" class="btn btn-primary replace-model">Replace</a>
                                        <?php
                                    } else {
                                        if ($product['status'] == 'Replacing') {
                                            echo $product['status'] . ' with ' . $product['replacing_size'];
                                        } else {
                                            echo $product['status'];
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</section>
<div id="product-replace-modal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select size that you want to replace with</h4>
            </div>
            <div class="modal-body">
                <div id="modal-wrapper"></div>
            </div>

        </div>
    </div>
</div>
