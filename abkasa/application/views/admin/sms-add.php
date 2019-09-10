<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">SMS</h1>
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
                            <label class="abkasa-label">Add SMS</label>
                            <a href="<?php echo base_url('admin/sms'); ?>" class="btn btn-outline btn-primary float-right">View SMS</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-faq" action="<?php if(!empty($sms)){echo base_url('admin/doEditSms/'.$sms['id']);}else{ echo base_url('admin/doAddSms');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="name" id="name" value="<?php if(!empty($sms['name'])){echo $sms['name'];} ?>"/>   
                                </div>
                                <div class="col-md-2">
                                    <label for="message">Message</label>
                                </div>
                                <div class="col-md-3"> 
                                    <?php echo form_textarea(['name'=>'message','id'=>'message','class'=>'form-control','rows'=>'5'], isset($sms['message'])?$sms['message']:'') ?>  
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

