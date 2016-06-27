<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Loan payments</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (count($results)) {
                    ?>    
                    <table class="table">
                        <thead>
                        <th>National ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Sur Name</th>
                        <th>Current Amount</th>
                        <th>Select</th>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($results)) {
                                foreach ($results as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->nationalId; ?></td>
                                        <td><?php echo $row->firstname; ?></td>
                                        <td><?php echo $row->middlename; ?></td>
                                        <td><?php echo $row->surname; ?></td>
                                        <td><?php echo $row->loan_amount; ?></td>
                                        <td>
                                            <?php echo anchor('Treasurer/payFor/' . $row->member_id, 'Select', array('class' => 'btn btn-default')); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                        <td>
                            <p><?php echo $links; ?></p>
                        </td>
                        <td>
                            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
                        </td>
                        </tfoot>
                    </table>

                    <?php
                } else {
                    ?>
                    <p class="text-center"> No unpaid loans</p>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
