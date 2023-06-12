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
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <link rel="stylesheet" href="CSS/viewAdds.css">
    <!-- Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>
    <script src="JavaScript/slideShow.js"></script>
  </head>
  <body onload="currentSlide(1)" class="bg-white">

  <?php 
    session_start();
    $_SESSION['advert'];
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
                    <a class="nav-link" href="#">News & Updates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
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
    <?php 
    require_once('Database/db_connnection.php');
    $sql = "SELECT * FROM advert a, postimage p, user u WHERE a.addID = p.addID and u.userID = a.userID AND a.addID = ".$_SESSION['advert'];   ///$_SESSION['advert']
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
  ?>


    <div class="contain">
        <div class="mySlides ">
          <div class="numbertext">1 / 5</div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image1"]); ?>" style="height: 350px; width: auto;" class="justify-content-center">
        </div>

        <div class="mySlides">
          <div class="numbertext">2 / 5</div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image2"]); ?>" style="height: 350px; width: auto;" class="justify-content-center">
        </div>

        <div class="mySlides">
          <div class="numbertext">3 / 5</div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image3"]); ?>" style="height: 350px; width: auto;" class="justify-content-center">
        </div>

        <div class="mySlides">
          <div class="numbertext">4 / 5</div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image4"]); ?>" style="height: 350px; width: auto;" class="justify-content-center">
        </div>

        <div class="mySlides">
          <div class="numbertext">5 / 5</div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image5"]); ?>" style="height: 350px; width: auto;" class="justify-content-center">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

        <!-- Thumbnail images -->
    <div class="container">
      <div>
        <div class="row row-cols-3 justify-content-center">
          <img class="demo cursor" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image1"]); ?>" style="height: 100px; width: auto;" onclick="currentSlide(1)">
          <img class="demo cursor" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image2"]); ?>" style="height: 100px; width: auto;" onclick="currentSlide(2)">
          <img class="demo cursor" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image3"]); ?>" style="height: 100px; width: auto;" onclick="currentSlide(3)">
          <img class="demo cursor" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image4"]); ?>" style="height: 100px; width: auto;" onclick="currentSlide(4)">
          <img class="demo cursor" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image5"]); ?>" style="height: 100px; width: auto;" onclick="currentSlide(5)">
        </div>
      </div>
    </div>

    <div class="container">
      <hr>
    </div>

    <div class="container">
      <div>
        <h1 class="display-6"><?php echo $row["brand"]." ".$row["model"]." ".$row["yearOfMan"] ?></h1>
        <br>
        <h4 class="text-muted"><?php echo $row["conditionType"] ?></h4>
        <br>
        <table>
        <tr>
            <td><p class="">Advertiesment ID: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo "NMADV".$row["addID"] ?></p></td>
          </tr>
          <tr>
            <td><p class="">Brand: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["brand"] ?></p></td>
          </tr>
          <tr>
            <td><p class="">Model: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["model"] ?></p></td>
          </tr>
          <tr>
            <td><p class="">Year of Manifactured: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["yearOfMan"] ?></p></td>
          </tr>
          <tr>
            <td><p class="">Engine Capacity: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["engineCapacity"] ?> CC</p></td>
          </tr>
          <tr>
            <td><p class="">Fuel: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["fuelType"] ?></p></td>
          </tr>
          <tr>
            <td><p class="">District: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["distric"] ?></p></td>
          </tr>
          <tr>
            <td><p class="">Price: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class=" text-muted"><?php echo "LKR. ".$row["price"].".00" ?></p></td>
          </tr>
          <tr>
            <td><p class="">Description: </p></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><p class="text-muted"><?php echo $row["discription"] ?></p></td>
          </tr>
        </table>

      </div>
    </div>

    <?php
      }
    }
    ?>
    </div>


    <br><br><br>

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