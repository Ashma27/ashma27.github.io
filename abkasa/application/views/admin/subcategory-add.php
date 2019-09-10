<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sub Category</h1>
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
                            <label class="abkasa-label">Add Sub Category</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php //print_r($sub_category)?>
                    <form method="post" id="add-subcategory" action="<?php if(!empty($sub_category)){echo base_url('admin/doEditsubCategory/'.$sub_category['sub_category_id']);}else{ echo base_url('admin/doAddsubCategory');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset">
                                    <label for="category_id">Category </label>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="category_id" id="category_id">
                                    <option value="">--Select--</option>
                                    <?php foreach($categories as $category){
                                    ?>
                                    <option value="<?php echo $category['category_id'];?>" <?php if(!empty($sub_category)){if($category['category_id']==$sub_category['category_id']){echo 'selected';}} ?> ><?php echo $category['category_name'];?></option>
                                     <?php  
                                    } ?>
                                                                     
                                </select>
                                    
                                    </div>
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="sub_category_name">Sub Category Name</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="text" class="form-control" name="sub_category_name" value="<?php if(!empty($sub_category['sub_category_name'])){echo $sub_category['sub_category_name'];} ?>" id="sub_category_name"/>   
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

