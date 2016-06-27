<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Take a loan</h3>
            <div class="bs-example4" data-example-id="contextual-table">

                <?php echo validation_errors(); ?>
                <?php
                echo form_open('Member/takeLoan');
                $session_data = $this->session->userdata('logged_in');
                $memberId = $session_data['member_id'];
                echo form_hidden('memberId', $memberId);
                ?>
                <table class="table">
                    <thead>
                    <th>Loan Availability</th>
                    <th>Current Loan Interest in %</th>
                    <th>Amount:</th>
                    <th>No of Months</th>
                    <th>Request Loan</th>
                    </thead>
                    <tr>
                        <th>
                            <?php
                            if ($availability) {
                                echo 'Yes';
                            } else {
                                echo 'No';
                            }
                            ?>
                        </th>
                        <td><?php
                            if (isset($loan_interest)) {
                                echo $loan_interest->loan_interest;
                            }
                            ?></td>
                        <td><input type="text" name="amount" /></td>
                        <td>
                            <select name="months">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </td>

                        <td><input type="submit" value="Request Loan" /></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
