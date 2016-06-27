<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Loan Info</h3>
            <div class="bs-example4" data-example-id="contextual-table">


                <?php
                if (isset($loan_info)) {
                    ?>
                    <table class="table">
                        <thead>
                        <th>loan Interest</th>
                        <th>Minimum amount </th>
                        <th>Maximum Amount to borrow</th>
                        <th>Is Loan Issuable</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $loan_info->loan_interest; ?></td>
                                <td><?php echo $loan_info->loan_min; ?></td>
                                <td><?php echo $loan_info->loan_max; ?></td>
                                <td><?php
                                    if ($loan_info->loan_issue_status == 0) {
                                        echo 'No';
                                    } else {
                                        echo 'Yes';
                                    }
                                    ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No loan Information found';
                }
                ?>

            </div>
        </div>
    </div>
</div>
