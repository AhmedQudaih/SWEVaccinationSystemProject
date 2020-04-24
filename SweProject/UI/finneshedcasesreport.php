<!DOCTYPE html>
<?php
 session_start();
if((isset($_SESSION['StaffId']) && ($_SESSION['TypeID']!=1 && $_SESSION['TypeID'] != 2)) || !isset($_SESSION['Name'])){
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
  <title>Finished Cases Report</title>
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
    ::-webkit-scrollbar {
      width: 1px;
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
  <div class="card-group">
  <div class="card">
      <div class="card-body">
          <h3 class=" text-center">Finished Cases Report</h3>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Parent Name</th>
                  <th scope="col">Baby Name</th>
                  <th scope="col">dose code</th>
                </tr>
              </thead>
              <tbody>
                <?php
            include_once '../BusinessLogic/FinishedCases.php';
            $Finished= new FinishedCases();
            $finishedResult=$Finished->FinishedCaseReport();
                                   foreach ($finishedResult as $row) {
                                       echo '<tr>';
                                       echo '<td>'.$row['PatientSSN'].'</td>';
                                       echo '<td>'.$row['Name'].'</td>';
                                       echo '<td>'.$row['BabyName'].'</td>';
                                       echo '<td>'.$row['VaccinationId'].'</td>';
                                   echo '</tr>';}
                                        ?>
              </tbody>
            </table>
      </div>
  </div>
  <div class="card">
      <div class="card-body">
          <h3 class=" text-center">Doses Report</h3>
          <div id="piechart"></div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            // Load google charts
            google.charts.load('current', { 'packages': ['corechart'] });
            google.charts.setOnLoadCallback(drawChart);
            // Draw the chart and set the chart values
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Doses', 'Number of Patients'],
                            <?php 
                            include_once '../BusinessLogic/Financial.php';
                            $FinancialR= new Financial();
                           $Num= $FinancialR->FinancialReportDoses();
                            foreach ($Num as $row) {
                                        echo "['".$row['VaccinationId']."',".$row['COUNT(VaccinationId)'].'],';
                            }?>
                        ]);
              // Optional; add a title and set the width and height of the chart
              var options = {'width': 900, 'height': 500 };
              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
          </script>
      </div>
  </div>
</div>
</div>
  
</body>

</html>