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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Category List</label>
                            <a href="<?php echo base_url('admin/addCategory'); ?>" class="btn btn-outline btn-primary float-right">Add Category</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($categories)) {
                                $i = 1;
                                foreach ($categories as $category) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo base_url('uploads/category/'.$category['category_image']); ?>" height="100px" width="100px" class="img-responsive"/></td>
                                        <td><?php echo $category['category_name']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/addCategory/' . $category['category_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Category"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/deleteCategory/' . $category['category_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fa fa-trash-o"></i></a>
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
        <!-- /.col-lg-12 -->
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

