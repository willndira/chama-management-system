<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">These are the requested loans by the member's</h3>
            <div class="bs-example4" data-example-id="contextual-table">

                <table class="table">
                    <thead>
                    <th>Loan Status</th>
                    <th>National ID</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Amount</th>
                    <th>Approve</th>
                    <th>Reject</th>
                    </thead>
                    <tbody>
                        <?php
                        $att = array(
                            'class' => 'btn btn-default'
                        );
                        foreach ($requests as $row) {
                            $no = $row->status;
                            if ($no == 0) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        if ($no == 0) {
                                            echo "No yet Approved";
                                        } elseif ($no == 1) {
                                            echo "Accepted";
                                        } elseif ($no == 2) {
                                            echo 'Issued';
                                        } elseif ($no == 3) {
                                            echo 'Rejected';
                                        } else {
                                            echo "Rejected";
                                        }
                                        ?>    
                                    </td>
                                    <td><?php echo $row->nationalId; ?></td>
                                    <td><?php echo $row->surname; ?></td>
                                    <td><?php echo $row->firstname; ?></td>
                                    <td><?php echo $row->middlename; ?></td>
                                    <td><?php echo $row->amount; ?></td>
                                    <td>
                                        <?php echo anchor('Treasurer/processLoanRequestAccept/' . $row->id, 'Approve', $att); ?></td>
                                    <td><?php echo anchor('Treasurer/processLoanRequestReject/' . $row->id, 'Reject', $att); ?></td>
                                </tr>
                                <?php
                            } else {
                                
                            }
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
