<?php
include("../connection/validate.php");
include("../connection/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        .login-form-2 {
            padding: 5%;
            background: #344885;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            max-width: 500px;
            width: 400px;
        }

        .login-form-2 h3 {
            text-align: center;
            color: #fff;
        }

        .login-container form {
            padding: 10%;
        }

        .btnSubmit {
            width: 35%;
            border-radius: 1rem;
            padding: 5px;
            border: none;
            cursor: pointer;
        }

        .login-form-2 .btnSubmit {
            font-weight: 600;
            color: #344885;
            background-color: #fff;
        }

        .login-form-2 .ForgetPwd {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="container login-container">
        <div class="row">
            <div class="col-md-15 login-form-2">
                <h3>Login</h3>
                <form method="POST" action="../connection/validate.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Username *" value="" name="username" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" name="password" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="login" />
                    </div>
                    <div class="form-group">

                        <a href="../index.html" class="ForgetPwd" value="back">Kembali Ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>