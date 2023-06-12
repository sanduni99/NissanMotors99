<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>
    <!-- Import Bootstrap v5.0.2-->
    <link rel="stylesheet" href="Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import CSS files-->
    <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <link rel="stylesheet" href="CSS/sample.css">
    <!-- Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>
  </head>
  <body>

  <?php 
    session_start();

  ?>
    <header>
        <div class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #147f8f;">
            <div class="container-fluid">
              <img src="Images/icon/logo.png" alt="" height="45px"> &nbsp;&nbsp;
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="news.php">News & Updates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                  </li>
                </ul>
                </div>
                <div class="d-flex justify-content-end">
                  <ul class="navbar-nav ">
                    
                    <?php
                      if(empty($_SESSION['userID'])){
                          echo('<li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>');
                      }
                      else{
                          if($_SESSION["type"]=="Admin"){
                            $type = "admin-panel.php";
                          } 
                          else {
                            $type = "user-panel.php";
                          }
                          echo('<li class="nav-item">
                                      <div class="btn-group">
                                          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">'.$_SESSION["name"].'
                                          </a>
                                          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                          <li><a class="dropdown-item" href="'.$type.'">Profile</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                          </ul>
                                      </div>
                                  </li>');
                      }
                    ?>

                  </ul>
                </div>
            </div>
        </div>
    </header>

    <br><br><br>
    <div class="container">
        <h2 class="h1">About us</h2>
        <br>
        <p class="blockquote text-muted">Nissan Motors PVT LTD was established in 1980 with the vision to provide professional and 
                    quality automobile servise to sri lankan customers.We have been able to secure a standard and well - best car dealer facility in a central province of kandy,
                    katugasthota. We are an car dealer company that is set to compete in the highly competitive and fragmented car dealer industry in 
                    Sri Lanka .Nissan Motors  (PVT) Ltd.is a vision to provide professional and quality automobile services to the sri lankan customers.and
                    We are an agency that sells all types of vehicles.The company always has experienced staff and knowledgeable office staff to set standardized prices
                    for vehicles. And we are pleased to sell the highest quality vehicles currently available online in Sri Lanka with a guarantee of reliability.
                    We want to reach the level of complete customer satisfaction as well. </p>
        <br>
        <p class="blockquote text-muted">No matter how difficult the challenge or how long the process, we do our best to make our valuable customer achieve their goals, own that dream car.
                    It’s our policy to work closely with each client with a sense of commitment on a long term basis to ensure that the best practices are integrated into its operations.
                    We only get vehicles that are rigorously tested to ensure they are of the highest quality. We carry out rigorous quality inspection of used cars before selling them.
                    A unique grading system ensures the standard of the vehicle which helps the customer to determine the condition of the vehicle. Apart from that, 
                    all the vehicles we receive are closely checked by our expert automobile engineers to confirm the quality & the standard before it’s released for sales.
                    We always believe in a TRUSTED PARTNERSHIP. And We will continue to serve our valuable customers as a true seller with the aim of assisting customers to meet their requirements. </p>
        <br>
        <p class="blockquote text-muted">Contact: 081-4940813</p>
        <p class="blockquote text-muted">Contact: 077-4362019</p>
        <br>
        <p class="blockquote text-muted">Address: No.288, Katugasthota Road, Kandy.</p>
    </div>

    <div class="container d-flex justify-content-center">
      <div class="mapouter">
        <div class="gmap_canvas">
          <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%20288%20Katugasthota&t=&z=17&ie=UTF8&iwloc=&output=embed" 
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://2piratebay.org"></a><br>
            <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style>
        </div>
      </div>
    </div>

    </body>
</html>
