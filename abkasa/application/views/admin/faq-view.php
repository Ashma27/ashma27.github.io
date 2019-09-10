<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">FAQ</h1>
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
                            <label class="abkasa-label">FAQ List</label>
                            <a href="<?php echo base_url('admin/add-faq'); ?>" class="btn btn-outline btn-primary float-right">Add FAQ</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($faqs)) {
                                $i = 1;
                                foreach ($faqs as $faq) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $faq['title']; ?></td>
                                        <td><?php echo substr($faq['description'],0,100).'...'; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/add-faq/' . $faq['faq_id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit FAQ"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url('admin/delete-faq/' . $faq['faq_id']); ?>" class="delete" data-toggle="tooltip" data-placement="top" title="Delete FAQ"><i class="fa fa-trash-o"></i></a>
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

