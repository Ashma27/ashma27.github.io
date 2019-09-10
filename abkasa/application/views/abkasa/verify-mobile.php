<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url('public/image/logoicon.png'); ?>" type="image/ico" sizes="16x16">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/hamburgers.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/slick-theme.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/slick.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/media.css'); ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header fixheaderblack">
            <div class="headertop boxs">
                <div class="container">
                    <div class="headerInner boxs">
                        <div class="lefthamburwidth">
                            
                        </div>
                        <div class="leftwidth">
                            <div class="boxs logoimg">
                                <a href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url('public/image/logotext.png'); ?>" alt="logo" class="logo_text ">
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <!--        <div class="boxs forHeight inView" data-type="white" ></div>-->
        <section class="productDetail boxs productlist inView" data-type="black" style="height: 520px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group newsletter">
                                    <form method="post" id="verify-mobile" action="<?php echo base_url('abkasa/doVerifyMobile'); ?>">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-3">Enter mobile Number</div>
                                            <div class="col-md-3">
                                                <input type="text" name="mobile" class="form-control" id="mobile"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-8">
                                                <button type="submit" class="btn btn-success" id="button">Submit</button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                                <div class="form-group newsletter hidden" id="otp">
                                    <form method="post" id="verify-otp" action="<?php echo base_url('abkasa/doVerifyOtp'); ?>">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-3">Enter Otp</div>
                                            <div class="col-md-3"><input type="text" class="form-control" name="otp" id="otp"/></div>
                                            <input type="hidden" name="verify_mobile" id="verify_mobile" value=""/>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-8">
                                                <button id="button" type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="footertop boxs"></div>
        <div class="copyright boxs">
            <div class="container">
                <div class="col-sm-6 noleft">
                    <p><span>© 2018 Abkasa. All rights reserved.</span></p>
                </div>
                <div class="col-sm-6 noright">
                    <p><span class="flotright">Made, with love, by <a href="#">Designoweb Technologies</span></a></p>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/slick.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/wow.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jquery.scrollie.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/materialselect.js'); ?>"></script>
        <script>
            $("#verify-mobile").submit(function (evt) {
                evt.preventDefault();
                var url = $(this).attr("action");
                var postdata = $(this).serialize();
                var form = $(this)[0];
                $.post(url, postdata, function (out) {
                    $(".col-md-3 > .error").remove();
                    if (out.result === 0) {
                        for (var i in out.errors) {
                            $("#" + i).parents(".col-md-3").append('<span class="error">' + out.errors[i] + '</span>');
                            $("#" + i).focus();
                        }
                    }
                    if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                    }
                    if (out.result === 1) {
                        $("#otp").removeClass("hidden");
                        $("#otp").addClass("show");
                        $("#button").addClass("hidden");
                        $("#mobile").attr('disabled', 'True');
                        $("#verify_mobile").val(out.mobile);
                    }
                });
            });

            $(document).on('submit', '#verify-otp', function (evt) {
                evt.preventDefault();
                var url = $(this).attr("action");
                var postdata = $(this).serialize();
                var form = $(this)[0];
                $.post(url, postdata, function (out) {
                    $(".col-md-3 > .error").remove();
                    if (out.result === 0) {
                        for (var i in out.errors) {
                            alert(out.errors[i]);
                            $("#" + i).parents(".col-md-3").append('<span class="error">' + out.errors[i] + '</span>');
                            $("#" + i).focus();
                        }
                    }
                    if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                    }
                    if (out.result === 1) {
                        window.location.href = out.url;
                    }
                });
            });
        </script>
    </body>
</html>