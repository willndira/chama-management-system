<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Your Loan Statements</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (isset($loan) && $loan != FALSE) {
                    ?>
                    <table class="table table-bordered">
                        <thead>
                        <th>Loan Status</th>
                        <th>Loan Issue Date</th>
                        <th>Duration in months</th>
                        <th>Loan Due Date</th>
                        <th>Issued Amount</th>
                        <th>Monthly Pay</th>
                        <th>Amount Due</th>
                        </thead>
                        <?php
                        foreach ($loan as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($row->loan_status == 4) {
                                        echo 'Unpaid';
                                    } elseif ($row->loan_status == 5) {
                                        echo 'Paid';
                                    }
                                    ?>
                                </td>
                                <td><?php echo date('F d, Y ', strtotime($row->loan_issue_date)); ?></td>
                                <td><?php echo $row->loan_duration; ?></td>
                                <td><?php echo date('F d, Y ', strtotime($row->loan_issue_date . ' +' . $row->loan_duration . ' months')); ?></td>
                                <td><?php echo $row->loan_initial_amount; ?></td>
                                <td><?php echo $row->loan_monthly_pay; ?></td>
                                <td><?php echo $row->loan_amount; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                } else {
                    echo 'You have not taken any loans or they have not been approved';
                }
                ?>
            </div>
        </div>
    </div>
</div>