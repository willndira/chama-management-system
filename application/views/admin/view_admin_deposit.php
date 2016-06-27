<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Select member to view member's deposit</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <h4 align="center"></h4>
                <?php
                if (count($members)) {
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>First name</td>
                                <td>Middle name</td>
                                <td>Last name</td>
                                <td>Gender</td>
                                <td>Date of birth</td>
                                <td>Type of User</td>
                                <td>National ID</td>
                                <td>Select</td>
                            </tr>
                        </thead>
                        <?php
                        foreach ($members as $row) {
                            ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $row->firstname; ?></td>
                                    <td><?php echo $row->middlename; ?></td>
                                    <td><?php echo $row->surname; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->dob; ?></td>
                                    <td><?php echo $row->type; ?></td>
                                    <td><?php echo $row->nationalId; ?></td>
                                    <td><?php echo anchor('Admin/depositAccount/' . $row->member_id . '', 'Select'); ?></td>
                                </tr>
                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                } else {
                    echo 'No members found';
                }
                ?>

            </div>
        </div>
    </div>
</div>
