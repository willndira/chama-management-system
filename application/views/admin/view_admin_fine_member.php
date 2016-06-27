<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Fine Member</h3>
            <?php
            if (count($user)) {
                ?>
                <div class="col_3">
                    <div class="col-md-12 widget widget1">
                        <div class="r3_counter_box">
                            <div class="stats">
                                <table class="table">
                                    <thead>
                                    <th>Surname:</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>National ID</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $user->surname; ?></td>
                                            <td><?php echo $user->firstname; ?></td>
                                            <td><?php echo $user->middlename; ?></td>
                                            <td><?php echo $user->nationalId; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="well1 white">
                    <?php echo validation_errors(); ?>
                    <?php
                    $att = array(
                        'class' => 'form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern',
                        'novalidate' => 'novalidate',
                        'ng-submit' => 'submit()'
                    );
                    echo form_open('Admin/fine_submit', $att);
                    echo form_hidden('member_id', $user->member_id);
                    ?>
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label normal">Date Due</label>
                             <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" placeholder="Year/Month/Date" id="to" name="date" required>
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

                <?php
            } else {
                echo 'No member found';
            }
            ?>

        </div>
        <div class="copy_layout">
            <p>Copyright © 2015</p>
        </div>
    </div>
</div>