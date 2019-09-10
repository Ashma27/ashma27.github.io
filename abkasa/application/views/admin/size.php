<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Brand > <b>Size</b> >Fit </h1>
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
                        <div class="col-md-3">
                            <label class="abkasa-label"><?php echo $brand['brand_name']." Size List"; ?></label>
                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <a href="<?php echo base_url('admin/brand'); ?>" class="btn btn-outline btn-primary float-right">Back</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($sizes)) {
                                $i = 1;
                                foreach ($sizes as $siz) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $siz['size_number']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/fit/' . $siz['size_id'].'/'.$brand['brand_id']); ?>" data-toggle="tooltip" data-placement="top" title="Add Fit"><i class="fa fa-circle"></i></a>
                                            <a href="<?php echo base_url('admin/deleteSize/' . $siz['size_id'].'/'.$brand['brand_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Size"><i class="fa fa-trash-o"></i></a>
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
                            <label class="abkasa-label">Add Size</label>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <form method="post" id="add-faq" action="<?php echo base_url('admin/doAddSize/'.$brand['brand_id']);  ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                    <label for="size_number">Size Number</label>
                                    <input type="number" class="form-control" name="size_number" id="size_number"/>   
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

