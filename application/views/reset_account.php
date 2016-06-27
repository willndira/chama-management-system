
<body id="login">
    <div class="xs">
        <div class="col-md-6 col-lg-offset-2">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Change password.</h3>
                </div>
                <p class="lead">
                    Please enter your National Identification number and consult with<br>
                    administrator for new password.
                </p>
                <?php echo validation_errors(); ?>
                <?php echo form_open('Site/changePassword'); ?>
                <table class="table table-bordered">
                    <tr>
                        <td>National Identification</td>
                        <td><input type="text" name="nationalId"/></td>
                        <td><input type="submit" value="Proceed"/></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>