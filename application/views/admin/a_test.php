<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Group Deposit</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (count($allContribution)) {
                    ?>
                    <table class="table table-striped">
                        <thead>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Sort</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text"  placeholder="YYYY/MM/DD" id="datepicker" name="from" required></td>
                                <td><input type="text"  placeholder="YYYY/MM/DD" id="to" name="to" required></td>
                                <td><input type="submit" value="Sort" class="btn btn-default"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <th>Contribution Date</th>
                        <th>National Id</th>
                        <th>Sur Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Contribution Amount</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($allContribution as $row) {
                                ?>
                                <tr>
                                    <td><?php echo date('d-M-Y', strtotime($row->contribution_date)); ?></td>
                                    <td><?php echo $row->nationalId; ?></td>
                                    <td><?php echo $row->surname; ?></td>
                                    <td><?php echo $row->firstname; ?></td>
                                    <td><?php echo $row->middlename; ?></td>
                                    <td><?php echo $row->contribution_amount; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total is: <b><?php echo $total->total; ?></b></td>
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
    </div>
</div>
