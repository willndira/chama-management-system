<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Add Event</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <div class="panel">
                    <div class="panel-header">
                        <h3 class="panel-title text-center">
                            Set Day to pay Contribution
                        </h3>

                    </div>
                    <?php echo validation_errors(); ?>
                    <?php
                    $att = array(
                        'class' => 'form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern',
                        'novalidate' => 'novalidate',
                        'ng-submit' => 'submit()'
                    );
                    echo form_open('Admin/add_schedule', $att);
                    ?>
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label normal">Date Due</label>
                            <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" placeholder="Year/Month/Date" placeholder="YYYY/MM/DD" id="datepicker" name="date" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Amount</label>
                            <input type="text" name="amount" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" ng-model="model.number" ng-pattern="/[0-9]/" required="">
                            <p class="help-block hint-block">Numeric values from 0-*** in kShs</p>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </fieldset>
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <div class="col-md-12 graphs">
        <div class="xs">
            
            <<div class="col-md-12 stats-info stats-info1">
                <div class="mailbox-content">
                    <h3 class="text-center">Schedule Notification</h3>
                </div>

                <?php
                if (count($events)) {
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Schedule Due</th>
                                <th>Schedule Amount</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($events as $row) {
                                ?>
                                <tr class="active">
                                    <th scope="row">
                                        <?php echo date('F d, Y ', $row->schedule_date); ?>
                                    </th>
                                    <td class="info"><?php echo $row->schedule_amount; ?></td>

                                    <td class="info">
                                        <?php
                                        $att = array('class' => 'btn-warning btn');
                                        echo anchor('Admin/deleteSchedule/'.$row->schedule_id, 'Delete', $att);
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    <h3 class="text-center">No  Notification Found</h3>
                    <?php
                }
                ?>  

            </div>
        </div>
    </div>
</div>
