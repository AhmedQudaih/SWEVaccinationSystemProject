<!DOCTYPE html>
<?php
 session_start();
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
    <title>Registration</title>
</head>
<style>
    html {
        height: 100%;
        width: 100%;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    body {
        height: 100%;
        width: 100%;
        background-image: url("img/mmmmm.jpeg");
        background-size: cover;

    }

    .center {
        margin: auto;
        width: 45%;
        padding: 10px;
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
             <?php if(isset($_SESSION['StaffId']) ){
                
                include_once '../BusinessLogic/User.php';
                $user= new User();
                $data=$user->getUserPermisiions();
                echo '<ul class="navbar-nav ml-auto">';
                foreach ($data as $row){
                    echo'<li class="nav-item active">';
                    echo'<a class="nav-link" href="'.$row['url'].'">'.$row['LinkName'].'</a>';
                    echo '</li>';
             }echo '</ul>';}
                ?>
        </div>
    </nav>
    <div class="card-group center ">
        <form class="text-center border-light p-5 was-validated " id="formeval" action="" method="POST">
            <div class="card bg-ligh mb-3" style="background-image: url('img/mmmmm.jpeg');background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;">
                <div class="card-header">
                    <p class="h4 mb-4">Registration</p>
                </div>
                <div class="card-body">
                    <div class="form-row mb-2 ">
                        <div class="col">
                            <!-- BABY name -->
                            <input type="text" name="babyname" class="form-control " placeholder="baby name" required>
                        </div>
                        <div class="col">
                            <!-- DAD name -->
                            <input type="text" name="dadname" class="form-control" placeholder="dad name"required>
                        </div>
                        <div class="col">
                            <!-- SSN name -->
                            <input type="text" name="BabySSN" class="form-control" placeholder="BabySSN" required>
                        </div>
                    </div>
                    <!-- E-mail -->
                    <input type="email" name="user-email" class="form-control mb-4" placeholder="E-mail" required>
                    <!-- BirthDay number -->
                    <input type="date" name="user-birthday" class="form-control" placeholder="BirthDay"
                        aria-describedby="defaultRegisterFormageHelpBlock"  required>
                    
                    <br>
                   <!-- Password -->
                    <input type="password" name="user-password" class="form-control" placeholder="Password"
                        aria-describedby="defaultRegisterFormPasswordHelpBlock" required >
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Minimum eight characters, at least one uppercase letter, one lowercase letter and one number
                    </small>
                    <!-- Newsletter -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter" required>
                        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Accept the Terms and
                            Conditions</label>
                        <button class="btn btn-info my-4 btn-block btn-primary" name="botton" type="submit">Sign up</button>
                    </div>
                    <div class="options text-center">
                        <p class="pt-1">Already have an account? <a href="login.html" class="blue-text">LogIn</a></p>
                    </div>
                </div>
            </div>
        </form>
</body>
</html>
<?php 
include_once '../BusinessLogic/User.php';
   
if (isset($_POST['botton']))
{
    $User= new User();
    $BabyName = $_POST['babyname'];
    $Name = $_POST['dadname'];
    $PatientSSN = $_POST['BabySSN'];
    $Password = $_POST['user-password'];
    $Email = $_POST['user-email'];
    $BirthDate = $_POST['user-birthday'];
    $result=$User->Registration($PatientSSN,$BabyName , $Name, $Email,$Password,$BirthDate);
} 
 ?>

