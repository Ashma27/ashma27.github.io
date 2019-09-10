<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home Consultation</h1>
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
                            <label class="abkasa-label">Home Consultation</label>
                            <a href="<?php echo base_url('admin/home-consultation'); ?>" class="btn btn-outline btn-primary float-right">Back</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Name</label></div>
                        <div class="col-md-3"><?php echo $consultation['name']; ?></div>
                        <div class="col-md-1"><label>Email</label></div>
                        <div class="col-md-3"><?php echo $consultation['email']; ?></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Phone</label></div>
                        <div class="col-md-3"><?php echo $consultation['phone']; ?></div>
                        <div class="col-md-1"><label>Location</label></div>
                        <div class="col-md-3"><?php echo $consultation['location']; ?></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-md-offset-1"><label>Message</label></div>
                        <div class="col-md-3"><?php echo $consultation['message']; ?></div>
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

