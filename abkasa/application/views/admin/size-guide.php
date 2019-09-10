<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Size Guide</h1>
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
                            <label class="abkasa-label">Size Guide</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" id="size_guide" action="<?php echo base_url('admin/sizing/sizeGuideDoUpload'); ?>" enctype="multipart/form-data">
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="size_image">Size Image</label>
                                </div>
                                <div class="col-md-3">   
                                    <input type="file" class="form-control" name="size_image" id="size_image" value=""/>   
                                </div>
                                
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <label for="size_image"></label>
                                </div>
                                <div class="col-md-3">   
                                
                                <?php
                                if (!empty($sizeGuide))
                                {
                                foreach($sizeGuide as $values)
                                {
                                ?>
                                
                                    <img src="<?php echo base_url(); ?>uploads/size_guide/<?php echo $values['image_url']; ?>" alt="p1" class="img-responsive"  height="150px" width="100px" alt="Image Not Available">
                                   <!-- <img src="<?php //echo base_url('uploads/product/'.$top['main_image']) ?>" height="150px" width="100px" /> -->
                                <?php 
                                }
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger"> Size Guide Not Available Here!!</div>';
                                }
                                ?>
                                </div>
                                <!--
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
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

