<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Designer Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="loader"></div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div id="error_msg"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Add Designer Product</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-category" enctype="multipart/form-data" action="<?php if(!empty($product)){echo base_url('admin/doEditDesignerProduct/'.$product['product_id']);}else{ echo base_url('admin/doAddDesignerProduct');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="image_url">Image</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="file" <?php if(empty($product['product_id'])){ echo 'required'; } ?> class="form-control" name="image_url" id="image_url"/>
                                    </br>
                                    <?php if(!empty($product['image_url'])){
                                    ?>
                                    <img src="<?php echo base_url('uploads/carousel/'.$product['image_url']); ?>" height="250px" width="300px" class="img-responsive"/>
                                    <?php } ?>
                                </div>
                                <div class="col-md-2">
                                    <label for="text">Image Text</label>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control" name="text" rows="5" id="text"><?php if(!empty($product['text'])){echo $product['text'];} ?></textarea>     
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
                    <h4 id="loading" style="display: none;"><img src="<?php echo base_url('public/image/load.gif'); ?>" height="175px" width="200px"/></h4>
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

