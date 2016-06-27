<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Your Contibutions</h3>

            <div class="bs-example4" data-example-id="contextual-table">
                <?php echo form_open('Member/contributions'); ?>
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

                    <table class="table">
                        <thead>

                        <th>Transaction ID</th>
                        <th>Transaction Type</th>
                        <th>Contribution Date</th>
                        <th>Contribution Amount</th>
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
                    ?>
                    <p class="text-center text-justify">No contribution found</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>