<html>
<head>
<title>Advert_charts</title>
</head>
<body >

<div class="container">    
  <h3>My Advertisement </h3>
			<p>My Advertisement Details.</p>
			<hr>

      <?php
        require_once('Database/db_connnection.php');
            
            $sql = "SELECT COUNT(`addID`) FROM `advert` WHERE `userID` = '".$_SESSION['userID']."'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $countofrows = $row["COUNT(`addID`)"];
              }
            } else {
              echo "0 results";
            }
            
        ?>

      <div class="container mt-5">
        <div class="row d-flex justify-content-center g-1">
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Add ID</th>
              <th scope="col">Customer ID</th>
              <th scope="col">Vehicle Name</th>
              <th scope="col">Model</th>
              <th scope="col">Year</th>
              <th scope="col">Price</th>
              <th scope="col">Status</th>
              <th scope="col">Report</th>
            </tr>
          </thead>
          <tbody>

          <?php

                  if(isset($_POST["gene_report"])){
                    $_SESSION['report_ID'] = $_POST["hidden_value"];
                    echo "<script>window.top.location='user-panels/Advert_Report.php'</script>";
                  }

									require_once('Database/db_connnection.php');

                  for($x = 0; $x < $countofrows; $x++){
									$sql = "SELECT * FROM `advert` WHERE `userID` = '".$_SESSION['userID']."'LIMIT ".$x.",1";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
										// ------- output data of each row
										while($row = mysqli_fetch_assoc($result)) {
                      echo '<form method="post"><tr>
                      <td>'.$row["addID"].'</td>
                      <td>'.$row["userID"].'</td>
                      <td>'.$row["brand"].'</td>
                      <td>'.$row["model"].'</td>
                      <td>'.$row["yearOfMan"].'</td>
                      <td>LKR.'.$row["price"].'.00</td>
                      <td>'.$row["status"].'</td>
                      <td><input type="hidden" name="hidden_value" value="'.$row["addID"].'"><input class="btn btn-primary profile-button" name="gene_report" type="submit" value="Report"></td>
                    </tr> </form>';
										}
                  }
									} 
                  mysqli_close($conn);		
					?>
</table>
</body>
</html>
