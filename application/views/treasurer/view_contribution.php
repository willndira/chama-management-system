<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center"> Select a member to make contribution</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php echo form_open('Treasurer/contributions'); ?>
                <div class="input-group">
                    <input type="text" name="search" class="form-control1 input-search" placeholder="Search....">
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- Input Group -->
                </form>
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
                                <td>Select for deposit</td>
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
                                    <td><?php echo anchor('Treasurer/member_contribution/' . $row->member_id . '', 'Select'); ?></td>
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
