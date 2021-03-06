
<!DOCTYPE HTML>
<html>
    <head>
        <title>Member</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->

        <link href="<?php echo base_url('includes/css/bootstrap.min.css') ?>" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="<?php echo base_url('includes/css/style.css') ?>" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url('includes/css/font-awesome.css') ?>" rel="stylesheet"> 
        <!-- jQuery -->
        <script src="<?php echo base_url('includes/js/jquery.min.js') ?>"></script>
        <!----webfonts--->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        <!---//webfonts--->  
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('includes/js/bootstrap.min.js') ?>"></script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Member</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="<?php echo base_url('includes/images/profile.jpg') ?>" alt=""/></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-header text-center">
                                <strong>Account</strong>
                            </li>

                            <li class="m_2"><a href="<?php echo base_url("index.php/Member/profile"); ?>"><i class="fa fa-user"></i> Profile</a></li>

                            <?php
                            session_start();
                            if ($this->session->userdata('logged_in') != NULL) {
                                $session_data = $this->session->userdata('logged_in');
                                if ($session_data['type'] == 'admin') {
                                    ?>
                                    <li class="m_2"><a href="<?php echo base_url("index.php/Treasurer/"); ?>"><i class="fa fa-user"></i> Treasurer</a></li>
                                    <li class="m_2"><a href="<?php echo base_url("index.php/Admin/"); ?>"><i class="fa fa-user"></i> Admin</a></li>

                                    <?php
                                } else if ($session_data['type'] == 'treasurer') {
                                    ?>
                                    <li class="m_2"><a href="<?php echo base_url("index.php/Treasurer/"); ?>"><i class="fa fa-user"></i> Treasurer</a></li>

                                    <?php
                                }
                            } else {
                                redirect('Site/login_view');
                            }
                            ?>
                            <li class="m_2"><a href="<?php echo base_url("index.php/Site/logout"); ?>"><i class="fa fa-lock"></i> Logout</a></li>	
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url("index.php/Member/notification"); ?>"><i class="fa fa-envelope fa-fw nav_icon"></i>Notifications</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Member/profile"); ?>"><i class="fa fa-user nav_icon"></i>Account<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/profile"); ?>"><i class="fa fa-user nav_icon"></i>My Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/changePassword"); ?>"><i class="fa fa-edit nav_icon"></i>Change Password</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Member/contributions"); ?>"><i class="fa fa-indent nav_icon"></i>Contribution<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/contributions"); ?>">My Contributions</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/group_contributions"); ?>">Group Contribution</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Member/loan_Statements"); ?>"><i class="fa fa-envelope nav_icon"></i>Loans<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/loan_calculator"); ?>">Loans Calculator</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/take_loan"); ?>">Take Loan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/loan_Statements"); ?>">Loan  Statements</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Member/loan_request_statements"); ?>">Loan Request Statements</a>
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