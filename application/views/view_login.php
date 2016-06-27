
    <body id="login">
        <div class="login-logo">
            <a href="index.html"><img src="images/logo.png" alt=""/></a>
        </div>
        <h2 class="form-heading">login</h2>
        <div class="app-cam">
             <?php 
                
                echo validation_errors();
                ?>
                <?php echo form_open('Site/verifyLogin'); ?>
                <input type="text" class="text" value="National ID" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'National ID';
                        }">
                <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Password';
                        }" name="password">
                <div class="submit"><input type="submit" value="Login"></div>
              
                <ul class="new">
                    <li class="new_left"><p><a href="<?php echo base_url('index.php/Site/reset_account');?>">Forgot Password ?</a></p></li>
                   
                    <div class="clearfix"></div>
                </ul>
            </form>
        </div>
        <div class="copy_layout login">
            <p>Copyright &copy; 2015  | Design by William Ndira </p>
        </div>

