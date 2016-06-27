<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Amount to be Contributed</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Remind Members To pay contributions</h3>
                    </div>
                    <div class="panel-info">
                        <?php echo form_open(); ?>
                        <table>
                            <thead>
                            <th>Month to Pay</th>
                            <th>Remind</th>
                            </thead>
                            <tbody>
                            <td><input type="date" name="date" id="date"/></td>
                            <td><input type="submit" value="Remind" class="btn btn-default" required/></td>
                            </tbody>
                        </table>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
