<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><b>Brand</b> > Size >Fit </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div id="error_msg"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Brand List</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Brand</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($brands)) {
                                $i = 1;
                                foreach ($brands as $brnd) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $brnd['brand_name']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/size/' . $brnd['brand_id']); ?>" data-toggle="tooltip" data-placement="top" title="Add Size"><i class="fa fa-circle"></i></a>
                                            <a href="<?php echo base_url('admin/brand/' . $brnd['brand_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Brand"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/deleteBrand/' . $brnd['brand_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Brand"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Add Brand</label>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <form method="post" id="add-faq" action="<?php if(!empty($brand)){echo base_url('admin/doEditBrand/'.$brand['brand_id']);}else{ echo base_url('admin/doAddBrand');}  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                    <label for="brand_name">Name</label>
                                    <input type="text" class="form-control" name="brand_name" value="<?php if(!empty($brand['brand_name'])){echo $brand['brand_name'];} ?>" id="brand_name"/>   
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-9">
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

