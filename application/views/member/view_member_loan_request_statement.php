<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Loan Request Statement</h3>
            <div class="bs-example4" data-example-id="contextual-table">

                <table class="table">
                    <thead>
                    <th>Request Date</th>
                    <th>Amount</th>
                    <th>Loan status</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($requests as $row) {
                            ?>
                            <tr>
                                <td><?php echo date('F d, Y ', strtotime($row->request_date)); ?></td>
                                <td><?php echo $row->amount; ?></td>
                                <td>
                                    <?php
                                    $no = $row->status;
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
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>