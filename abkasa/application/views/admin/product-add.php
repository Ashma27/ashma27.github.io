<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product</h1>
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
                            <label class="abkasa-label">Add Product</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="add-category" action="<?php if(!empty($product)){echo base_url('admin/doEditProduct/'.$product['product_id']);}else{ echo base_url('admin/doAddProduct');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="category_id">Category Name</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_dropdown(['name'=>'category_id','id'=>'category_id','data-url'=> base_url('admin/getSubCategory'),'class'=>'form-control'],$category,isset($product['category_id'])?$product['category_id']:'') ?>
                                </div>
                                 <div class="col-md-2">
                                    <label for="sub_category_id">Sub Category Name</label>
                                </div>
                                <div class="col-md-3">   
                                    <select class="form-control" name="sub_category_id[]" id="sub_category_id" multiple>
                                    <?php 
                                    if(!empty($sub_categories)){
                                        $i=0;
                                    ?>
                                        <option value="">--Select Sub Category--</option>
                                        <?php
                                        foreach($sub_categories as $sub_category){
                                    ?>
                                        <option value="<?php echo $sub_category['sub_category_id']; ?>" <?php if(!empty($sub_category_id)){ foreach($sub_category_id as $sub){ if($sub['sub_category_id']== $sub_category['sub_category_id']){ echo 'selected'; } } } ?>><?php echo $sub_category['sub_category_name']; ?></option>
                                    <?php
                                    $i++;
                                        }
                                    }
                                    ?>    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="title">Title</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_input(['name'=>'title','id'=>'title','class'=>'form-control'],isset($product['title'])?$product['title']:'') ?>
                                </div>
                                 <div class="col-md-2">
                                    <label for="price">Price (In Rupee)</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_input(['name'=>'price','id'=>'price','class'=>'form-control'],isset($product['price'])?$product['price']:'') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="discount_type">Discount Type</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_dropdown(['name'=>'discount_type','id'=>'discount_type','class'=>'form-control'],[''=>'--Select Discount Type--','percent'=>'percentage(%)','val'=>'value'],isset($product['discount_type'])?$product['discount_type']:'') ?>
                                </div>
                                <div class="col-md-2">
                                    <label for="discount">Discount</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_input(['name'=>'discount','id'=>'discount','class'=>'form-control'],isset($product['discount'])?$product['discount']:'') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="main_image">Add Main Image</label>
                                </div>
                                <div class="col-md-3">    
                                    <input type="file" class="form-control" name="main_image" id="main_image" />

                                </div>
                                <div class="col-md-2">
                                    <label for="hover_image">Add Hover Image</label>
                                </div>
                                <div class="col-md-3">    
                                    <input type="file" class="form-control" name="hover_image" id="hover_image"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <?php if (!empty($product['main_image'])) {
                                        ?>
                                        <img src="<?php echo base_url('uploads/product/' . $product['main_image']); ?>" height="250px" width="200px"/>
                                    <?php }
                                    ?>
                                </div>
                                <div class="col-md-3 col-md-offset-3">    
                                    <?php
                                    if (!empty($product['hover_image'])) {
                                        ?>
                                        <img src="<?php echo base_url('uploads/product/' . $product['hover_image']); ?>" height="250px" width="200px"/>
                                        <?php
                                    }
                                    ?>
                                    <span class="error">
                                        * Image Format Allowed: JPEG,JPG,PNG<br>
                                        * Max Image Size: 5 MB
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="product_type">Product type</label>
                                </div>
                                <div class="col-md-3">   
                                    <?php echo form_dropdown(['name'=>'product_type','id'=>'product_type','class'=>'form-control'],[''=>'--Select Product Type--','1'=>'Full Sleeve','0'=>'Half Sleeve'],isset($product['product_type'])?$product['product_type']:'') ?>
                                    
                                </div>
                                <div class="col-md-2">
                                    <label for="discount">HSN Code</label>
                                </div>
                                <div class="col-md-3">    
                                   <?php echo form_input(['name'=>'hsn_code','id'=>'hsn_code','class'=>'form-control'],isset($product['hsn_code'])?$product['hsn_code']:'') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-8">   
                                    <?php echo form_textarea(['name'=>'descriptions','id'=>'descriptions','class'=>'form-control editor'],isset($product['description'])?$product['description']:'') ?>
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

