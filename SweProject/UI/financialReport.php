<!DOCTYPE html>
<?php    
 session_start();
if((isset($_SESSION['StaffId']) && ($_SESSION['TypeID']!=1 && $_SESSION['TypeID'] != 3)) || !isset($_SESSION['Name'])){
    header("location: login.php"); 
}
include_once '../BusinessLogic/Financial.php';
$FinancialR= new Financial();
$FinancialReport = $FinancialR->FinancialReport();
$Num= $FinancialR->FinancialReportDoses();

                                    
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
    <title>Financial Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    html {
    height: 100%;
    width: 100%;
    overflow-x: hidden;
    
  }
  ::-webkit-scrollbar {
      width: 1px;
      }

    body {
        height: 100%;
        width: 100%;
        background-image: url("img/mmmmm.jpeg");
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
    .scrollable {
  height: 250px;
  overflow-y: scroll;
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
                <h4 class="text-center">STATEMENT</h4>
                <ul class="price">
                    <div class="columns">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>DOSES</td>
                                    <?php 
                                    $Sum=$FinancialR->FinancialReportDosesSum();
                                    echo '<td>'.$Sum.'$</td>';?>
                                </tr>
                                <tr>
                                    <td>Salaries</td>
                                    <?php echo '<td>'.$FinancialReport['1']['user1']['SUM(Salary)'].'$</td>';?>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <?php $total= $Sum - $FinancialReport['1']['user1']['SUM(Salary)'];
                                        echo '<td>'.$total.'$</td>';?>
                                </tr>
                            </tbody>
                        </table>
                </ul>
            </div>
        </div>
        <div class="card scrollable"  >
            <div class="card-body " style="height: 200px; ">
                <ul class="price">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                   <?php
                                   foreach ($FinancialReport[0] as $row) {                                      
                                       echo '<tr>';
                                       echo '<td>'.$row['VaccinationId'].'</td>';
                                       echo '<td>'.$row['Vaccination type'].'</td>';
                                       echo '<td>'.$row['Price'].'</td>';
                                       echo '</tr>';
                                   }
                                        ?>
                            </tbody>
                        </table>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-group">
        <div class="card">
            <div class="card">
            <div class="card-body">
                <h3 class=" text-center">Doses Report</h3>
                <div id="piechart" style="margin-left: 35px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', { 'packages': ['corechart'] });
                    google.charts.setOnLoadCallback(drawChart);
                    // Draw the chart and set the chart values
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Doses', 'Number of Patients'],
                           
                            <?php foreach ($Num as $row) {
                                        echo "['".$row['VaccinationId']."',".$row['COUNT(VaccinationId)'].'],';
                                       }?>
                        ]);
                        // Optional; add a title and set the width and height of the chart
                        var options = { 'width': 1700, 'height': 500 };
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
