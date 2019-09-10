<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order Detail</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div id="error_msg"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"><label class="abkasa-label">Select Order Type</label></div>
                                    <div class="col-md-3">
                                        <select name="order_type" id="order-type" data-url="<?php echo base_url('admin/getOrderWrapper'); ?>" class="form-control">
                                            <option value="">All Orders</option>
                                            <option value="cancel">Canceled</option>
                                            <option value="return">Return</option>
                                            <option value="replace">Replace</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="order-wrapper" data-url="<?php echo base_url('admin/getOrderWrapper'); ?>"></div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

