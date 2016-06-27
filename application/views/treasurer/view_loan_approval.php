<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center"> Loans To Approval</h3>
            <div class="bs-example4" data-example-id="contextual-table">

                <?php
                if (count($requests)) {
                    ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <th>Loan Status</th>
                        <th>National ID</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Amount</th>
                        <th>Approve Loan</th>
                        </thead>
                        <?php
                        $val = 0;
                        foreach ($requests as $row) {
                            
                            if ($row->status == 0) {
                                $val = +1;
                                ?> 

                                <tr>
                                    <td>  
                                        <?php
                                        $no = $row->status;
                                        if ($no == 0) {
                                            echo "Not yet Approved";
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
                                    <td><?php echo anchor('Treasurer/processLoanRequestAccept/' . $row->id, 'Approve', array('class' => 'btn btn-default')); ?></td>
                                </tr>
                                <?php
                            } else {
                               
                            }
                        }
                        ?>
                    </table>
                    <p class="lead text-center"><?php 
                    if($val < 1){
                      echo "Currently there are no loans to approve";   
                    }
                    ?></p>
                    <?php
                   
                } else {
                    ?>
                    <p class="lead text-center">No loans to approve</p>
                    <?php
                }
                ?>



            </div>
        </div>
    </div>
</div>
