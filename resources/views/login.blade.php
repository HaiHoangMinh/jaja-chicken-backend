<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin JaJaChicken</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
                body {
        margin: 0;
        padding: 0;
        background-color: #b88d17;
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
    </style>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input id="remember-me" name="remember_me" type="checkbox"></span>
                                <label for="remember-me" class="text-info"><span>Nhớ mật khẩu</span> <span>
                                </label>
                                <br/>
                                <div class="login-sub">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập">
                               
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




