<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Member Loan</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <table class="table">
                    <thead>
                    <th>National ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Sur Name</th>
                    <th>Current Amount</th>
                    <th>Issue Date</th>
                    <th>Date due</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row->nationalId; ?></td>
                                <td><?php echo $row->firstname; ?></td>
                                <td><?php echo $row->middlename; ?></td>
                                <td><?php echo $row->surname; ?></td>
                                <td><?php echo $row->loan_amount; ?></td>
                                <td><?php echo date('F d, Y ', strtotime($row->loan_issue_date)); ?></td>
                                <td><?php echo date('F d, Y ', strtotime("+3 months", strtotime($row->loan_issue_date))); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>   

            </div>
        </div>
    </div>
</div>
