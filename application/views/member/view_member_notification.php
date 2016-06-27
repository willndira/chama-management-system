

<div id="page-wrapper">
    <div class="graphs">
        <div class="xs">
            <h3 class="text-center">Member Notification</h3>
            <div class="col-md-6  stats-info stats-info1">
                <div class="mailbox-content">
                    <h3 class="text-center">Contribution Notification</h3>
                </div>

                <?php
                if (count($debit)) {
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date Due</th>
                                <th>Debit Type</th>
                                <th>Status</th>
                                <th>Debit Expected Amount</th>
                                <th>Debit Paid Amount</th>
                                <th>Debit Remaining Amount</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($debit as $row) {
                                ?>
                                <tr class="active">
                                    <th scope="row">
                                        <?php echo date('F d, Y ', $row->debit_date_due); ?>
                                    </th>
                                    <td class="info"><?php echo $row->debit_type; ?></td>
                                    <td class="row">
                                        <?php
                                        if ($row->debit_status == 0) {
                                            echo 'Not yet Paid';
                                        } else {
                                            echo ' Paid';
                                        }
                                        ?>
                                    <td class="info"><?php echo $row->debit_expected_amount; ?></td>
                                    <td class="row"><?php echo $row->debit_paid_amount; ?></td>
                                    <td class="info"><?php echo ($row->debit_expected_amount - $row->debit_paid_amount); ?></td>
                                </tr>


                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    <h3 class="text-center">No  Notification Found</h3>
                    <?php
                }
                ?>  

            </div>

            <div class="col-md-6 inbox_right">

                <div class="mailbox-content">
                    <h3 class="text-center">Loan Notification</h3>

                    <?php
                    if (count($loan)) {
                        ?>

                        <table class="table">
                            <tbody>
                                <?php
                                foreach ($loan as $row) {
                                    ?>
                                    <tr class="unread checked">
                                        <td class="hidden-xs">
                                            <input type="checkbox" class="checkbox">
                                        </td>
                                        <td class="hidden-xs">
                                            <i class="fa fa-star icon-state-warning"></i>
                                        </td>
                                        <td class="hidden-xs">
                                            Loan
                                        </td>
                                        <td>
                                            <?php echo $row->loan_amount; ?>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <?php echo date('F d, Y ', strtotime($row->loan_issue_date . ' +' . $row->loan_duration . ' months')); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        ?>
                        <p class="lead text-center">You currently do not have any unpaid loan.</p>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="copy_layout">
            <p>Copyright © 2015 </p>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
</div>

