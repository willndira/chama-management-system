

<div id="page-wrapper">
    <div class="graphs">
        <div class="xs">
            <h3 class="text-center">Members Fine Statements</h3>
            <?php echo form_open('Admin/fine_statements'); ?>
            <div class="input-group">
                <input type="text" name="search" class="form-control1 input-search" placeholder="Search by member national ID....">
                <span class="input-group-btn">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div><!-- Input Group -->
            </form>


            <div class="col-md-12  stats-info stats-info1">
                <?php
                if (count($debit)) {
                    ?>




                    <table class="table">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Date Due</th>
                                <th>Debit Type</th>
                                <th>Status</th>
                                <th>Debit Expected Amount</th>
                                <th>Debit Paid Amount</th>
                                <th>Debit Remaining Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($debit as $row) {
                                ?>
                                <tr class="active">
                                    <td class="info">
                                        <?php
                                        echo $row->nationalId;
                                        ?>
                                    </td>
                                    <th scope="row">
                                        <?php echo date('F d, Y ', $row->debit_date_due); ?>
                                    </th>
                                    <td class="info"><?php echo $row->debit_type; ?></td>
                                    <td class="row">
                                        <?php
                                        if ($row->debit_status == 0) {
                                            echo 'Not yet Paid';
                                        } else {
                                            echo ' Paid';
                                        }
                                        ?>
                                    <td class="info"><?php echo $row->debit_expected_amount; ?></td>
                                    <td class="row"><?php echo $row->debit_paid_amount; ?></td>
                                    <td class="info"><?php echo ($row->debit_expected_amount - $row->debit_paid_amount); ?></td>
                                </tr>


                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    <h3 class="text-center">No  Fines Found</h3>
                    <?php
                }
                ?>  

            </div>


            <div class="clearfix"> </div>
        </div>
        <div class="copy_layout">
            <p>Copyright © 2015 </p>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
</div>

