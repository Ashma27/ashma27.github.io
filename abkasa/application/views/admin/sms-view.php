<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">SMS</h1>
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
                            <label class="abkasa-label">SMS List</label>
                            <a href="<?php echo base_url('admin/add-sms'); ?>" class="btn btn-outline btn-primary float-right">Add SMS</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($smss)) {
                                $i = 1;
                                foreach ($smss as $sms) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $sms['name']; ?></td>
                                        <td><?php echo $sms['message']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/add-sms/' . $sms['id']); ?>" data-toggle="tooltip" data-placement="top" title="Add Sms"><i class="fa fa-pencil-square-o"></i></a>
                                            <!--<a href="<?php echo base_url('admin/doDeleteSms/' . $sms['id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete Sms"><i class="fa fa-trash-o"></i></a>-->
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

