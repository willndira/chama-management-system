<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Add Settings</h3>
            <div class="bs-example4" data-example-id="contextual-table">


                <p><?php echo validation_errors(); ?></p>
                <?php echo form_open('Admin/addLoanInfo'); ?>
                <table class="table ">
                    <thead>
                    <th>Loan Interest</th>
                    <th>Member Min loan</th>
                    <th>Member Max loan</th>
                    <th>Loan Issue Status</th>
                    <th>Edit</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="interest" class="input-small" required/></td>
                            <td><input type="text" name="min" class="input-small" required/></td>
                            <td><input type="text" name="max" class="input-small" required/></td>
                            <td>
                                <select name="status">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </td>
                            <td><input type="submit" value="Submit" class="btn btn-default"/></td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
