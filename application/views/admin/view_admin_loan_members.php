<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center"></h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (isset($loans)) {
                    ?>
                    <table class="table">
                        <thead>
                        <th>Loan Status</th>
                        <th>National ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Sur Name:</th>
                        <th>Issue on Date:</th>
                        <th>Loan Duration</th>
                        <th>Due Date</th>
                        <th>Issued Amount:</th>
                        <th>Monthly Pay</th>
                        <th>Unpaid Amount:</th>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($loans)) {
                                foreach ($loans as $row) {
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
                                        <td><?php echo $row->nationalId; ?></td>
                                        <td><?php echo $row->firstname; ?></td>
                                        <td><?php echo $row->middlename; ?></td>
                                        <td><?php echo $row->surname; ?></td>
                                        <td><?php echo date('F d, Y ', strtotime($row->loan_issue_date)); ?></td>
                                        <td><?php echo $row->loan_duration; ?></td>
                                        <td><?php echo date('F d, Y ', strtotime($row->loan_issue_date . ' +' . $row->loan_duration . ' months')); ?></td>
                                        <td><?php echo $row->loan_initial_amount; ?></td>
                                        <td><?php echo $row->loan_monthly_pay; ?></td>
                                        <td><?php echo $row->loan_amount; ?></td>
                                    </tr>
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total: <?php echo $total->total; ?> </td>
                        </tfoot>
                    </table>
                    <?php
                } else {
                    echo 'No Loans taken by members';
                }
                ?>
            </div>
        </div>
    </div>
</div>
