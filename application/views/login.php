<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RPL | Log in</title>
        <link href="<?php echo base_url('assets/css/bootstraps.min.css'); ?>" rel="stylesheet" >

        <link href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet"> 
        <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link id="base-style" href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo base_url('assets/css/style-responsive.css');?>" rel="stylesheet">
        <style type="text/css">
            body { background: url(assets/image/bg-login.jpg) !important; }
        </style>
    </head>
    <body>
        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                        <a href="#"><i class="fa fa-home"></i></a>
                        <a href="#"><i class="fa fa-cog"></i></a>
                    </div>
                <h2>Login to your account</h2>
                <form class="form-horizontal" action="<?php echo site_url('login/proses'); ?>" method="post">
                    <?php
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                        ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_login'); ?>
                        </div>    
                    <?php } ?>
                    <fieldset>
                    <div class="input-prepend">
                        <span class="add-on"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" class="input-large span10" placeholder="Username"/>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="input-large span10" placeholder="Password"/>
                    </div>
                    <div class="clearfix"></div>
                            
                    <label class="remember" for="remember"><input type="checkbox" id="remember" /> Remember me</label>

                    <div class="button-login">  
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="clearfix"></div>
                </form>                
                <hr>
                <h3>Forgot Password?</h3>
                <p>
                    No problem, <a href="#">click here</a> to get a new password.
                </p>    
</div>
</div>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>       
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>