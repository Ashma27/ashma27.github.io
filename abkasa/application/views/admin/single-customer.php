<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customer</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Customer Full Detail</label>
                            <a href="<?php echo base_url('admin/customer'); ?>" class="btn btn-outline btn-primary float-right">Back</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Name</label></div>
                        <div class="col-md-3"><?php echo $customer['name']; ?></div>
                        <div class="col-md-1"><label>Email</label></div>
                        <div class="col-md-3"><?php echo $customer['email']; ?></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Mobile</label></div>
                        <div class="col-md-3"><?php echo $customer['mobile']; ?></div>
                        <div class="col-md-1"><label>Country</label></div>
                        <div class="col-md-3"><?php echo $customer['country']; ?></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>State</label></div>
                        <div class="col-md-3"><?php echo $customer['state']; ?></div>
                        <div class="col-md-1"><label>City</label></div>
                        <div class="col-md-3"><?php echo $customer['city']; ?></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Address</label></div>
                        <div class="col-md-3"><?php echo $customer['address']; ?></div>
                        <div class="col-md-1"><label>Pin code</label></div>
                        <div class="col-md-3"><?php echo $customer['pincode']; ?></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Referral Code</label></div>
                        <div class="col-md-3"><?php echo $customer['referral_code']; ?></div>
                        <div class="col-md-1"><label>Points</label></div>
                        <div class="col-md-3"><?php echo $customer['points']; ?></div>
                    </div>
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

