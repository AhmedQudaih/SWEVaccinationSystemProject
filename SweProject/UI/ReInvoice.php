<!DOCTYPE html>
<?php
 session_start();
if((isset($_SESSION['StaffId']) && $_SESSION['TypeID']!=3) || !isset($_SESSION['Name'])){
    header("location: login.php");
    
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
    <title>Re-Price</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        background-image: url("img/260322.jpg");
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

    * {
        box-sizing: border-box;
    }

    .columns {
        float: left;
        width: 33.3%;
        padding: 8px;
    }

    .price {
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        -webkit-transition: 0.3s;
        transition: 0.3s;
    }

    .price:hover {
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2)
    }

    .price .header {
        background-color: #111;
        color: white;
        font-size: 25px;
    }

    .price li {
        border-bottom: 1px solid #eee;
        padding: 20px;
        text-align: center;
    }

    .price .grey {
        background-color: #eee;
        font-size: 20px;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    @media only screen and (max-width: 1150px) {
        .columns {
            width: 100%;
        }
    }


    .form-control-borderless {
        border: none;
    }

    .modal.right .modal-dialog {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
    }

    .modal.right .modal-content {
        min-height: 100vh;
        border: 0;
    }

    .form-control-borderless:hover,
    .form-control-borderless:active,
    .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }

    .carrd {
        background-image: url("/static/rainwall.jpg");
        background-size: cover;
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
                <?php
                include_once '../BusinessLogic/User.php';
                $user= new User();
                $data=$user->getUserPermisiions();
                echo '<ul class="navbar-nav ml-auto">';
                foreach ($data as $row){
                    echo'<li class="nav-item active">';
                    echo'<a class="nav-link" href="'.$row['url'].'">'.$row['LinkName'].'</a>';
                    echo '</li>';
                     }echo '</ul>';
                ?>
        </div>
    </nav>
    <form class="" id="re-priseform" tabindex="-1" role="dialog" aria-labelledby="re-priseLabel" method="POST" action="">
        <div class="modal-dialog form-dark" role="document">
            <div class="modal-content card card-image" style="background-image: url('img/260322.jpg');background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;">
                <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                    <div class="modal-header text-center pb-1">
                        <h3 class="modal-title w-100 text-dark font-weight-bold" id="re-priseLabel">
                            <strong>Re</strong> </h3>
                    </div>
                    <div class="modal-body">
                        <div class="md-form mb-3 was-validated">
                            <input type="text" name="Form-id" class="form-control validate text-dark " required
                                placeholder="ID">
                        </div>
                        <div class="md-form pb-3 ">
                            <div class="was-validated">
                                <input type="text" name="Form-new" class="form-control validate text-dark" required
                                    placeholder="New">
                            </div>
                        </div>
                        <div class="container">
                              <label class="radio-inline text-dark">
                                  <input type="radio" name="re"  value="Price" >Re-Price
                              </label>
                              <label class="radio-inline text-dark">
                                  <input type="radio" name="re"  value="Salary">Re-salary
                              </label>
                          </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="text-center mb-3 col-md-12">
                                <button role="button"class="btn btn-danger btn-block btn-rounded z-depth-1" 
                                type="submit">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php 
include_once '../BusinessLogic/Financial.php';
    $message="Failed";
    $salaryOrPrice="";
if (isset($_POST['re']))
{
$salaryOrPrice = $_POST['re'];
}
if (isset($_POST['Form-id']))
{
$id = $_POST['Form-id'];
}
if (isset($_POST['Form-new']))
{
$new = $_POST['Form-new'];
}    
     $financial= new Financial();
    if($salaryOrPrice == "Salary"){
        $result= $financial->SetNewSalary($id, $new);
        if ($result!== true){
            echo $message ;
        }
            
    }else if ($salaryOrPrice == "Price") {
       $result=$financial->SetNewPrice($new, $id); 
       if ($result!== true){
            
            echo $message ;
        }
    }
    
?>