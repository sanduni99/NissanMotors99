
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
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>
	<link rel="stylesheet" href="Updates.css">
<title>News and Update</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">		
</head>
<body>

<?php
    session_start();
    if(isset($_POST['btnSubmit'])){
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "nissanmotodb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

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
        <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #147f8f;" >
            <div class="container-fluid">
              <p class="h5">Nissan Motors</p> &nbsp;&nbsp;
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../PPA Project/News Feed1.html">News & Updates</a>
                  </li>
				  	 
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                  </li>
                </ul>
                </div>
                <div class="d-flex justify-content-end">
                  <ul class="navbar-nav ">
                    <form class="d-flex justify-content-end">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                      <a class="nav-link" href="#">   Log in</a>
                    </li>
                  </ul>
                </div>
            </div>
          </nav>
    </header>

    <div class = "products">
        <div class = "container">
	                <h1 class = "lg-title">News and Updates</h1>
	                <div class = "product-items">
	                    <!-- single product -->
	                    <div class = "product">
	                        <div class = "product-content">
	                            <div class = "product-img">
	                                <img src = "Image cars/1-7.jpg" alt = "product image" height="203">
	                            </div>
	                        </div>
	                        <div class = "product-info">
	                            <div class = "product-info-top">
	                                <h2 class = "sm-title"></h2>
	                                
	                            </div>
	                            <a href = "#" class = "product-name">Toyota Aqua New Model Debut in Aug 2021</a>
							</div>
                            <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
  data-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>    

  <script>
      $(function () {
  $('.material-tooltip-main').tooltip({
    template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
  })
})
      </script>
	                    </div>
	                    <!-- end of single product -->
	                    <!-- single product -->
	                    <div class = "product">
	                        <div class = "product-content">
	                            <div class = "product-img">
	                                <img src = "Image cars/2.jpg" alt = "product image" height="199">
	                            </div>   
	                        </div>
	                        <div class = "product-info">
	                            <div class = "product-info-top">
	                                <h2 class = "sm-title"></h2>
	                                
	                            </div>
	                            <a href = "#" class = "product-name">Honda CIVIC 2021</a>
	                        </div>
							
			<button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
  data-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>    

  <script>
      $(function () {
  $('.material-tooltip-main').tooltip({
    template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
  })
})
      </script>
	                    </div>
	                    <!-- end of single product -->
	                    <!-- single product -->
	                    <div class = "product">
	                        <div class = "product-content">
	                            <div class = "product-img">
	                                <img src = "Image cars/200_2.jpg" alt = "product image" height="200">
	                            </div>
	                        </div>
	                        <div class = "product-info">
	                            <div class = "product-info-top">
	                                <h2 class = "sm-title"></h2>
	                            </div>
	                            <a href = "#" class = "product-name">Nissan’s new X-Trail finally announced!Debut in 2021</a>
	                        </div>
 <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
  data-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>    

  <script>
      $(function () {
  $('.material-tooltip-main').tooltip({
    template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
  })
})
      </script>
							
	                    </div>
	                    <!-- end of single product -->
	                    <!-- single product -->
	                    <div class = "product">
	                        <div class = "product-content">
	                            <div class = "product-img">
	                                <img src = "Image cars/for1-1.jpg" alt = "product image" height="199">
	                            </div>
	                        </div>
	                        <div class = "product-info">
	                            <div class = "product-info-top">
	                                <h2 class = "sm-title"></h2>  
	                            </div>
	                            <a href = "#" class = "product-name">Toyota Unveils New bZ4X electric SUV Debut in July 2021</a>
							</div>
					 <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
  data-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button> 
							  
	                    </div>
	                    <!-- end of single product -->
	                    <!-- single product -->
	                    <div class = "product">
	                        <div class = "product-content">
	                            <div class = "product-img">
	                                <img src = "Image cars/pra9.jpg" alt = "product image" height="198">
	                            </div>
	                        </div>
	                        <div class = "product-info">
	                            <div class = "product-info-top">
	                                <h2 class = "sm-title"></h2>  
	                            </div>
	                            <a href = "#" class = "product-name">Honda e Debut Soon! The Honda e is a new type of electric vehicle (EV)</a>
	                        </div>
	  <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
  data-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>    

  <script>
      $(function () {
  $('.material-tooltip-main').tooltip({
    template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
  })
})
      </script>					
	                    </div>
	                    <!-- end of single product -->
	                    <!-- single product -->
	                    <div class = "product">
	                        <div class = "product-content">
	                            <div class = "product-img">
	                                <img src = "Image cars/spec_1.jpg" alt = "product image" height="199">
								</div>
	                        </div>
	                        <div class = "product-info">
	                            <div class = "product-info-top">
	                                <h2 class = "sm-title"></h2>  
	                            </div>
	                            <a href = "#" class = "product-name">NISSAN ARIYA SUV Debut! 2019 Tokyo Motor Show: Nissan Ariya Concept</a>
	                        </div>
  <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
  data-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>   
	<?php
		//DB connection
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "nissanmotodb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
							
		if(!isset($_SESSION['txtNewsID'])){
		$txtuserID = $_POST['txtuserID'];
        $txtNewsID = $_POST['txtNewsID'];
		}
		$sql_Check = "SELECT * FROM	wishlist where txtuserId = $txtuserID AND NewsID = $txtNewsID";
		$result_check = mysql_query($conn,$sql_Check);
								
		if (mysqli_num_rows($result_check) == 1){
		echo 'product already exist in wishlist';
								
		}	else
		$insertWishlist = "INSERT INTO wishlist(txtnewsID,txtuserid) VALUES ('$txtNewsID', '$txtuserID')";
		if(mysqli_query($conn,$insertWishlist))			
	?>

  <script>
      $(function () {
  $('.material-tooltip-main').tooltip({
    template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
  })
})
</script>
  </div>
  </div>
</div>
    <div class="row row-cols-3">

    <?php 
        //DB connection
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "nissanmotodb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

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

            <div class="card" style="width: 18rem;">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="..." width="89%" height="132" class="card-img-top" style= "max-height:200px;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['topic'] ?></h5>
                    <p class="card-text"><?php echo $row['discription'] ?></p>
                </div>
            </div> &nbsp &nbsp


    <?php
            }
            }
        }
        mysqli_close($conn);
    ?>

						
	<!-- submit form  -->				
	<div class="submit-form">
    <form enctype="multipart/form-data" method="post" class="form-horizontal">
		<div class="col-xs-8 col-xs-offset-4">
			<h2>News and Updates </h2>
		</div>		
        <div class="form-group">
			<label class="control-label col-xs-4">User ID</label>
			<div class="col-xs-8">
                <input type="text" class="form-control" name="txtuserID" id="txtuserID" required="required">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4">News ID</label>
			<div class="col-xs-8">
                <input type="text" class="form-control" name="txtNewsID" id="txtNewsID" required="required">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4">Topic</label>
			<div class="col-xs-8">
                <input type="text" class="form-control" name="txttopic" id="txttopic" required="required">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4">Discription</label>
			<div class="col-xs-8">
                <textarea id="text" class="form-control" name="txtDiscription"  required="required" rows="4" cols="50">
				</textarea>
			<div class="form-group ">
            <label class="mr-2">Upload your Image:</label>
            <!--<input type="file" name="fileimage" id="image">-->
            <input type="file" name="fileimage" id="image1" accept=".jpg, .jpeg, .png" class="inputFile">
          </div>	
            </div>        
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
            <input type="submit" class="" name="btnSubmit" value="Submit">
			</div>  
		</div>	</div>	</div>	</div> </div>
    </form>			<br><br><br><br><br><br><br><br><br><br>	
		
		
<footer class="footer mt-auto py-3 fixed-bottom">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
</footer>
</body>
</html>
    