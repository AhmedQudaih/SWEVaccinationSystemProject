<!DOCTYPE html>
<?php
 session_start();
include_once '../BusinessLogic/User.php';
if (isset($_POST['botton'])) {
    $User = new User();
    $ID = $_POST['Userid'];
    $Password = $_POST['userpass'];
    $result = $User->Login($ID, $Password);
    if ($result == true) {
        header("location: Home.php");
    }
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="Design.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <style>
        html {
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        body {
            height: 100%;
            width: 100%;
            background-image: url("img/aaa.jpeg");
            background-size: cover;

        }

        .nav-link {
            font-size: 1.2em;
        }

        hr.light {
            border-top: 1px solid #d5d5d5;
            width: 75%;
            margin-top: .8rem;
            margin-bottom: 1rem;
        }
    </style>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <img src="img/Immunization.gif" alt="eroor" style="width: 50px;
                 height: 50px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
          
        </div>
        </nav>
        <form class="" id="loginform" tabindex="-1" role="dialog" aria-labelledby="loginlabel" method="POST">
            <div class="modal-dialog form-dark" role="document">
                <div class="modal-content card card-image" style="background-image: url('img/aaa.jpeg');background-position: center;
                     background-repeat: no-repeat;
                     background-size: cover;
                     position: relative;">
                    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                        <div class="modal-header text-center pb-1">
                            <h3 class="modal-title w-100 text-dark font-weight-bold" id="loginlabel">
                                <strong>Login</strong> </h3>
                        </div>
                        <div class="modal-body">
                            <div class="md-form mb-3 was-validated">
                                <input type="text" name="Userid" class="form-control validate text-dark" required>
                                <label for="user-id">Your ID</label>
                            </div>
                            <div class="md-form pb-3 ">
                                <div class="was-validated">
                                    <input type="password" name="userpass" class="form-control validate text-dark" required>
                                    <label for="Form-pass5">Your password</label>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="text-center mb-3 col-md-12">
                                    <button type="submit" name="botton" class="btn btn-secondary btn-block btn-rounded z-depth-1">Sign
                                        in</button>
                                </div>
                            </div>
                            <div class="options text-center">
                                <p class="text-dark">Not a Member? <a href="Registration.php" class="text-primary">SiGN
                                        UP</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
