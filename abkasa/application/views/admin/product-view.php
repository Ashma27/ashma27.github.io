<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo form_dropdown(['name' => 'cat_id', 'id' => 'cat_id', 'data-url' => base_url('admin/product/get-product-wrapper'), 'class' => 'form-control'], $category) ?>
                        </div>
                        <div class="col-md-4">
                            <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                <option value="">--Select Sub Category--</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="product-wrapper" data-url="<?php echo base_url('admin/product/get-product-wrapper'); ?>"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

