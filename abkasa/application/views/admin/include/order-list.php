<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <label class="abkasa-label">Order List</label>
            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Client Name</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($orders)) {
                    $i = 1;
                    foreach ($orders as $order) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $order['name']; ?></td>
                            <td><?php echo '&#x20b9; ' . $order['total'] ?></td>
                            <td>
                                <?php
                                if (!empty($order['order_status'])) {
                                    echo $order['order_status'];
                                } else {
                                    ?>
                                    <form method="post" action="<?php echo base_url('admin/changeOrderStatus/' . $order['order_id']); ?>" class="change-order-status">
                                        <?php echo form_dropdown(['name' => 'status', 'id' => 'status', 'class' => 'form-control'], ['Pending' => 'Pending', 'Processing' => 'Processing', 'Out_for_delivery' => 'Out For Delivery', 'Delivered' => 'Delivered'], $order['status']); ?>
                                    </form>
                                    <?php }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('admin/order-detail/' . $order['order_id']); ?>" data-toggle="tooltip" data-placement="top" title="View Order"><i class="fa fa-eye"></i></a>  
                                <?php 
                                if (!empty($order['order_status']) and $order['order_status']!='Cancel') {
                                ?>
                                <a href="<?php echo base_url('admin/change-ordered-status/' . $order['order_id']); ?>" data-toggle="tooltip" data-placement="top" title="change status">Change Status</i></a>                                            
                                <?php
                                }
                                if($order['order_status']!='Cancel'){
                                ?>
                                <a href="<?php echo base_url('admin/cancelOrder/' . $order['order_id']); ?>" class="cancel" data-toggle="tooltip" data-placement="top" title="Cancel Order"><i class="fa fa-times-circle"></i></a>  
                                <?php
                                }
                                ?>
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