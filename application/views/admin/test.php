<div id="page-wrapper">
    <div class="graphs">
        <div class="xs">
            <h3>Group Deposit</h3>
            <div class="col-md-3 email-list1">
                <?php echo form_open('Admin/groupDeposit'); ?>
                <ul class="collection">
                    <h4 class="text-center">Sort by Date</h4>
                    <li class="collection-item avatar email-unread email_last">

                        <div class="avatar_left">
                            <span class="email-title">Date from:</span>
                            <p class="truncate grey-text ultra-small">
                                <input type="text"  placeholder="Year/Month/Date" id="datepicker" name="from" required>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li class="collection-item avatar email-unread email_last">
                        <div class="avatar_left">
                            <span class="email-title">Date To:</span>
                            <p class="truncate grey-text ultra-small">
                                <input type="text"  placeholder="Year/Month/Date" id="to" name="to" required>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li class="collection-item avatar email-unread email_last">

                        <div class="avatar_left">
                            <span class="email-title">Sort</span>
                            <p class="truncate grey-text ultra-small">
                                <input type="submit" value="Sort" class="btn btn-default">
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                </ul>
                <?php echo form_close(); ?>
            </div>
            <div class="col-md-9 inbox_right">
                <div class="mailbox-content">
                    <?php
                    if (count($allContribution)) {
                        ?>

                        <table class="table">
                            <thead>
                            <th>Contribution Date</th>
                            <th>National Id</th>
                            <th>Sur Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Contribution Amount</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($allContribution as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('d-M-Y', strtotime($row->contribution_date)); ?></td>
                                        <td><?php echo $row->nationalId; ?></td>
                                        <td><?php echo $row->surname; ?></td>
                                        <td><?php echo $row->firstname; ?></td>
                                        <td><?php echo $row->middlename; ?></td>
                                        <td><?php echo $row->contribution_amount; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total is: <b><?php echo $total->total; ?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                        <?php
                    } else {
                        echo 'No contributions found';
                    }
                    ?>


                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="copy_layout">
            <p>Copyright © 2015 Modern </p>
        </div>
    </div>
</div>