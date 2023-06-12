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

    if(empty($_SESSION['name'])||empty($_SESSION['userID'])||empty($_SESSION['type'])){
      $_SESSION['name'] = ""; //User name
      $_SESSION['userID'] = ""; //UserID
      $_SESSION['type'] = ""; //User Type (Admin or User)
      $_SESSION['advert'] = ""; //Advert ID passing
    }

    if(isset($_POST['btnGo'])){
      $_SESSION['advert'] = $_POST['addID'];
      echo "<script>window.top.location='viewAdds.php'</script>";
    }
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
                    <form class="d-flex justify-content-end" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search" name="Search">
                        <button class="btn btn-light" type="submit" name="btnSearch">Search</button>
                    </form>
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
    <div class="welcome-div">
        <div class="text_Welcome">
            <h1 class="display-1 text-center whitetxt"><strong>Nissan Motors PVT (LTD)</strong></h1>
            <h3 class="display-6 text-center whitetxt"><i><strong>Buy your dream car...</strong></i></h3>
        </div>
    </div>


    <div class="divider_ex">
        <article class="bg-img-2 super-box-3 color-1 stellar">

            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="grid_6">
                            <div class="col">
                                <div>
                                    <div class="box-3_extension bg-color-3 circle">
                                        <span class="icon-3 fa fa-thumbs-o-up"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="box-3">
                                        <div class="box-3_section-1 text-7">
                                          Best &amp;<br><span class="text__thin">Quality</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="grid_6">
                            <div class="col">
                                <div>
                                    <div class="box-3_extension bg-color-5 circle">
                                        <span class="icon-4 fa fa-thumbs-o-up"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="box-3">
                                        <div class="box-3_section-1 text-7">
                                            Best<br><span class="text__thin">Prices</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="grid_6">
                            <div class="col">
                                <div>
                                    <div class="box-3_extension bg-color-5 circle">
                                        <span class="icon-5 fa fa-taxi"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="box-3">
                                        <div class="box-3_section-1 text-7">
                                            Luxury<br><span class="text__thin">Cars</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="grid_6">
                            <div class="col">
                                <div>
                                    <div class="box-3_extension bg-color-5 circle">
                                        <span class="icon-6 fa fa-fighter-jet"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="box-3">
                                        <div class="box-3_section-1 text-7">
                                            Quick<br><span class="text__thin">Services</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


    <div class="adds">
        <?php 
            $search = "";
            if(isset($_POST['btnSearch'])){
              if($_POST['Search']=="" ){
                $search = "";
              }
              else{
                $search = $_POST['Search'];
              }
            }
        ?>
        <h2 class="text-dark" name="content_headline"><?php if($search ==""){echo "All advertiesments"; } else { echo "Searching results of ".$search; } ?></h2><br>
        <div class="row row-cols-4 justify-content-center">
        <?php
            require_once('Database/db_connnection.php');
            $x=1;
            $rpp = 50;
            $maxNo= $x * $rpp;
            $minNo= $maxNo - $rpp;

            for($n = $minNo; $n < $maxNo; ++$n){
              $sql = "SELECT * FROM `advert` WHERE `status`= 'Posted'AND (`conditionType` LIKE '%".$search."%' OR `brand` LIKE '%".$search."%' OR `model` LIKE '%".$search."%') ORDER BY `date` DESC LIMIT ".$n.",1";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $sql1 = "SELECT * FROM `postimage` WHERE `addID` = ". $row['addID'];
                  $result1 = mysqli_query($conn, $sql1);
                  if (mysqli_num_rows($result) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
                      //$addCount = $row['COUNT(`addID`)'];
        ?>
                        
                      <form method="post">
                        <div class="card" style="width: 18rem;">
                          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['image1']);?>" class="card-img-top">
                          <div class="card-body">
                            <h3 class="text-center text-dark"><?php echo $row['brand']." ".$row['model'] ;?></h3>
                            <p class="text-center text-secondary"><?php echo $row['conditionType'] ?></p>
                            <input type="hidden" name="addID" value="<?php echo $row['addID'] ?>">
                            <button type="Submit" name="btnGo" class="btn btn-primary">Open</button>
                          </div>
                        </div>
                      </form><br>
        <?php
                    }
                  }
                }
              }
            } 
        ?>
        </div>
        <br>
        <div class="justify-content-center">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
    </div>

    	      <!--about contact-->
  <div class="divider5" id="divider5" style="background-color: #c3c7c2;">
        <br><br>
      <div class="container-fluid">
          <div class="row row-cols-auto justify-content-center">

                <div class="col">
                    <div class="row">
                        <h1 class="tc text-dark">Contact Us</h1>
                    </div>
                    <div class="row">
                        <p class="display-5 tc text-dark">+94 77 436 2019</p>
                    </div>
                </div><br>

                <!--<div class="col">
                    <div class="row">
                        <h1 class="tc">Send Us</h1>
                    </div>
                    <div class="row">
                        <p class="blockquote tc">tangallebudgettaxi@gmail.com</p>
                    </div>
                </div><br>-->

                <div class="col">
                    <div class="row">
                        <h1 class="tc text-dark">Find Us</h1>
                    </div>
                    <div class="row">
                        <p class="display-5 tc text-dark">Kandy, Sri Lanka.</p>
                    </div>
                </div><br>

            </div>
        </div>
        <br><br>
    </div>

    <!-- Bothelp.io widget -->
    <script type="text/javascript"> !function()
        {var e={"buttons":[{"type":"whatsapp","token":"+94774362019"},
                          {"type":"email","token":"nissanmotors@gmail.com"},
                          {"type":"sms","token":"+94774362019"},
                          {"type":"call","token":"+94774362019"}],
        "color":"#E84A4A","position":"right","bottomSpacing":"",
        "callToActionMessage":"Hi, Chat with us!","displayOn":"everywhere","lang":"en"},
        t=document.location.protocol+"//bothelp.io",o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=t+"/widget-folder/widget-page.js",
        o.onload=function(){new BhWidgetPage.init(e)};var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(o,n)}();</script>


    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
    </footer>
  </body>
</html>