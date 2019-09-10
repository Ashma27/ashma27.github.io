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

        
        <link href="<?php echo base_url('public/css/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url('public/css/dataTables.responsive.css'); ?>" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css'>
        
        <?php
        if (!empty($top_selling_script)) {
            ?>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
            <?php
        }
        ?>
        
        <link href="<?php echo base_url('public/css/abkasa-style.css'); ?>" rel="stylesheet" type="text/css">
        
        <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />-->
       
    </head>