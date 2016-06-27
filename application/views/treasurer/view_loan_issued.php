<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center"> Issued Loans</h3>
            <div class="bs-example4" data-example-id="contextual-table">


                <table class="table">
                    <thead>
                    <th>Loan Status</th>
                    <th>National ID</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Amount</th>
                    <th>Issued By</th>
                    </thead>
                    <?php
                    foreach ($requests as $row) {
                        if ($row->status == 2) {
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
                                    } elseif ($no == 4) {
                                        echo 'UnPaid';
                                    } elseif ($no == 5) {
                                        echo 'Paid';
                                    } else {
                                        echo "Rejected";
                                    }
                                    ?> </td>
                                <td><?php echo $row->nationalId; ?></td>
                                <td><?php echo $row->surname; ?></td>
                                <td><?php echo $row->firstname; ?></td>
                                <td><?php echo $row->middlename; ?></td>
                                <td><?php echo $row->amount; ?></td>
                                <td>
                                    <p>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('member');
                                        $this->db->where('member_id', $row->member_issuer_id);
                                        $query = $this->db->get();
                                        $res = $query->row();
                                        echo $res->firstname;
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
