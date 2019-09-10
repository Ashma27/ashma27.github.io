
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('public/css/metisMenu.min.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('public/css/sb-admin-2.css'); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url('public/css/abkasa-style.css'); ?>" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div id="error_msg"></div>
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" id="login-form" action="<?php echo base_url('admin/checkLogin'); ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'placeholder' => 'E-mail', 'class' => 'form-control']); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'placeholder' => 'Password', 'class' => 'form-control']); ?>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url('public/js/jquery.min.js'); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('public/js/metisMenu.min.js'); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('public/js/sb-admin-2.js'); ?>"></script>

        <script src="<?php echo base_url('public/js/abkasa.js'); ?>"></script>

    </body>

</html>
