<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Designer Product</h1>
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
                            <label class="abkasa-label">Designer Product List</label>
                            <a href="<?php echo base_url('admin/addDesignerProduct'); ?>" class="btn btn-outline btn-primary float-right">Add Designer Product</a>
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
                                <th>Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($products)) {
                                $i = 1;
                                foreach ($products as $product) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo base_url('uploads/carousel/'.$product['image_url']); ?>" height="250px" width="300px" class="img-responsive"/></td>
                                        <td><?php echo $product['text']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/addDesignerProduct/' . $product['product_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Designer Product"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/deleteDesignerProduct/' . $product['product_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Designer Product"><i class="fa fa-trash-o"></i></a>
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

