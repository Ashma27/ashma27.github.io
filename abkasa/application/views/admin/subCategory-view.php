<!-- Shubham -->
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Sub Category List</label>
                            <a href="<?php echo base_url('admin/addsubCategory'); ?>" class="btn btn-outline btn-primary float-right">Add Sub Category</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($subcategories)) {
                                $i = 1;
                                foreach ($subcategories as $category) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $category['category_name']; ?></td>
                                         <td><?php echo $category['sub_category_name']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/addsubCategory/' . $category['sub_category_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit SubCategory"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/deletesubCategory/' . $category['sub_category_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete subCategory"><i class="fa fa-trash-o"></i></a>
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

