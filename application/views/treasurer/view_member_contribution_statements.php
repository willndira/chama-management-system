<div id="page-wrapper">
    <div class="graphs">
        <div class="xs">
            <h3 class="text-center">Member Deposit</h3>
            <div class="col-md-3 email-list1">
                <?php echo validation_errors();?>
                
                <?php echo form_open('Treasurer/member_contribution_statements/'.$user->member_id); ?>
                <ul class="collection">
                    <h4 class="text-center">Sort by Date</h4>
                    <li class="collection-item avatar email-unread email_last">

                        <div class="avatar_left">
                            <span class="email-title">Date from:</span>
                            <p class="truncate grey-text ultra-small">
                                <input type="text"  placeholder="Year/Month/Date" id="datepicker" name="from" required>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li class="collection-item avatar email-unread email_last">
                        <div class="avatar_left">
                            <span class="email-title">Date To:</span>
                            <p class="truncate grey-text ultra-small">
                                <input type="text"  placeholder="Year/Month/Date" id="to" name="to" required>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li class="collection-item avatar email-unread email_last">

                        <div class="avatar_left">
                            <span class="email-title"></span>
                            <p class="truncate grey-text ultra-small">
                                <input type="submit" value="Sort" class="btn btn-default">
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                </ul>
                <?php echo form_close(); ?>
            </div>
            <div class="col-md-9 inbox_right">
                <div class="mailbox-content">
                    <?php
                    if (count($credit)) {
                        ?>

                        <table class="table">
                            <thead>
                            <th>Transaction Date</th>

                            <th>Transacted By</th>
                           
                            <th>Amount Required</th>
                            <th>Amount Deposited</th>
                            <th>Amount Due</th>

                            </thead>
                            <tbody>
                                <?php
                                foreach ($credit as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('d-m-Y', $row->credit_date); ?></td>
                                        <td>
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('member');
                                            $this->db->where('member_id', $row->credit_trans_by);
                                            $query = $this->db->get();
                                            $result = $query->row();
                                            echo $result->nationalId . '<br/>';
                                            echo $result->surname . '<br/>';
                                            echo $result->firstname . '<br/>';
                                            ?>
                                        </td>
                                        <td><?php echo $row->credit_intitial_debit_amount; ?></td>
                                        <td><?php echo $row->credit_amount_credited; ?></td>
                                        <td><?php echo $row->credit_amount_remaining; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td>
                                        <b><?php echo $total->total; ?></b>
                                    </td>
                                    
                                    <td>
                                         <b><?php echo $total->deposited; ?></b>
                                    </td>
                                    <td>
                                        <b><?php echo $total->remaining; ?></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <?php
                    } else {
                        echo 'No contributions found';
                    }
                    ?>


                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="copy_layout">
            <p>Copyright © 2015 Modern </p>
        </div>
    </div>
</div>