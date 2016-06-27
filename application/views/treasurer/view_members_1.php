<div id="page-wrapper">
    <div class="graphs">

        <div class="grid_3 grid_5">
            <h3 class="text-center">Member Information</h3>
            <?php
            if (count($user)) {
                ?>
                <div class="but_list">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#profile" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Profile</a></li>
                            <li role="presentation"><a href="#contribution" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Contribution Statements</a></li>
                            <li role="presentation"><a href="#loan" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Loan Statements</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile" aria-labelledby="home-tab">
                                Profile

                                <table class="table table-bordered">
                                    <thead>
                                    <th>Sur Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>National ID</th>
                                    <th>Type of user</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $user->surname; ?></td> 
                                            <td><?php echo $user->firstname; ?></td>
                                            <td><?php echo $user->middlename; ?></td>
                                            <td><?php echo $user->nationalId; ?></td>
                                            <td><?php echo $user->type; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="contribution" aria-labelledby="profile-tab">
                                Contribution
                                <?php
                                if (count($debit)) {
                                    ?>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Date due</th>
                                                <th>Date Paid</th>
                                                <th>Expected Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Remaining Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($debit as $row) {
                                                ?>
                                                <tr class="active">
                                                    <th scope="row">
                                                        <?php echo $row->debit_type; ?>
                                                    </th>
                                                    <td class="info">
                                                        <?php echo 
                                                        date('d-m-Y',$row->debit_date_due);
                                                         ?>
                                                    </td>
                                                    <td class="info">
                                                        <?php echo
                                                        date('d-m-Y',$row->debit_date_due);
                                                         ?>
                                                    </td>
                                                    <th scope="row">
                                                        <?php echo $row->debit_expected_amount; ?>
                                                    </th>
                                                    <td class="info">
                                                        <?php echo $row->debit_paid_amount; ?>
                                                    </td>
                                                    <td class="row">
                                                        <?php echo ($row->debit_expected_amount - $row->debit_paid_amount); ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>

                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo 'No Contribution Information';
                                }
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="loan" aria-labelledby="profile-tab">
                                Loans
                                <?php
                                if (count($loan)) {
                                    ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date Due</th>
                                                <th>Loan Interest Rate</th>
                                                <th>Loan Status</th>
                                                <th>Loan Duration</th>
                                                <th>Loan Requested</th>
                                                <th>Loan Monthly Pay</th>
                                                <th>Loan Remaining Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($loan as $row) {
                                                ?>
                                                <tr class="active">
                                                    <td class="info">
                                                        <?php echo $row->loan_issue_date; ?>
                                                    </td>
                                                    <th scope="row">
                                                        <?php echo $row->loan_interest; ?>
                                                    </th>
                                                    <td class="info">
                                                        <?php echo $row->loan_status; ?>
                                                    </td>
                                                    <td class="row">
                                                        <?php echo $row->loan_duration; ?>
                                                    </td>
                                                    <td class="info">
                                                        <?php echo $row->loan_initial_amount; ?>
                                                    </td>
                                                    <td class="row">
                                                        <?php echo $row->loan_monthly_pay ?>
                                                    </td>
                                                    <td class="info">
                                                        <?php echo $row->loan_amount; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo 'No Loan Statement found';
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo 'No Member Found';
            }
            ?>


        </div>

        <div class="copy_layout">
            <p>Copyright © 2015 .</p>
        </div>	
    </div>
</div>