<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Carousel</h1>
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
                            <label class="abkasa-label">Add Carousel</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-category" enctype="multipart/form-data" action="<?php if(!empty($carousel)){echo base_url('admin/doEditCarousel/'.$carousel['carousel_id']);}else{ echo base_url('admin/doAddCarousel');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="category_name">Name</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($carousel['name'])){echo $carousel['name'];} ?>" id="name"/>   
                                </div>
                                <div class="col-md-2">
                                    <label for="image_url">Carousel Image</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="file" class="form-control" name="image_url" id="image_url"/>
                                    </br>
                                    <?php if(!empty($carousel['image_url'])){
                                    ?>
                                    <img src="<?php echo base_url('uploads/carousel/'.$carousel['image_url']); ?>" height="100px" width="100px" class="img-responsive"/>
                                    <?php } ?>
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

