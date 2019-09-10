<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div id="error_msg"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Add Coupon</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-coupon" action="<?php if(!empty($coupon)){echo base_url('admin/doEditCoupon/'.$coupon['coupon_id']);}else{ echo base_url('admin/doAddCoupon');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="coupon_code">Coupon Code</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code" value="<?php if(!empty($coupon['coupon_code'])){echo $coupon['coupon_code'];} ?>"/>   
                                </div>
                                <div class="col-md-2">
                                    <label for="coupon_count">Coupon Count</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="coupon_count" id="coupon_count" value="<?php if(!empty($coupon['coupon_count'])){echo $coupon['coupon_count'];} ?>"/>   
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="discount">Discount</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="discount" id="discount" value="<?php if(!empty($coupon['discount'])){echo $coupon['discount'];} ?>"/>   
                                </div>
                                <div class="col-md-2">
                                    <label for="discount_type">Discount Type</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_dropdown(['name'=>'discount_type','id'=>'discount_type','class'=>'form-control'],[''=>'--Select Discount Type--','percent'=>'percentage(%)','val'=>'value'],isset($coupon['discount_type'])?$coupon['discount_type']:'') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

