<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Return/Replace Order</h1>
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
                            <label class="abkasa-label">Return/Replace Order</label>
                            <a href="<?php echo base_url('admin/order'); ?>" class="btn btn-outline btn-primary float-right">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                                <table width="100%" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Product Name</th>
                                            <th>Size</th>
                                            <th>Replacing Size</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($ordered_products as $product) {
                                            ?>
                                            <tr>
                                                <td><?php echo $product['quantity']; ?></td>
                                                <td><?php echo $product['title']; ?></td>
                                                <td><?php echo str_replace('_', ' ', $product['size_type']); ?></td>
                                                <?php
                                                if ($product['status'] == 'Replacing' || $product['status'] == 'Replaced') {
                                                    ?>
                                                    <td><?php echo str_replace('_', ' ', $product['replacing_size']); ?></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><?php echo 'N/A'; ?></td>
                                                    <?php
                                                }
                                                ?>
                                                <td>
                                                    <?php
                                                    if ($product['status'] == 'Returning') {
                                                        ?>
                                                        <form method="post" action="<?php echo base_url('admin/order/changeOrderProductStatus/' . $product['ordered_product_id']); ?>" class="change-order-status">
                                                            <?php echo form_dropdown(['name' => 'status', 'id' => 'status', 'class' => 'form-control'], ['Returning' => 'Returning', 'Returned' => 'Returned'], $product['status']); ?>
                                                        </form>
                                                        <?php
                                                    }else if ($product['status'] == 'Replacing') {
                                                        ?>
                                                        <form method="post" action="<?php echo base_url('admin/order/changeReplacingProductStatus/' . $product['ordered_product_id']); ?>" class="change-order-status">
                                                            <?php echo form_dropdown(['name' => 'status', 'id' => 'status', 'class' => 'form-control'], ['Replacing' => 'Replacing', 'Replaced' => 'Replaced'], $product['status']); ?>
                                                        </form>
                                                        <?php
                                                    } else {
                                                        echo $product['status'];
                                                    }
                                                    ?>


                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

