
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>
    <!-- Import Bootstrap v5.0.2-->
    <link rel="stylesheet" href="Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import CSS files-->
    <link rel="stylesheet" href="CSS/mainStyle.css">
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	  <link href="CSS/details.css" rel="stylesheet"> 
    <link rel="stylesheet" href="CSS/updates.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	  
    		
</head>


<body>
<?php
    session_start();
    if(isset($_POST['btnSubmit'])){
      require_once('Database/db_connnection.php');

        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['fileimage']['tmp_name']) && !empty($_POST('txtDiscription')) && !empty($_POST('txttopic')) && !empty($_POST('txtNewsID')) && !empty($_POST('txtuserID'))) {
                $img1 = addslashes(file_get_contents($_FILES['fileimage']['tmp_name']));
                $txtuserID = $_POST['txtuserID'];
                $txtNewsID = $_POST['txtNewsID'];
                $txttopic = $_POST['txttopic'];
                $txtDiscription = $_POST['txtDiscription'];
   
                $sql = "INSERT INTO `news` (`newsID`, `userID`, `topic`, `image`, `discription`) VALUES ('".$txtNewsID."', '".$txtuserID."', '".$txttopic."','".$img1."','".$txtDiscription."')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.alert("New record created successfully")</script>';
                } else {
                    $txt = "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo '<script>window.alert("' . $txt . '")</script>';
                }
            }
        }

        mysqli_close($conn);
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
                                  </li>');z
                      }
                    ?>

                  </ul>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Images/Image cars/1-7.jpg" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Images/Image cars/Low_ToyotaAllNewAqua-1-1.jpg" width="241" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Images/Image cars/20210719_04_02_s.jpg" width="237" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Images/Image cars/20210719_04_03_s.jpg" width="236" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Images/Image cars/20210719_04_05_s.jpg" width="237" height="109" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">TOYOTA AQUA NEW MODEL DEBUT IN AUG 2021</h3>
						<p class="product-description">Toyota says the new Aqua is the world’s first vehicle to use a high-output bipolar nickel-hydrogen battery as an electric drive battery. Compared to the nickel-hydrogen battery equipped to the previous-generation Aqua, the new battery realizes approximately twice the output.</p>
						<h4 class="price">current price: <span>$18000</span></h4>
						<div> <span class="product_info">
                          Engine1.5 Liter DOHC 16 Valve Inline-4 GearboxCVT Automatic Transmission<span><br><br> <span class="product_info">The Toyota Aqua 1st Generation can achieve an average of up to 37KM/L making for an estimated driving range of up to 1184KM from the compact hatchbacks 35 fuel tank.<span><br><br> <span class="product_info">1.5 Liter DOHC 16 Valve Inline-4                          99bhp@4000RPM<span><br><br> <span class="product_info">Very economical <br>
                          
						  fairly spacious<br> 
                          comfortable Interior<br> 
                          Good ride quality<span><br></div>
			
						
						<a href="#" onclick="window.print()" style="color:blue;" > GET REPORT </a>	
					</div>
				</div>
			</div>
		</div>
	</div>
							
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Images/Image cars/download (1).jfif" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Images/Image cars/Low_ToyotaAllNewAqua-1-1.jpg" width="241" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Images/Image cars/download (2).jfif" width="237" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Images/Image cars/download.jfif" width="236" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Images/Image cars/download (3).jfif" width="237" height="131" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">HONDA CIVIC 2021</h3>
						<p class="product-description">The 10th-generation Honda Civic hatch and sedan range entered 2021 unchanged, and for the last few months of its life its range has been trimmed and re-priced.</p>
						<h4 class="price">current price: <span>$16000</span></h4>
						<div> <span class="product_info">
                          Engine Type - Gas<span><br><br> <span class="product_info">Transmission-Continuously variable - speed automatic<span><br><br> <span class="product_info">Drive Type - Front wheel drive<span><br><br> <span class="product_info">Drive Type - Front wheel drive</span> <br><br> 
                          comfortable Interior<br> 
                          Good ride quality<span><br></div>
			
						
						<a href="#" onclick="window.print()" style="color:blue;" > GET REPORT </a>		
					</div>
				</div>
			</div>
		</div>
	</div>	
							
		<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Images/Image cars/spec_1.jpg" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Images/Image cars/Low_ToyotaAllNewAqua-1-1.jpg" width="241" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Images/Image cars/Nissan_X-Trail_-Auto-Shanghai-2021_front-side-1000x563-2.jpg" width="237" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Images/Image cars/Nissan_X-Trail_-Auto-Shanghai-2021_interior01-1000x568-1.jpg" width="236" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Images/Image cars/Nissan_X-Trail_-Auto-Shanghai-2021_front-1000x563-1.jpg" width="237" height="139" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">NISSAN’S NEW X-TRAIL FINALLY ANNOUNCED!DEBUT IN 2021</h3>
						<p class="product-description">On April 19, 2021, the new Nissan X-Trail was announced at the Shanghai Motor Show in China. The X-Trail, which is one of the most popular models in the SUV segment in China, is also the most important model in Nissan’s business structural reform “Nissan NEXT.</p>
						<h4 class="price">current price: <span>$180000</span></h4>
						<div> <span class="product_info">
                          Engine Type - Gas<span><br><br> <span class="product_info">Transmission-Continuously variable - speed automatic<span><br><br> <span class="product_info">Drive Type - Front wheel drive<span><br><br> <span class="product_info">Drive Type - Front wheel drive</span> <br><br> 
                          comfortable Interior<br> 
                          Good ride quality<span><br></div>
			
						
						<a href="#" onclick="window.print()" style="color:blue;" > GET REPORT </a>		
					</div>
				</div>
			</div>
		</div>
	</div>
							
		<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Images/Image cars/5.jpg" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Images/Image cars/2 (1).jpg" width="258" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Images/Image cars/3.jpg" width="258" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Images/Image cars/4.jpg" width="258" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Images/Image cars/1.jpg" width="258" height="138" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">NISSAN ARIYA SUV DEBUT! 2019 TOKYO MOTOR SHOW: NISSAN ARIYA CONCEPT</h3>
						<p class="product-description">The Ariya Concept offers a spacious, premium cabin with high-tech features and a body that conveys the pure, clean nature of electric cars. It embodies the Nissan Intelligent Mobility vision of personal transportation – one where electrification and vehicle intelligence will offer seamless and adaptive travel experiences free of accidents or harmful emissions.</p>
						<h4 class="price">current price: <span>$15000</span></h4>
						<div> <span class="product_info">Type - AC synchronous electric generator<span><br><br> <span class="product_info">Total voltage	(V) - 355<span><br><br> <span class="product_info">otal power	(kWh) - 71.4<span><br><br> <span class="product_info">Steering - 	Rack Assist Type electric Power Steering (EPS)</span> <br><br> 
                          comfortable Interior<br> 
                          Good ride quality<span><br></div>
			
						
						<a href="#" onclick="window.print()" style="color:blue;" > GET REPORT </a>		
					</div>
				</div>
			</div>
		</div>
	</div>	
							
		<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Images/Image cars/HONDA E DEBUT SOON! THE HONDA E IS A NEW TYPE OF ELECTRIC VEHICLE (EV).jpg" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Images/Image cars/HONDA E DEBUT SOON! THE HONDA E IS A NEW TYPE OF ELECTRIC VEHICLE (EV)1.jpg" width="258" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Images/Image cars/Honda-e-Side-Camera.jpg" width="258" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Images/Image cars/002.jpg" width="258" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Images/Image cars/2023_Toyota_BZ4X_Limited_Windchill_Pearl_001-1-1500x1000.jpg" width="258" height="138" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">HONDA E DEBUT SOON! THE HONDA E IS A NEW TYPE OF ELECTRIC VEHICLE (EV)</h3>
						<p class="product-description">Honda’s commitment to electrification doesn’t stop with the innovative development of hybrid and plug-in hybrid vehicles. Battery electric will also play a part in the introduction of a comprehensive range of zero-emission vehicles in the coming years.</p>
						<h4 class="price">current price: <span>$180000</span></h4>
						<div> <span class="product_info">Type - AC synchronous electric generator<span><br><br> <span class="product_info">Total voltage	(V) - 355<span><br><br> <span class="product_info">otal power	(kWh) - 71.4<span><br><br> <span class="product_info">Steering - 	Rack Assist Type electric Power Steering (EPS)</span> <br><br> 
                          comfortable Interior<br> 
                          Good ride quality<span><br></div>
			
						
						<a href="#" onclick="window.print()" style="color:blue;" > GET REPORT </a>		
					</div>
				</div>
			</div>
		</div>
	</div>			
							
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Images/Image cars/TOYOTA UNVEILS NEW BZ4X ELECTRIC SUV DEBUT IN JULY 2021.jpg" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Images/Image cars/HONDA E DEBUT SOON! THE HONDA E IS A NEW TYPE OF ELECTRIC VEHICLE (EV)1.jpg" width="258" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Images/Image cars/Honda-e-Side-Camera.jpg" width="258" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Images/Image cars/002.jpg" width="258" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Images/Image cars/2023_Toyota_BZ4X_Limited_Windchill_Pearl_001-1-1500x1000.jpg" width="258" height="138" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">TOYOTA UNVEILS NEW BZ4X ELECTRIC SUV DEBUT IN JULY 2021</h3>
						<p class="product-description">Toyota’s all-electric bZ4X made its U.S. production model debut today. As a leader in electrification, Toyota’s introduction of bZ4X represents the first of a global series of battery-electric vehicles to be introduced under the global “Toyota bZ” brand umbrella.</p>
						<h4 class="price">current price: <span>$180000</span></h4>
						<div> <span class="product_info">Type - AC synchronous electric generator<span><br><br> <span class="product_info">Total voltage	(V) - 355<span><br><br> <span class="product_info">otal power	(kWh) - 71.4<span><br><br> <span class="product_info">Steering - 	Rack Assist Type electric Power Steering (EPS)</span> <br><br> 
                          comfortable Interior<br> 
                          Good ride quality<span><br></div>
			
						<div class="action">
							<button class="add-to-wishlist btn btn-default" type="button">Add to wishlist</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
						<a href="#" onclick="window.print()" style="color:blue;" > GET REPORT </a>		
					</div>
				</div>
			</div>
		</div>
	</div>								


    <div class="container">
		<br><br>
    <h2>News and Updates </h2><br>

    <div class="row row-cols-5 justify-content-center">

    <?php 
        if(isset($_POST['btnOpen'])){
            $_SESSION['news'] = $_POST['newsID'];
            echo "<script>window.top.location='newsViewer.php'</script>";
        }

        //DB connection
        require_once('Database/db_connnection.php');

        //Count number of News
        $sql = "SELECT COUNT(`newsID`) FROM `news`";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $noofNews = $row['COUNT(`newsID`)'];
            }
        }

        //Get IDs of news
        for($i = 0; $i < $noofNews; $i++){
            $sql = "SELECT `newsID` FROM `news` LIMIT ".$i.",1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $newsNumArray[$i] = $row["newsID"];
              }
            }
        }

        //Print News
        for($x = 0; $x < $noofNews; $x++){
            $sql = "SELECT * FROM `news` LIMIT ".$x.",1";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    ?>    
        <div>
        <form method="post">
            <div class="card" style="width: 18rem;">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="..." class="card-img-top" style= "width: 300px; height:auto;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['topic'] ?></h5>
                    <input type="hidden" name="newsID" value="<?php echo $row['newsID'] ?>">
                    <button type="submit" class="btn btn-primary" name="btnOpen">Open</button>
                </div>
            </div>
        </form>
	</div> &nbsp; &nbsp;

    <?php
            }
            }
        }
        mysqli_close($conn);
    ?>
	<br><br><br>
    </div></div>
		
<footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
</footer>
</body>
</html>
    