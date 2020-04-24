<!DOCTYPE html>
<?php
 session_start();
if((isset($_SESSION['StaffId']) && $_SESSION['TypeID']!=2) || !isset($_SESSION['Name'])){
    header("location: login.php");
    
}
include_once '../BusinessLogic/Nurse.php';
include_once '../BusinessLogic/FinishedCases.php';
include_once '../BusinessLogic/Appointment.php';
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
    <title>Appointments</title>
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
    <!--Table-->
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">dose code</th>
            <th scope="col">Mark As Checked</th>
            <th scope="col">Reschedule</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $NurseApp= new Nurse();
            $Appointment=$NurseApp->NurseAppointment(date("Y/m/d"));
                                   foreach ($Appointment as $row) {
                                       echo '<tr>';
                                       echo '<td>'.$row['PatientSSN'].'</td>';
                                       echo '<td>'.$row['Name'].'</td>';
                                       echo '<td>'.$row['BabyName'].'</td>';
                                       echo '<td>'.$row['VaccinationId'].'</td>';
                                       echo '<td><form method="POST" action="#">
                                             <button type="submit" name="subb" class="btn btn-outline-warning">Check</button> 
                                             </form></td>';
                                            if (isset($_POST['subb'])){
                                            $SetFinishedCase= new FinishedCases();
                                            $FinishedCase=$SetFinishedCase->SetFinishedCase($row['PatientSSN']);}
                                               
                                       echo '<td><form method="POST" action="#"> <bottom class="btn btn-outline-danger " href="#"
                                       data-toggle="modal" role="button"  data-target="#RescheduleModel">Reschedule</bottom>
                                        <div id="RescheduleModel" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container"style=" padding-left: 0px; padding-right: 0px;">
                        <div class="card text-center">
                            <div class="card-header">Reschedule </div>
                            <div class="card-body">
                              <h5 class="card-title">Insert New Date</h5>
                              <form class="form-inline" action="#" method="POST">
                                  <div class="form-group" style=" margin-left: 130px;margin-right: 40px;">
                                        <input type="date" name="New_Date"  class="form-control" id="New_Date" placeholder="New Date">    
                                  <input type="hidden" name="ID" value="'.$row['PatientSSN'].'">
                                  </div>
                                  <button type="submit" name="sub" class="btn btn-danger" style="
                                 margin-left: 150px;
                                  margin-right: 150px;
                                  padding-left: 50px;
                                  padding-right: 50px;
                                  margin-top: 5px;">Submit</button>
                              </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
</form></td>';


if (isset($_POST['sub']))
{
$Appointment = new Appointment();
$ID=$_POST['ID'];
$NewDate = $_POST['New_Date'];
$PatientReschedule=$Appointment->Reschedule($ID, $NewDate);
}
echo '</tr>';}
?>
</tbody>
</table>
</body>
</html>
