<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Product List</label>
                            <a href="<?php echo base_url('admin/add-product'); ?>" class="btn btn-outline btn-primary float-right">Add Product</a>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="product-list">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
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
                                        <td><img src="<?php echo base_url('uploads/product/'.$product['main_image']) ?>" height="150px" width="100px" alt="Image Not Available"/></td>
                                        <td><?php echo $product['title'] ?></td>
                                        <td>₹<?php echo $product['price'] ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/add-product-stock/' . $product['product_id']); ?>" data-toggle="tooltip" data-placement="top" title="Add Stock"><i class="fa fa-plus-square"></i></a>
                                            <a href="<?php echo base_url('admin/add-product-image/' . $product['product_id']); ?>" data-toggle="tooltip" data-placement="top" title="Add Images"><i class="fa fa-image"></i></a>
                                            <a href="<?php echo base_url('admin/add-product/' . $product['product_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/delete-product/' . $product['product_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Product"><i class="fa fa-trash-o"></i></a>
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