
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3 class="text-center">Pay for Member:</h3>
                <div class="bs-example4" data-example-id="contextual-table">
                    <?php
                    if (count($result)) {
                        ?>
                        <p class="error">
                            <font color="red">
                                <?php echo validation_errors(); ?>
                            </font>
                            
                        </p>
                        <table class="table">
                            <thead>
                            <th>National ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Sur Name</th>
                            <th>Current Amount</th>
                            <th>Amount Paid</th>
                            <th>Deposit</th>
                            </thead>
                            <tbody>
                                <?php
                                echo form_open('Treasurer/loanPay');
                                foreach ($result as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo form_hidden('loan_id', $row->loan_id);
                                            echo form_hidden('loan_member', $row->loan_member);
                                            echo $row->nationalId;
                                            ?>
                                        </td>
                                        <td><?php echo $row->firstname; ?></td>
                                        <td><?php echo $row->middlename; ?></td>
                                        <td><?php echo $row->surname; ?></td>
                                        <td><?php echo $row->loan_amount; ?></td>
                                        <td><input type="text" name="amount"required/></td>
                                        <td><input type="submit" value="Pay" class="btn btn-default" /></td>
                                    </tr>
                                    <?php
                                    echo form_close();
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo 'Member does not have a loan';
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>


