<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product images</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="loader"></div>
    <div class="row">
        <div class="col-lg-12">
            <div id="error_msg"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2"><label class="assess-label">Add Images</label></div>
                        <div class="col-md-1 col-md-offset-9">
                            <a href="<?php echo base_url('admin/product'); ?>" class="btn btn-outline btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group">
                        <form method="post" id="add-list-image" action="<?php echo base_url('admin/doUploadListImage/' . $product_id); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1"><label>Add List Image</label></div>
                                <div class="col-md-3">
                                    <input type="file" class="form-control" name="list_image[]" required multiple="multiple" id="list_image" />
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                if (!empty($images)) {
                                    foreach ($images as $image) {
                                        ?>
                                        <div class="col-md-3" style="text-align: center;">
                                            <img src="<?php echo base_url('uploads/product/' . $image['image_url']); ?>" height="250px" width="200px"/><br/>
                                            <a href="<?php echo base_url('admin/product/deleteImage/' . $image['id'] . '/' . $product_id); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Image"><i class="fa fa-trash"></i></a>
                                        </div>
                                        <?php }
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
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