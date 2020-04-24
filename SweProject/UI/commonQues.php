<!DOCTYPE html>
<?php
 session_start();
if((isset($_SESSION['StaffId']) && $_SESSION['TypeID']!=1) || !isset($_SESSION['Name'])){
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
    <title>Add Common Questions</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        background-image: url("img/assa.jpeg");
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
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
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
    <div class="col-20 center">
            <div class="carrd ">
                <div class="card-body" style="padding: 18%">
                    <div class="container">
                        <br />
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8">
                                <form class="card bg-transparent text-dark" method="POST" action="">
                                    <div class="card-body row no-gutters align-items-center" style="padding: 5px">
                                        
                                            <div class="col bg-transparent text-dark">
                                                <input
                                                    class="form-control form-control-lg form-control-borderless bg-transparent text-dark"
                                                    style="border-bottom:20px " type="text"
                                                    placeholder="Question" 
                                                    name="newquestion" id="NewQuestion">
                                                    <input
                                                    class="form-control form-control-lg form-control-borderless bg-transparent text-dark"
                                                    style="border-bottom:20px " type="text"
                                                    placeholder="Question ID" 
                                                    name="Questionid" id="Questionid">
                                            </div>
                                            <div class="col-auto">
                                                <button class=" btn btn-outline-danger" name="AddSub"type="submit" style="
                                                padding-left: 48px;
                                                padding-right: 48px;
                                                padding-top: 5px;
                                                padding-bottom: 5px;
                                                ">Add</button>
                                                  <div class="col-auto" style="
                                                  padding-left: 0px;
                                                  padding-right: 0px;
                                                  padding-top: 10px;
                                              ">
                                                    <button class=" btn btn-outline-danger"  name="DelSub" type="submit" style="
                                                    padding-left: 40px;
                                                    padding-right: 40px;
                                                    padding-top: 5px;
                                                    padding-bottom: 5px;">Delete</button>
                                            </div>
                                        </div>
                                    
                                        </div>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
include_once '../BusinessLogic/CommonQuestion.php';
    $message="Failed";
    $Common="";
    $Common= new CommonQuestion();

if (isset($_POST['AddSub']))
{
$NewQuestion = $_POST['newquestion'];
if($NewQuestion !== ""){
        $result= $Common->SetCommonQuestion($NewQuestion);
        if ($result!== true){
            echo $message ;
        } 
}}
if (isset($_POST['DelSub']))
{
$Questionid = $_POST['Questionid'];
if ($Questionid !== "") {
       $result=$Common->DeleteCommonQuestion($Questionid); 
       if ($result!== true){
            echo $message ;
        }
    }
}
     
   
    
?>
