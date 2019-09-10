<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div id="error_msg"></div>
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel panel-body">
                    <form role="form" method="post" id="change-password" action="<?php echo base_url('admin/doChangePassword'); ?>">
                        <div class="row">
                            <div class="col-md-9 col-md-offset-1">
                                <div class="form-group">
                                    <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'placeholder' => 'Password', 'class' => 'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input(['name' => 'newPassword', 'id' => 'newPassword', 'type' => 'password', 'placeholder' => 'New Password', 'class' => 'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input(['name' => 'confirmPassword', 'id' => 'confirmPassword', 'type' => 'password', 'placeholder' => 'Confirm Password', 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-7">
                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


