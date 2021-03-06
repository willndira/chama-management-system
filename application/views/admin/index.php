<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Event Calendar (Evencal)</title>
        <!-------------------------------------------------------------------->

        <!-------------------------------------------------------------------->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/colorbox.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
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
                            <li>
                                <a href="<?php echo base_url("index.php/Admin/schedule_view"); ?>">Schedule</a>
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

            <div class="panel">
                <div class="panel-header">
                    <div class="panel-heading">
                        <h3 class="panel-title">Calendar</h3>
                    </div>
                </div>
                    <div class="calendar">
                        <?php echo $notes ?>
                        <span>by <a href="http://zawaruddin.blogspot.com"><strong>zawaruddin.blogspot.com</strong></a></span>
                    </div>
                    <div class="event_detail">
                        <h2 class="s_date">Detail Event <?php echo "$day $month $year"; ?></h2>
                        <div class="detail_event">
                            <?php
                            if (isset($events)) {
                                $i = 1;
                                foreach ($events as $e) {
                                    if ($i % 2 == 0) {
                                        echo '<div class="info1"><h4>' . $e['time'] . '<img src="' . base_url() . 'css/images/delete.png" class="delete" alt="" title="delete this event" day="' . $day . '" val="' . $e['id'] . '" /></h4><p>' . $e['event'] . '</p></div>';
                                    } else {
                                        echo '<div class="info2"><h4>' . $e['time'] . '<img src="' . base_url() . 'css/images/delete.png" class="delete" alt="" title="delete this event" day="' . $day . '" val="' . $e['id'] . '" /></h4><p>' . $e['event'] . '</p></div>';
                                    }
                                    $i++;
                                }
                            } else {
                                echo '<div class="message"><h4>No Event</h4><p>There\'s no event in this date</p></div>';
                            }
                            ?>
                            <input type="button" name="add" value="Add Event" val="<?php echo $day; ?>" class="add_event"/>
                        </div>
                    </div>
                </div>

            </div>
            <script>
                        $(".detail").live('click', function(){
                $(".s_date").html("Detail Event for " + $(this).attr('val') + " <?php echo "$month $year"; ?>");
                        var day = $(this).attr('val');
                        var add = '<input type="button" name="add" value="Add Event" val="' + day + '" class="add_event"/>';
                        $.ajax({
                        type: 'post',
                                dataType: 'json',
                                url: "<?php echo site_url("evencal/detail_event"); ?>",
                                data:{<?php echo "year: $year, mon: $mon"; ?>, day: day},
                                success: function(data) {
                                var html = '';
                                        if (data.status){
                                var i = 1;
                                        $.each(data.data, function(index, value) {
                                        if (i % 2 == 0){
                                        html = html + '<div class="info1"><h4>' + value.time + '<img src="<?php echo base_url(); ?>css/images/delete.png" class="delete" alt="" title="delete this event" day="' + day + '" val="' + value.id + '" /></h4><p>' + value.event + '</p></div>';
                                        } else{
                                        html = html + '<div class="info2"><h4>' + value.time + '<img src="<?php echo base_url(); ?>css/images/delete.png" class="delete" alt="" title="delete this event" day="' + day + '" val="' + value.id + '" /></h4><p>' + value.event + '</p></div>';
                                        }
                                        i++;
                                        });
                                } else{
                                html = '<div class="message"><h4>' + data.title_msg + '</h4><p>' + data.msg + '</p></div>';
                                }
                                html = html + add;
                                        $(".detail_event").fadeOut("slow").fadeIn("slow").html(html);
                                }
                        });
                });
                        $(".delete").live("click", function() {
                if (confirm('Are you sure delete this event ?')){
                var deleted = $(this).parent().parent();
                        var day = $(this).attr('day');
                        var add = '<input type="button" name="add" value="Add Event" val="' + day + '" class="add_event"/>';
                        $.ajax({
                        type: 'POST',
                                dataType: 'json',
                                url: "<?php echo site_url("evencal/delete_event"); ?>",
                                data:{<?php echo "year: $year, mon: $mon"; ?>, day: day, del: $(this).attr('val')},
                                success: function(data) {
                                if (data.status){
                                if (data.row > 0){
                                $('.d' + day).html(data.row);
                                } else{
                                $('.d' + day).html('');
                                        $(".detail_event").fadeOut("slow").fadeIn("slow").html('<div class="message"><h4>' + data.title_msg + '</h4><p>' + data.msg + '</p></div>' + add);
                                }
                                deleted.remove();
                                } else{
                                alert('an error for deleting event');
                                }
                                }
                        });
                }
                });
                        $(".add_event").live('click', function(){
                $.ajax({
                type: 'post',
                        dataType: 'json',
                        url: "<?php echo site_url("evencal/add_event"); ?>",
                        data:{year:<?php echo $year; ?>, mon:<?php echo $mon; ?>, day: $(this).attr('val')},
                        success: function(data) {
                        var html = '';
                                if (data.status){
                        var i = 1;
                                $.each(data.data, function(index, value) {
                                if (i % 2 == 0){
                                html = html + '<div class="info1"><h4>' + value.time + '<img src="<?php echo base_url(); ?>css/images/delete.png" class="delete" alt="" title="delete this event" day="' + day + '" val="' + value.id + '" /></h4><p>' + value.event + '</p></div>';
                                } else{
                                html = html + '<div class="info2"><h4>' + value.time + '<img src="<?php echo base_url(); ?>css/images/delete.png" class="delete" alt="" title="delete this event" day="' + day + '" val="' + value.id + '" /></h4><p>' + value.event + '</p></div>';
                                }
                                i++;
                                });
                        } else{
                        html = '<div class="message"><h4>' + data.title_msg + '</h4><p>' + data.msg + '</p></div>';
                        }
                        html = html + add;
                                $(".detail_event").fadeOut("slow").fadeIn("slow").html(html);
                        }
                });
                        $.colorbox({
                        overlayClose: true,
                                href: '<?php echo site_url('evencal/add_event'); ?>',
                                data:{year:<?php echo $year; ?>, mon:<?php echo $mon; ?>, day: $(this).attr('val')}
                        });
                });</script>
        </div>
        <footer >
            <div class="jumbotron">
                <div class="contain">
                    <p align="center">CMS &COPY; <?php echo date('Y'); ?></p>
                </div>
            </div>

        </footer>

        <script src="<?php echo base_url("includes/includes/jquery.js"); ?>"></script>
        <!-- If no online access, fallback to our hardcoded version of jQuery -->
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>/includes/js/jquery-1.8.2.min.js"><\/script>')</script>
        <!-- Bootstrap JS -->
        <script src="<?php echo base_url(); ?>includes/bootstrap/js/bootstrap.min.js"></script>
        <!-- Custom JS -->
        <script src="<?php echo base_url(); ?>includes/includes/js/script.js"></script>
        <script src="<?php echo base_url(); ?>includes/jquery/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>includes/jquery/jquery-ui.min.js"></script>

    </body>
</html>