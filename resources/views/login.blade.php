<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập JAJA-Admin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: red; /* For browsers that do not support gradients */
        background-image: linear-gradient(to bottom right, red, rgb(248, 164, 164));
        height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
        margin-top: 60px;
        max-width: 600px;
        height: 420px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
        border-radius: 25px;
        }
        #login .container #login-row #login-column #login-box #login-form {
        padding: 50px;
        
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -30px;
        }
        .login-sub{
            padding-top: 15px;
        }
        .text-alert {
            color: red;
            font-size: 17px;
            width: 100%;
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Đăng nhập tài khoản Admin</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            @csrf
                            <h3 class="text-center text-info">Đăng nhập</h3>
                            
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="username" name="username" id="username" class="form-control" required
                                <?php $username = Session::get('admin_username');
                                if(isset($username)) echo 'value = "' . $username . '"'?>>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required
                                <?php $password = Session::get('admin_password');
                                if(isset($password)) echo 'value = "' . $password . '"'?>>
                            </div>
                            <div class="form-group">
                                
                                <input id="" name="remember_me" type="checkbox"></span>
                                <label for="" class="text-info"><span>Nhớ mật khẩu</span> <span>
                                </label>
                                <br/>
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<center><span class="text-alert">'.$message.'</span></center>';
                                    Session::put('message',null);
                                }                           
                                ?>
                            </div>
                                <div class="login-sub">
                                    <center>
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập">
                                    </center>
                               
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




