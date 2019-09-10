<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category</h1>
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
                            <label class="abkasa-label">Add Category</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-category" enctype="multipart/form-data" action="<?php if(!empty($category)){echo base_url('admin/doEditCategory/'.$category['category_id']);}else{ echo base_url('admin/doAddCategory');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="category_name">Category Name</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="category_name" value="<?php if(!empty($category['category_name'])){echo $category['category_name'];} ?>" id="category_name"/>   
                                </div>
                                <div class="col-md-2">
                                    <label for="category_image">Category Image</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="file" class="form-control" name="category_image" id="category_image"/>
                                    </br>
                                    <?php if(!empty($category['category_image'])){
                                    ?>
                                    <img src="<?php echo base_url('uploads/category/'.$category['category_image']); ?>" height="100px" width="100px" class="img-responsive"/>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="category_description">Description</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_textarea(['name'=>'category_description','id'=>'category_description','class'=>'form-control','rows'=>'5'],isset($category['category_description'])?$category['category_description']:'') ?>
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
                    <h4 id="loading" style="display: none;">LOADING....</h4>
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

