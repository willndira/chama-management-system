<!DOCTYPE html>

<html>
    <head>
        <!-- Website Title & Description for Search Engine purposes -->
        <title>Chama</title>
        <meta name="description" content="">
        <!-- Mobile viewport optimized -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url(); ?>includes/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/includes/css/bootstrap-glyphicons.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>includes/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/includes/css/calendar.css" rel="stylesheet">
        <!-- Include Modernizr in the head, before any other Javascript -->
        <script src="<?php echo base_url("includes/includes/jquery.js"); ?>"></script>
        <script src="<?php echo base_url(); ?>includes/includes/js/modernizr-2.6.2.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('.field_set').hide();
        });
        </script>
        <?php
        $this->load->helper('url');
        //echo link_tag($link);
        
        echo $library_src;
        echo $script_foot;
        ?>
    </head>
    <body>
        <div class="container" id="main">
            <div class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Chama Admin</div>
                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">

                            <li class="active dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url("index.php/Admin/index"); ?>">Members
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/addMemberView"); ?>">Add Member</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/Admin/resetPasswordView"); ?>">Reset Member Password</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url("index.php/Admin/deposit_view"); ?>">
                                    Deposit
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
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
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url("index.php/Admin/loan"); ?>">Loans
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
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

                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li>
                                <a href="<?php echo base_url("index.php/Member/"); ?>"><span class="glyphicon glyphicon-user"></span> My Account</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/Site/logout"); ?>"><span class="glyphicon glyphicon-off"></span> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    &nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </div>
                <div class="col-md-12">
                    &nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </div>
                <div class="col-md-12">
                    &nbsp;&nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </div>
            </div>


            <!--------------------------------------------------------------------->
