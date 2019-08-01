<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Oppa Studio - Login</title>

    <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico" type="image/x-icon">
    <link href="<?=base_url()?>assets/plugins/material/font/font-roboto.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/plugins/material/font/font-material-icon.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link href="<?=base_url()?>assets/plugins/material/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/material/node-waves/waves.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/material/animate-css/animate.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/material/css/style.css" rel="stylesheet">
</head>
<style type="text/css">
    .animate-me {
        animation: 40s infinite bgcolorchange;
    }
    @keyframes bgcolorchange {
        0% {color: red;}
        25% {background: green;}
        50% {background: red;}
        75% {background: blue;}
        100% {background-color: #00BCD4;}
    }
    @-webkit-keyframes bgcolorchange {
        0%   {background: blue;}
        25%  {background: yellow;}
        50%  {background: red;}
        75%  {background: green;}
        100% {background: #00BCD4;}
    }
</style>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <small></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="loginForm" method="POST" enctype="multipart/form-data">
                    <center><img height="160" width="320" src="<?=base_url()?>assets/images/logo.png"></center>
            
                    <div class="msg"><h4>Login Admin Oppa Studio</h4></div>
                    <?=@$message?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?=set_value('username')?>" autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?=set_value('password')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button name="signin" id="signin" value="signIn" class="btn btn-block bg-primary waves-effect">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>assets/plugins/material/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/material/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/plugins/material/node-waves/waves.js"></script>
    <script src="<?=base_url()?>assets/plugins/material/js/admin.js"></script>

    <script type="text/javascript">
        /*Form resubmission handler (cleaner)*/
        window.onload = function() {
            history.replaceState("", "", document.URL);
        }
    </script>
</body>

</html>