<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Edit Loan Info</h3>
            <div class="bs-example4" data-example-id="contextual-table">

                <?php
                if (count($loan_info)) {
                    ?>
                    <p class="error"><?php echo validation_errors(); ?></p>
                    <?php echo form_open('Admin/editLoanInfo'); ?>
                    <?php echo form_hidden('loan_id', $loan_info->loan_id); ?>
                    <table class="table">
                        <thead>
                        <th>Loan Interest</th>
                        <th>Member Min loan</th>
                        <th>Member Max loan</th>
                        <th>Loan Issue Status</th>
                        <th>Edit</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="interest" class="input-small" value="<?php echo$loan_info->loan_interest; ?>"required/></td>
                                <td><input type="text" name="min" class="input-small" value="<?php echo $loan_info->loan_min; ?>"required/></td>
                                <td><input type="text" name="max" class="input-small" value="<?php echo $loan_info->loan_max; ?>" required/></td>
                                <td>
                                    <select name="status">
                                        <option value="0" <?php if ($loan_info->loan_issue_status == 0) echo 'selected'; ?>>No</option>
                                        <option value="1" <?php if ($loan_info->loan_issue_status == 1) echo 'selected'; ?>>Yes</option>
                                    </select>
                                </td>
                                <td><input type="submit" value="Edit" class="btn btn-default"/></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>.
                    <?php
                } else {
                    echo 'No loan Information found to edit';
                }
                ?>

            </div>
        </div>
    </div>
</div>
