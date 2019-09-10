<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Top Selling Product</h1>
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
                            <label class="abkasa-label">Top Selling Product List</label>
                        </div>
                    </div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <td>Image</td>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($top_sellings)) {
                                $i = 1;
                                foreach ($top_sellings as $top) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo base_url('uploads/product/'.$top['main_image']) ?>" height="150px" width="100px" alt="Image Not Available"/></td>
                                        <td><?php echo $top['title']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/sizing/deleteTopSelling/' . $top['id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remove Top Selling"><i class="fa fa-trash-o"></i></a>
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
                            <label class="abkasa-label">Add Top Selling</label>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <form method="post" id="add-faq" action="<?php echo base_url('admin/sizing/doAddTopSelling'); ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                    <label for="product_id">Product Name</label>
                                    <select name="product_id" id="product_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                                        <option data-subtext="">--Select the Product--</option>
                                        <?php foreach($products as $product){
                                        ?>
                                        <option value="<?php echo $product['product_id'] ?>"><?php echo $product['title'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
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

