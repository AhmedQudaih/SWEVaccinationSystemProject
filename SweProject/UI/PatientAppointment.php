<!DOCTYPE html>
<?php
 session_start();
if((isset($_SESSION['StaffId']) && $_SESSION['TypeID']!=0) || !isset($_SESSION['Name'])){
    header("location: login.php");
    
}
include_once '../BusinessLogic/Appointment.php';
$Appointment = new Appointment();
$PatientDoseAndDate=$Appointment->PatientAppointmentDoseAndDate($_SESSION['PatientSSN']);
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
  <title>Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    background-image: url("img/rainwall.jpg");
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
  .form-control-borderless {
    border: none;
  }
  .form-control-borderless:hover,
  .form-control-borderless:active,
  .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
  }
  .carrd {
    background-size: cover;
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
  p {
    text-align: center;
    font-size: 60px;
    margin-top: 0px;
  }
</style>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <img src="img/Immunization.gif" style="width: 50px;
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
                     }
                     echo'<li class="nav-item">
                      <a class="nav-link" data-toggle="modal" data-target="#PreviasDosesModal" href="#">Previas Doses</a>
                      </li>';
                     echo '<li class="nav-item">
                      <a class="nav-link" data-toggle="modal" data-target="#AskDoctorModal" href="#">Ask Doctor</a>
                      </li>';
                     
                     echo '</ul>';
                ?>
        
        </div>
  </nav>
  <!--Appointment-->
  <div class="col-20 center">
    <div class="carrd ">
      <div class="card-body" style="padding:2%">
        <div class="container">
          <br />
          <div class="card-body">
              <h1 class="card-title " style="text-align: center; padding:2%">Welcome <?php echo $_SESSION['Name'];?></h1>
            <h5 class="card-text" style="text-align: center; ">Your next dose is:<br /> <?php echo $PatientDoseAndDate['user1']['Vaccination type'];?><br /> Date: <br /><?php echo $PatientDoseAndDate['user1']['AppDate'];?><br />
              your timer</h5>            
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9">
              <form class="card bg-transparent text-dark">
                <div class="card-body row no-gutters align-items-center" style="padding: 5px">
                  <div class="col-auto">
                  </div>
                  <div class="col bg-transparent text-dark">
                    <!-- Display the countdown timer in an element -->
                    <p id="demo"></p>
                    <script>
                      // Set the date we're counting down to
                      var countDownDate = new Date <?php echo '("'.$PatientDoseAndDate['user1']['AppDate'].'")';?> .getTime();
                      // Update the count down every 1 second
                      var x = setInterval(function () {
                        // Get today's date and time
                        var now = new Date().getTime();
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        // Display the result in the element with id="demo"
                        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                          + minutes + "m " + seconds + "s ";
                        // If the count down is finished, write some text
                        if (distance < 0) {
                          clearInterval(x);
                          document.getElementById("demo").innerHTML = "EXPIRED";
                        }
                      }, 1000);
                    </script>
                  </div>
                </div>
            </div>
            <!--Reschedule-->
            <div class="col-auto">
              <a class="btn btn-outline-danger "
                style="padding-left: 40px;padding-right: 40px;padding-top: 5px;padding-bottom: 5px;margin-top: 0px;margin-right: 200px;margin-left: 200px;"
                href="#" data-toggle="modal" role="button" data-target="#RescheduleModel">Reschedule</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <div id="RescheduleModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="container" style="padding-left: 0px; padding-right: 0px;">
          <div class="card text-center">
            <div class="card-header">Reschedule </div>
            <div class="card-body">
              <h5 class="card-title">Insert New Date</h5>
              <form class="form-inline" action="#" method="POST">
                <div class="form-group" style=" margin-left: 130px;margin-right: 40px;">
                  <input type="date" name="New_Date" class="form-control" id="New_Date" placeholder="New Date"> 
                        <?php
                        if (isset($_POST['New_Date']))
                            {
                            $NewDate = $_POST['New_Date'];
                            $PatientReschedule=$Appointment->Reschedule($_SESSION['PatientSSN'], $NewDate);
                            }
                        ?>
            </div>
                <button type="submit" class="btn btn-danger"
                  style="margin-left: 150px; margin-right: 150px; padding-left: 50px; padding-right: 50px; margin-top: 5px;">Submit</button>
              </form>
            </div>
            <div class="card-footer text-muted">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Pr-Doses-->
  <div class="modal fade" id="PreviasDosesModal" tabindex="-1" role="dialog" aria-labelledby="PreviasDosesLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PreviasDosesLabel">Previas Doses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Dose Code</th>
              </tr>
            </thead>
            <tbody>
                <?php   
                $DosesHistory=$Appointment->PatientDosesHistory($_SESSION['PatientSSN']);
                foreach ($DosesHistory as $Dose ){
                    echo '<tr>';
                    echo '<td>'.$Dose['VaccinationId'].'</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--CommonQuestions-->
  <div class="modal fade right" id="AskDoctorModal" tabindex="-1" role="dialog" aria-labelledby="CommonQuestionsLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-info">
          <h5 class="modal-title" id="CommonQuestionsLabel">Common Questions</h5>
        </div>
        <div class="modal-body">
            <?php
            include_once '../BusinessLogic/CommonQuestion.php';
            $CommonQ = new CommonQuestion();
            $ViewQ=$CommonQ->ViewCommonQuestion();
            foreach ($ViewQ as $Question){
                echo '<h6>'.$Question['CommonQuestions'].'</h6><hr>';                 
            }
            ?>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          <a class="btn btn-danger" href="mailto:webmaster@example.com" role="button" style="align-content: center">Ask Doctor</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


