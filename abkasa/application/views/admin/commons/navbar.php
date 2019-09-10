<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">Abkasa</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         Welcome Admin <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('admin/changePassword'); ?>"><i class="fa fa-key"></i>Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/category'); ?>" class="<?php if($title=='Category'){echo 'active';} ?>"><i class="fa fa-th-large"></i> Category</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('admin/subCategory'); ?>" class="<?php if($title=='Sub Category'){echo 'active';} ?>"><i class="fa fa-th"></i> Sub Category</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/product'); ?>" class="<?php if($title=='Product'){echo 'active';} ?>"><i class="fa fa-table fa-fw"></i> Product</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/order'); ?>" class="<?php if($title=='Order'){echo 'active';} ?>"><i class="fa fa-briefcase"></i> Order</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/top-selling'); ?>" class="<?php if($title=='Top Selling'){echo 'active';} ?>"><i class="fa fa-briefcase"></i> Top Selling</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/customer'); ?>" class="<?php if($title=='Customer'){echo 'active';} ?>"><i class="fa fa-users"></i> Customer</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/coupon'); ?>" class="<?php if($title=='Coupon'){echo 'active';} ?>"><i class="fa fa-list-alt"></i> Coupon</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/faq'); ?>" class="<?php if($title=='FAQ'){echo 'active';} ?>"><i class="fa fa-list-alt"></i> FAQ</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/newsletter'); ?>" class="<?php if($title=='Newsletter'){echo 'active';} ?>"><i class="fa fa-envelope"></i> Newsletter</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/sms'); ?>" class="<?php if($title=='SMS'){echo 'active';} ?>"><i class="fa fa-comment"></i> SMS</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/home-consultation'); ?>" class="<?php if($title=='Home Consultation'){echo 'active';} ?>"><i class="fa fa-home"></i> Home Consultation</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/size-guide'); ?>" class="<?php if($title=='Size Guide'){echo 'active';} ?>"><i class="fa fa-book"></i> Size Guide</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/designer-product'); ?>" class="<?php if($title=='designer Product'){echo 'active';} ?>"><i class="fa fa-book"></i> Designer Product</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/special-product'); ?>" class="<?php if($title=='Special Product'){echo 'active';} ?>"><i class="fa fa-book"></i> Special Product</a>
                        </li>
                        <li class="<?php if($title=='Brand'||$title=='Size'||$title=='Fit'){echo 'active';} ?>">
                            <a href="#"><i class="fa fa-compress"></i> Sizing<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="<?php if($title=='Brand'){echo 'active';} ?>" href="<?php echo base_url('admin/brand'); ?>">Brand</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="<?php if($title=='terms and condition'||$title=='return policy'||$title=='privacy policy'||$title=='carousel'||$title=='About us'||$title=='Shipping policy'||$title=='fit guarantee'){echo 'active';} ?>">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Site Setting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="<?php if($title=='return policy'){echo 'active';} ?>" href="<?php echo base_url('admin/return-policy'); ?>">Return Policy</a>
                                </li>
                                <li>
                                    <a class="<?php if($title=='privacy policy'){echo 'active';} ?>" href="<?php echo base_url('admin/privacy-policy'); ?>">Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="<?php if($title=='terms and condition'){echo 'active';} ?>" href="<?php echo base_url('admin/terms-and-condition'); ?>">Terms & Condition</a>
                                </li>
                                <li>
                                    <a class="<?php if($title=='carousel'){echo 'active';} ?>" href="<?php echo base_url('admin/carousel'); ?>">Carousel</a>
                                </li>
                                <li>
                                    <a class="<?php if($title=='About us'){echo 'active';} ?>" href="<?php echo base_url('admin/about-us'); ?>">About us</a>
                                </li>
                                <li>
                                    <a class="<?php if($title=='Shipping policy'){echo 'active';} ?>" href="<?php echo base_url('admin/shipping-policy'); ?>">Shipping policy</a>
                                </li>
                                  <li>
                                    <a class="<?php if($title=='fit guarantee'){echo 'active';} ?>" href="<?php echo base_url('admin/fit-guarantee'); ?>">Fit Guarantee</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>