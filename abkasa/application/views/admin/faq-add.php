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
                            <label class="abkasa-label">Add FAQ</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-faq" action="<?php if(!empty($faq)){echo base_url('admin/do-edit-faq/'.$faq['faq_id']);}else{ echo base_url('admin/do-add-faq');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="title">Title</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="title" id="title" value="<?php if(!empty($faq['title'])){echo $faq['title'];} ?>"/>   
                                </div>
                                <div class="col-md-2">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-3"> 
                                    <?php echo form_textarea(['name'=>'description','id'=>'description','class'=>'form-control','rows'=>'5'], isset($faq['description'])?$faq['description']:'') ?>
                                    <!--<input type="text" class="form-control" name="description" id="description" value="<?php if(!empty($faq['description'])){echo $faq['description'];} ?>"/>-->   
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

