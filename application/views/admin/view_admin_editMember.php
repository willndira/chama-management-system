<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3 class="text-center">Edit Group Member</h3>
            <div class="bs-example4" data-example-id="contextual-table">
                <?php
                if (count($member)) {
                    ?>
                    <div class="tab-pane fade in active">
                        <?php echo form_open('Admin/editMemberDetails'); ?>
                        <table class=" table">
                            <tr>
                                <td></td>
                                <td><?php echo form_hidden('member_id', $member->member_id); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">First name: *</td>
                                <td><input type="text" name="firstName"  value="<?php echo $member->firstname; ?>"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">Middle name: *</td>
                                <td><input type="text" name="middleName" value="<?php echo $member->middlename; ?>" /></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">Last name: *</td>
                                <td><input type="text" name="surName" value="<?php echo $member->surname; ?>"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">Gender: *</td>
                                <td>
                                    <select name="gender" value="gender" >
                                        <option value="non" <?php if ($member->gender == "non") echo 'selected'; ?>>Not Specified</option>
                                        <option value="male" <?php if ($member->gender == "male") echo 'selected'; ?>>Male</option>
                                        <option value="female" <?php if ($member->gender == "female") echo 'selected'; ?>>Female</option>
                                    </select>

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">Date of birth: *</td>
                                <td><input type="date" name="dob" value="<?php echo $member->dob; ?>" /></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">National id: *</td>
                                <td><input type="text" name="nationalId" value="<?php echo $member->nationalId; ?>"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="right">Type of user: *</td>
                                <td >
                                    <select name="type">
                                        <option value="member" <?php if ($member->type == "member") echo 'selected'; ?>>Member</option>
                                        <option value="admin" <?php if ($member->type == "admin") echo 'selected'; ?>>Admin</option>
                                        <option value="admin" <?php if ($member->type == "treasurer") echo 'selected'; ?>>Treasurer</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Submit" /></td>
                                <td></td>
                            </tr>
                        </table>
                        <?php echo form_close(); ?>

                    </div>
                    <?php
                } else {
                    echo 'No Member selected';
                }
                ?>



            </div>
        </div>
    </div>
</div>
