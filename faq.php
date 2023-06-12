<!doctype html>
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
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <link rel="stylesheet" href="CSS/faq-css.css">
    <!-- Import JavaScript files-->
	<script src="JavaScript/faq.js" type="text/javascript"></script>
    
    </head>
    <body>
      
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
    <!------------------------- Faq start -------------------------------------------- -->
        <main> <br><br><br>
            <h1 class="faq-heading">FAQ'S</h1><hr>

            <section class="faq-container">

                <div class="faq-one">
                    <h5 class="faq-page">What time do you usually open?</h5>
                    <div class="faq-body">
                        <p>Our comany generally open at 8.00am to 5.00pm. during the weekdays and only for the weekends we 
                            open shop at 9.00pm to 5.00pm. We recommend you to reach our branch by 5.00pm to avoid any hassle
                            or delay.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-two">
                    <h5 class="faq-page">Why should I choose your dealership?</h5>
                    <div class="faq-body">
                        <p>We're best dealers at this area. And we care about the each of our customers having the most personalized experience possible. You won’t be another number to us. Instead, you can trust our experienced staff to provide the attentive and individual service you deserve for your automotive needs.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">Is this online price and real price an estimated?</h5>
                    <div class="faq-body">
                        <p>We provide real offers, both online and in-store, and all of our If you have an online offer to redeem, bring  Once we verify that your car’s condition matches the information we received online, you’ll leave with payment in hand. Some offers are adjusted after the verification process.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">Can I reschedule my appointment?</h5>
                    <div class="faq-body">
                        <p>Yes, you can change your appointment time, date . Simply  Alternatively, you can call our customer helpline number at 1234 5678  and we will reschedule your appointment for you.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">Will you charge me for my car's inspection?</h5>
                    <div class="faq-body">
                        <p>No,  inspection process at all  is absolutely free.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">What all do you check during the inspection of my car?</h5>
                    <div class="faq-body">
                        <p>Our used car inspection process is fair and thorough to ensure an objective standardized report that gives a clear view of the condition of your car. We start with a document check and test drive and then use the latest tools to assess the exterior, tires, engine, transmission, interiors and electricals. We also inspect the steering mechanism, suspension, brakes and accessories of your car during the test drive. Feel free to ask any questions from our team at the branch
                        <br> Original RC (Mandatory)
                        <br> Insurance Certificate / Cover Note / Policy
                        <br> Original Invoice
                        <br> Duplicate Keys
                        <br> Service Manual
                        <br> Last Service Receipt
                        </p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">Does your company sell any type of car?</h5>
                    <div class="faq-body">
                        <p>Yes, We provide any brannd of cars.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">Do you accept the Cash or Money order?</h5>
                    <div class="faq-body">
                        <p>We both accept the cash and money orders.</p>
                    </div>
                </div>

                <hr class="hr-line">

                <div class="faq-three">
                    <h5 class="faq-page">Do You Sell Accidented Vehicles?</h5>
                    <div class="faq-body">
                        <p>We will decide one after a discussion with the management of our organization.</p>
                    </div>
                </div>

            </section>
        </main>
    <br><br><br><br>
    <!------------------------- Faq End -------------------------------------------- -->
    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
    </footer>
    </body>
</html>