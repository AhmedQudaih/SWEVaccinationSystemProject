<!DOCTYPE html>
<?php
 session_start();
if(!isset($_SESSION['Name'])){
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
    <title>Home</title>
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
    }

    footer {
        background-color: #3f3f3f;
        color: #d5d5d5;
        padding-top: 2rem;
        width: 100%;
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
    .nav-link {
        font-size: 1.2em;
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
    <!--body-->
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Welcome <?php echo $_SESSION['Name'];?></h5>
            <p class="card-text">After the provision of safe food, water and sanitation,
                the most important public health measure in the world is vaccination.
                Parents want to do everything possible to make sure their children are healthy and protected from
                preventable diseases.
                Vaccination is the best way to do that ,it's safe and effective. </p>

        </div>

        <div class="card bg-dark text-white">
            <img src="img/vaccinati.jpg" class="card-img" alt="...">
            <div class="card-img-overlay">
            </div>
        </div>

    </div>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Why vaccinate your baby?</h5>
                <p class="card-text">All the diseases that your child is protected against are serious diseases and by
                    immunising your child, you are also ensuring better protection for the population...</p>
                    <img src="img/Time-to-Immunize-logo.png" alt="eroor" style="
                    width: 150px;border-left-width: 0px;margin-left: 100px;">
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">How does Vaccination Work? </h5>
                <p class="card-text">Vaccinations work by boosting the immune system's ability to fight certain infections. The vaccination teaches your child's immune system to recognize and fight specific germs so that when they are exposed to them, he or she has a much lower risk of getting sick..</p>
                <img src="img/kill.jpg_large" alt="eroor" style="width: 155px; height: 90px; margin-left: 100px; ">
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Our System</h5>
                <p class="card-text">the key to a successful and well-run medical practice is efficient and effective patient care Medical practices are moving away from paper charts and moving towards the software programs.<br>
                    Our system will help parents to save a lot of time and make it easier to reserve appointments, follow up vaccination, doses and reschedule appointments It will also help to overcome many problems such as queues and forgetting the appointments...
                </p>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white">
        <br>
        <div class="card-img-overlay">
        </div>
    </div>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Childhood Vaccination Program</h5>
                <p class="card-text">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">TIME OF VACCINATION</th>
                                <th scope="col">VACCINE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Birth</td>
                                <td>Hep B (Hepatitis B) 1st dose​<br>
                                    ​BCG (Bacillus Calmette-Guerin)</td>
                            </tr>
                            <tr>
                                <td>1 month</td>
                                <td>Hep B 2nd dose</td>
                            </tr>
                            <tr>
                                <td>​3 months</td>
                                <td>DTP-Polio (Diphtheria, Tetanus, Pertussis-Polio) 1st dose</td>
                            </tr>
                            <tr>
                                <td>​4 months</td>
                                <td>DTP-Polio 2nd dose</td>
                            </tr>
                            <tr>
                                <td>​5 months</td>
                                <td>​DTP-Polio 3rd dose</td>
                            </tr>
                            <tr>

                                <td>6 months</td>
                                <td>Hep B 3rd dose</td>
                            </tr>
                            <tr>
                                <td>​12–24 months</td>
                                <td>MMR (Measles, Mumps, Rubella) 1st dose</td>
                            </tr>
                            <tr>
                                <td>​18 months</td>
                                <td>DTP-Polio 1st booster</td>
                            </tr>
                        </tbody>
                    </table>
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">After your appointment </h5>
                <p class="card-text">
                    Most people don’t have any serious side effects from vaccines. The most common side effects are
                    usually mild. They include:<br>
                    <ul>
                        <li> Pain, swelling, or redness where the shot was given</li>
                        <li> Mild fever</li>
                        <li> Chills</li>
                        <li>Feeling tired</li>
                        <li> Headache</li>
                        <li>Muscle and joint aches</li>
                    </ul>
                        If you have mild side effects, you can take steps to help you feel better. For example:<br><br>
                        <ul>
                        <li> Drink lots of fluids.</li>
                        <li> Put a cool, wet washcloth on places where you’re sore.</li>
                        <li> If your doctor approves, you can take a non-aspirin pain reliever.</li>
                        <li> If your arm is sore after getting the shot, try moving your arm around — it can help with
                            pain and swelling.</li>
                        </ul>
                        It’s very unlikely that you will have serious side effects from a vaccine. If you have any
                            symptoms that concern you after you get vaccinated, call your doctor.
                </p>
               
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="img/Immunization.gif" style="width: 50px;
                height: 50px">
                    <hr class="light">
                    <p>02 73737373</p>
                    <p>www.helwan.edu.eg</p>
                    <p>Software Engineering</p>
                    <p>Cairo, Egypt</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Our Table</h5>
                    <hr class="light">
                    <p>Sunday: 9am - 4pm</p>
                    <p>Monday: 9am - 6pm</p>
                    <p>Tuesday: 9am - 4pm</p>
                    <p>Thursday: 10am - 3pm</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Department</h5>
                    <hr class="light">
                    <a class="light" href="#" style=" text-decoration: none;color: inherit;">
                        <p>Patient Sector</p>
                    </a>
                    <a class="light" href="#" style=" text-decoration: none;color: inherit;">
                        <p>Doctor Sector</p>
                    </a>
                    <a class="light" href="#" style=" text-decoration: none;color: inherit;">
                        <p>Nurse Sector</p>
                    </a>
                    <a class="light" href="#" style=" text-decoration: none;color: inherit;">
                        <p>Financial Sector</p>
                    </a>
                </div>
                <div class="col-12">
                    <hr class="light">
                    <h5>&copy; Vaccination.com</h5>
                </div>
            </div>
        </footer>
</body>

</html>