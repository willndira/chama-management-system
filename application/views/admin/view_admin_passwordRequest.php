<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Change Password</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (isset($password)) {
                    ?>
                    <?php echo validation_errors(); ?>
                    <table class="table table-bordered">
                        <thead>
                        <th>National ID</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>New Password</th>
                        <th>Confirm New Password</th>
                        <th>Change Password</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($password as $row) {
                                echo form_open('Admin/resetPassword');
                                echo form_hidden('nationalId', $row->nationalId);
                                ?>
                                <tr>
                                    <td><?php echo $row->nationalId; ?></td>
                                    <td><?php echo $row->surname; ?></td>
                                    <td><?php echo $row->firstname; ?></td>
                                    <td><?php echo $row->middlename; ?></td>
                                    <td><input type="password" name="pass"/></td>
                                    <td><input type="password" name="pass2"/></td>
                                    <td><input type="submit" value="Change" class="btn btn-default"/></td>
                                </tr>
                                <?php
                                echo form_close();
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                } else {
                    ?>
                    <p class="lead">No password change request.</p>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
