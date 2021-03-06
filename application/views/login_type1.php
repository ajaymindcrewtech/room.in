<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>User  | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b>Login</a>
            </div>
            <!-- /.login-logo -->

            <div class="login-box-body">
                <div>
                  <label style="margin-left: 0px;">
                     <input name="login_type" class="emp" id=""  style="size:15px " type="radio"  value="a"/>
                     <span>Admin</span>
                  </label>

                  <label style="margin-left: 38px;">
                     <input name="login_type" class="emp" id="" checked="" style="size:15px " type="radio"  value="e"/>
                     <span>Employee</span>
                  </label>
              
                   <label style="margin-left: 35px;">
                   <input name="login_type" type="radio" class="emp" id=""   value="c"/>
                     <span>Customer</span>
                  </label>
               </div>
                <p class="login-box-msg"><?php if(! is_null($msg)) echo $msg;?></p>
              
                <?php //echo form_open(base_url('login/process')); ?>
                <form id="login_form" action="<?php echo base_url('login/emp') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="emailid" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                               
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                  
                    <div class="col-xs-4">
<!--                        <p>Username : admin@gmail.com</p>-->
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>
                <?php //echo form_close(); ?>
                    
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url() ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional

                });

                 
            });
                            
            
              $('.emp').on('ifChecked', function(){

                var id= $(this).val();
                // alert(id);
                   if(id=='c'){
                     $('#login_form').attr('action', "<?php echo base_url('login/cus') ?>");
                    // alert('c');
                   }
                   else if(id=='e'){
                     $('#login_form').attr('action', "<?php echo base_url('login/emp') ?>");
                    // alert('e');
                   }
                   else if(id=='a'){
                     $('#login_form').attr('action', "<?php echo base_url('login/process') ?>");
                     // alert('a');
                   }
                 });
            

          
        </script>
    </body>
</html>
