<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Brand > Size ><b>Fit</b> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8">
            <div id="error_msg"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="abkasa-label">Update Fit</label>
                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <a href="<?php echo base_url('admin/size/'.$brand_id); ?>" class="btn btn-outline btn-primary float-right">Back</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <form method="post" id="add-fit" action="<?php echo base_url('admin/doUpdateFit/'.$size_id);  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <input type="checkbox" name="slim" id="slim" <?php if(!empty($fit['slim'])){ echo 'checked'; } ?> value="1"/>
                                    <label for="slim">Slim</label>
                                </div>
                                <div class="col-md-4">
                                    <?php echo form_input(['name'=>'slim_value','id'=>'slim_value','placeholder'=>'Enter Slim Value','class'=>'form-control'],isset($fit['slim_value'])?$fit['slim_value']:''); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <input type="checkbox"  name="regular" id="regular" <?php if(!empty($fit['regular'])){ echo 'checked'; } ?> value="1"/>
                                    <label for="regular">Regular</label>
                                </div>
                                <div class="col-md-4">
                                    <?php echo form_input(['name'=>'regular_value','id'=>'regular_value','placeholder'=>'Enter Regular Value','class'=>'form-control'],isset($fit['regular_value'])?$fit['regular_value']:''); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

