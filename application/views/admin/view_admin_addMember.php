<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Add Member</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                
                <?php
                $att = array("class" => "form-horizontal");
                echo form_open('Admin/addMbr', $att);
                ?>

                <table class="table">
                    <tr>
                        <td align="right">First name: *</td>
                        <td><input type="text" name="firstName"  value="<?php echo set_value('firstName'); ?>"/></td>
                        <td><?php echo form_error('firstName'); ?></td>
                    </tr>
                
                    <tr>
                        <td align="right">Middle name: *</td>
                        <td><input type="text" name="middleName" value="<?php echo set_value('middleName'); ?>" /></td>
                        <td><?php echo form_error('middleName'); ?></td>
                    </tr>
                
                    <tr>
                        <td align="right">Last name: *</td>
                        <td><input type="text" name="lastName" value="<?php echo set_value('lastName'); ?>" /></td>
                        <td><?php echo form_error('lastName'); ?></td>
                    </tr>
                    
                     <tr>
                        <td align="right">Registration Amount: *</td>
                        <td><input type="text" name="amount" value="<?php echo set_value('amount'); ?>" /></td>
                        <td><?php echo form_error('lastName'); ?></td>
                    </tr>
             
                    <tr>
                        <td align="right">Gender: *</td>
                        <td>
                            <select name="gender">
                                <option value="non">Not Specified</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                        </td>
                        <td><?php echo form_error('gender'); ?></td>
                    </tr>
               
                    <tr>
                        <td align="right">Date of birth: *</td>
                        <td>

                            <input type="text" id="datepicker" name="dob"  value="<?php echo set_value('dob'); ?>"/></td>
                        <td><?php echo form_error('dob'); ?></td>
                    </tr>
                  
                    <tr>
                        <td align="right">National id: *</td>
                        <td><input type="text" name="nationalId" value="<?php echo set_value('nationalId'); ?>"/></td>
                        <td><?php echo form_error('nationalId'); ?></td>
                    </tr>
                 
                    <tr>
                        <td align="right">Type of user: *</td>
                        <td >
                            <select name="type">
                                <option value="member">Member</option>
                                <option value="admin">Admin</option>
                                <option value="treasurer">Treasurer</option>
                            </select>
                        </td>
                        <td><?php echo form_error('type'); ?></td>
                    </tr>
               

                    <tr>
                        <td align="right">Password: *</td>
                        <td><input type="password" name="password"  value="<?php echo set_value('password'); ?>"/></td>
                        <td><?php echo form_error('password'); ?></td>
                    </tr>
                    <tr>
                        <td align="right">Confirm Password: *</td>
                        <td><input type="password" name="password_conf" /></td>
                        <td><?php echo form_error('password_conf'); ?></td>
                    </tr>
             
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit" class="btn-success btn" /></td>
                        <td></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
