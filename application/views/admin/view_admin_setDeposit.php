<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Amount to be Contributed</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php echo validation_errors(); ?>
                <?php echo form_open() ?>
                <table class="table table-bordered">
                    <thead>
                    <th>Amount to be Contribution</th>
                    <th></th>
                    </thead>
                    <tr>
                        <td><input type="text" name="amount" /></td>
                        <td><input type="submit" value="Submit" class="btn btn-default"/></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
