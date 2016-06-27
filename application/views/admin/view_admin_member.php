<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center"></h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (isset($member)) {
                    echo $member->member_id;
                    ?>
                    <div class="tabbable"> <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Profile</a></li>
                            <li><a href="#tab2" data-toggle="tab">Contributions</a></li>
                            <li><a href="#tab3" data-toggle="tab">Loan</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <p>Profile</p>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Firstname:</td>
                                        <td><?php echo $member->firstname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Middlename:</td>
                                        <td><?php echo $member->middlename; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname:</td>
                                        <td><?php echo $member->surname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $member->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of birth</td>
                                        <td><?php echo $member->dob; ?></td>
                                    </tr>
                                    <tr>
                                        <td>National Id</td>
                                        <td><?php echo $member->nationalId; ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Type</td>
                                        <td><?php echo $member->type; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <p>Contribution</p>
                                <table class="table table-bordered table-responsive">
                                    <caption>Contribution Statements</caption>
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
                                        foreach ($contribution as $tra) {
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

                            </div>
                            <div class="tab-pane" id="tab3">
                                <p>Loans</p>
                                <table class="table table-bordered table-responsive">

                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "No member selected";
                }
                ?>
            </div>
        </div>
    </div>
</div>
