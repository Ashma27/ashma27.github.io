<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Stock</h1>
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
                        <div class="col-md-2"><label class="assess-label">Stock</label></div>
                        <div class="col-md-1 col-md-offset-9">
                            <a href="<?php echo base_url('admin/product'); ?>" class="btn btn-outline btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-stock" action="<?php echo base_url('admin/doEditStock/' . $stock['stock_id'].'/'.$product_id); ?>">
                        <h3>Size: SMALL</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1 col-md-offset-1"><?php echo form_label('Slim', 'small_slim'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'small_slim', 'id' => 'small_slim','type'=>'number' ,'class' => 'form-control'], $stock['small_slim']); ?></div>
                                <div class="col-md-1"><?php echo form_label('Regular', 'small_regular'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'small_regular', 'id' => 'small_regular','type'=>'number', 'class' => 'form-control'], $stock['small_regular']); ?></div>
                            </div>
                        </div>
                        <hr>
                        <h3>Size: MEDIUM</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1 col-md-offset-1"><?php echo form_label('Slim', 'medium_slim'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'medium_slim', 'id' => 'medium_slim','type'=>'number', 'class' => 'form-control'], $stock['medium_slim']); ?></div>
                                <div class="col-md-1"><?php echo form_label('Regular', 'medium_regular'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'medium_regular', 'id' => 'medium_regular','type'=>'number', 'class' => 'form-control'], $stock['medium_regular']); ?></div>
                            </div>
                        </div>
                        <hr>
                        <h3>Size: LARGE</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1 col-md-offset-1"><?php echo form_label('Slim', 'large_slim'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'large_slim', 'id' => 'large_slim','type'=>'number', 'class' => 'form-control'], $stock['large_slim']); ?></div>
                                <div class="col-md-1"><?php echo form_label('Regular', 'large_regular'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'large_regular', 'id' => 'large_regular','type'=>'number', 'class' => 'form-control'], $stock['large_regular']); ?></div>
                            </div>
                        </div>
                        <hr>
                        <h3>Size: Extra Large(XL)</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1 col-md-offset-1"><?php echo form_label('Slim', 'xl_slim'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'xl_slim', 'id' => 'xl_slim','type'=>'number', 'class' => 'form-control'], $stock['xl_slim']); ?></div>
                                <div class="col-md-1"><?php echo form_label('Regular', 'xl_regular'); ?></div>
                                <div class="col-md-3"><?php echo form_input(['name' => 'xl_regular', 'id' => 'xl_regular','type'=>'number', 'class' => 'form-control'], $stock['xl_regular']); ?></div>
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