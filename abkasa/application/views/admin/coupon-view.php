<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Coupon</h1>
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
                            <label class="abkasa-label">Coupon List</label>
                            <a href="<?php echo base_url('admin/add-coupon'); ?>" class="btn btn-outline btn-primary float-right">Add Coupon</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Coupon Code</th>
                                <th>Discount</th>
                                <th>Discount Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($coupons)) {
                                $i = 1;
                                foreach ($coupons as $coupon) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $coupon['coupon_code']; ?></td>
                                        <td><?php echo $coupon['discount'] ?></td>
                                        <td><?php echo $coupon['discount_type'] ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/add-coupon/' . $coupon['coupon_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Coupon"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/delete-coupon/' . $coupon['coupon_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Coupon"><i class="fa fa-trash-o"></i></a>
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

