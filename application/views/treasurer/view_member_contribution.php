
<div class="tab-pane fade in active" id="memberdeposit">
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="xs">
                <?php
                if (count($user)) {
                    ?>
                    <div class="col_3">
                        <div class="col-md-12 widget widget1">
                            <div class="r3_counter_box">
                                <div class="stats">
                                    <table class="table">
                                        <thead>
                                        <th>Surname:</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>National ID</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $user->surname; ?></td>
                                                <td><?php echo $user->firstname; ?></td>
                                                <td><?php echo $user->middlename; ?></td>
                                                <td><?php echo $user->nationalId; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="bs-example4" data-example-id="contextual-table">


                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#deposit" aria-controls="deposit" role="tab" data-toggle="tab">Monthly Deposit</a></li>
                                <li role="presentation"><a href="#depositStatements" aria-controls="depositStatements" role="tab" data-toggle="tab">Statement</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="deposit">
                                    <p class="text-center">
                                        <font color="red"><?php echo validation_errors(); ?></font>
                                    </p>
                                    <table class="table">
                                        <caption class="text-center"><b><u>Unpaid Deposits</u></b></caption>
                                        <thead>
                                        <th>Date Due:</th>
                                        <th>Type:</th>
                                        <th>Amount to be Contributed</th>
                                        <th>Contributed Amount</th>
                                        <th>Contribution Amount Due</th>
                                        <th>Amount</th>
                                        <th>Deposit</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($debit as $row) {
                                                echo form_open('Treasurer/deposit/' . $row->debit_tran_for);
                                                echo form_hidden('debit_id', $row->debit_id);
                                                echo form_hidden('id', $row->debit_tran_for);
                                                ?>
                                                <tr>
                                                    <td><?php echo date('d-m-Y', $row->debit_date_due); ?></td>
                                                    <td><?php echo $row->debit_type; ?></td>
                                                    <td><?php echo $row->debit_expected_amount; ?></td>
                                                    <td><?php echo $row->debit_paid_amount; ?></td>
                                                    <td>
                                                        <font color="red">
                                                        <?php echo ($row->debit_expected_amount - $row->debit_paid_amount); ?>
                                                        </font>
                                                    </td>
                                                    <td><input type="text" name="amount"/></td>
                                                    <td>
                                                        <?php echo form_hidden('id', $user->member_id); ?>
                                                        <input type="submit" value="Deposit" class="btn btn-default">
                                                    </td>
                                                </tr>
                                                <?php
                                                echo form_close();
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                </div>

                                <div role="tabpanel" class="tab-pane" id="depositStatements">
                                    <h3>Transaction information</h3>
                                    <?php
                                    if (isset($transaction)) {
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
                                                        <td><?php echo $tra->transaction_amount; ?></td>
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

</div>