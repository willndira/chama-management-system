<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Contribution Deposit Statements</h3>
            <div class="bs-example4" data-example-id="contextual-table">
               
                <?php
                if (count($user)) {
                    ?>
                    <table>
                        <tr>
                            <td>
                                <table class="table">
                                    <caption>Transactions for: </caption>
                                    <thead>
                                    <th>National ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Sur Name</th>
                                    <th>Gender</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $user->nationalId; ?></td>
                                            <td><?php echo $user->firstname; ?></td>
                                            <td><?php echo $user->middlename; ?></td>
                                            <td><?php echo $user->surname; ?></td>
                                            <td><?php echo $user->gender; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if (count($transaction)) {
                                    ?>
                                    <table class="table">
                                        <caption>Transactions</caption>
                                        <thead>
                                            <tr>
                                                <th>Transaction Id</th>
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($transaction as $tra) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $tra->transaction_id; ?></td>
                                                    <td><?php echo $tra->transaction_type; ?></td>
                                                    <td><?php echo date('F d, Y ', strtotime($tra->transaction_time)); ?></td>
                                                    <td><?php echo $tra->contribution_amount; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo "No Transactions for the member";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                } else {
                    echo "No member selected";
                }
                ?>

            </div>
        </div>
    </div>
</div>
