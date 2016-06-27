<div id="page-wrapper" style="min-height: 356px">
    <div class="graphs">

        <div class="widget_5">

            <div class="col-md-10  widget_1_box2">
                <div class="wid_blog">
                    <h1>Change Password</h1>
                    <?php echo validation_errors();?>
                </div>

                <div class="panel-body">
                    <?php
                    $att = array(
                        'class' => 'form-horizontal',
                        'role' => 'form'
                    );
                    echo form_open('Member/resetPassword', $att);
                    ?>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Current Password</label>
                        <div class="col-md-8">
                            <div class="input-group input-icon right">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="password" name="current" class="form-control1" placeholder="Current Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">New Password</label>
                        <div class="col-md-8">
                            <div class="input-group input-icon right">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="password" name="new" class="form-control1" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Confirm Password</label>
                        <div class="col-md-8">
                            <div class="input-group input-icon right">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="password" name="confirm" class="form-control1" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input type="submit"  value="Change" class="btn-success btn">
                                
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="clearfix"> </div>
            </div>
        </div>


        <div class="clearfix"> </div>
    </div>
    <div class="copy_layout">
        <p>Copyright © 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
    </div>
</div>

</div>