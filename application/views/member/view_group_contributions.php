<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Group Contibutions</h3>



            <div class="bs-example4" data-example-id="contextual-table">
                <?php echo form_open('Member/group_contributions'); ?>
                <table class="table">
                    <thead>
                    <th>From</th>
                    <th>To</th>
                    <th>Search</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="date" id="datepicker"  name="from" required/></td>
                            <td><input type="date" id="to" name="to" required/></td>
                            <td><input type="submit" class="btn-default btn"/></td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
                <?php
                if (count($contribution)) {
                    //print_r($contribution);
                    ?>

                    <table class="table-striped table">
                        <thead>

                        <th>Transaction ID</th>
                        <th>Transacted By</th>
                        <th>Transaction Type</th>
                        <th>Contribution For:</th>
                        <th>Contribution Date</th>
                        <th>Contribution Amount</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($transaction as $tra) {
                                ?>
                                <tr>
                                    <td><?php echo $tra->transaction_id; ?></td>
                                    <td>
                                        <?php
                                        $this->load->model('MemberModel');
                                        $query = $this->MemberModel->getMember($tra->transaction_member);
                                        echo $query->firstname . '<br/>';
                                        echo $query->middlename . '<br/>';
                                        echo $query->surname . '<br/>';
                                        echo '<br/>';
                                        echo $query->nationalId . '<br/>';
                                        ?>
                                    </td>
                                    <td><?php echo $tra->transaction_type; ?></td>
                                    <td>
                                        <?php
                                        $this->load->model('MemberModel');
                                        $query = $this->MemberModel->getMember($tra->transaction_done_for);
                                        echo $query->firstname . '<br/>';
                                        echo $query->middlename . '<br/>';
                                        echo $query->surname . '<br/>';
                                        echo '<br/>';
                                        echo $query->nationalId . '<br/>';
                                        ?>
                                    </td>
                                    <td><?php echo date('F d, Y ', strtotime($tra->transaction_time)); ?></td>
                                    <td><?php echo $tra->contribution_amount; ?></td>
                                </tr>
                                <?php
                            }
                            ?>    
                        </tbody>
                        <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b><u>Total:</u></b></td>
                        <td>
                            <b><?php echo $total->total; ?></b>
                        </td>

                        </tfoot>
                    </table>
                    <?php
                } else {
                    ?>
                    <p class="text-center text-justify">No contribution found</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>