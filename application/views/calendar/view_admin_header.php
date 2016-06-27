
<!DOCTYPE HTML>
<html>
    <head>
        <title>Chama</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->

        <link href="<?php echo base_url('includes/css/bootstrap.min.css') ?>" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="<?php echo base_url('includes/css/style.css') ?>" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url('includes/css/table.css') ?>" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url('includes/css/font-awesome.css') ?>" rel="stylesheet"> 

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/colorbox.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>

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
                    <a class="navbar-brand" href="#">Admin Panel</a>
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
                                <a href="<?php echo base_url("index.php/Admin/members"); ?>"><i class="fa fa-dashboard fa-users nav_icon"></i>Members</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/members"); ?>">Members

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/addMemberView"); ?>">Add Member</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/resetPasswordView"); ?>">Reset Member Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Admin/deposit_view"); ?>"><i class="fa fa-briefcase nav_icon"></i>Deposit<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/deposit_view"); ?>">Member Deposit</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/groupDeposit"); ?>">Group Deposit</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/pendingDeposit"); ?>">Pending Deposit</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/setDeposit"); ?>"> <span class="glyphicon glyphicon-upload"></span> Set Deposit</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/setDeposit"); ?>"><span class="glyphicon glyphicon-inbox"></span> View Deposit Info</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/setDeposit"); ?>"> <span class="glyphicon glyphicon-edit"></span> Edit Deposit</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/updateContributeView"); ?>"> <span class="glyphicon glyphicon-edit"></span>Remind Monthly Contribution</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Admin/loan"); ?>"><i class="fa fa-indent nav_icon"></i>Loans<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/loan"); ?>">Loans</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/loan_info"); ?>">Loan Info</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/loan_info_add"); ?>">Add Loan Info</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/loan_info_edit"); ?>">Edit Loan Info</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Admin/schedule_view"); ?>"><i class="fa fa-edit  nav_icon"></i>Schedule</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/schedule_view"); ?>">Set Contribution date</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->



                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>