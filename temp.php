<?php 
    if(isset($_POST["btnApprove"])){
        require_once('Database/db_connnection.php');

        //Approve button function
        $sql = "UPDATE `advert` SET `status` = 'Posted' WHERE `advert`.`addID` = ".$_POST['item_id'];
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Post sucessfully posted!'); <script>";

            require_once('Database/db_connnection.php');
            //Count ID number of pending posts
            $sql = "SELECT u.email FROM advert a, user u WHERE a.userID=u.userID AND a.addID = ".$_POST['item_id'];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $recever = $row['email'];
               }
            } 
            $recever = "tharindutd1998@gmail.com";
            $subject ="Post had published";
            $content = "Your post Submited successfully!";
            mailing($recever,$subject,$content);
        } else{
            echo "<script> alert('Something Wrong!'); <script>";
        }
        mysqli_close($conn);
    }

    //Reject button function
    if(isset($_POST["btnReject"])){
        require_once('Database/db_connnection.php');

        $sql = "UPDATE `advert` SET `status` = 'Rejected' WHERE `advert`.`addID` = ".$_POST['item_id'];
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Post sucessfully Rejected!'); <script>";
        } else{
            echo "<script> alert('Something Wrong!'); <script>";
        }
        mysqli_close($conn);
    }
?>

<div class="d-flex justify-content-center">
        <form action="post">
            <br>
            <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Pending and rejected advertiesments.</h4></i>
            <br>
        </form>
    </div>

    <br><br>
    <div class="container">
        <p class="text-secondary display-6">Pending posts</p>
        <?php
            require_once('Database/db_connnection.php');
            
            //Count ID number of pending posts
            $sql = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` LIKE 'Pending'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $addCount = $row['COUNT(`addID`)'];
               }
            } 

            //Get ID numbers of pending posts
            $addNumArray;
            for($i = 0; $i < $addCount; $i++){
                $sql = "SELECT `addID` FROM `advert` WHERE `status` LIKE 'Pending' LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $addNumArray[$i] = $row["addID"];
                    }
                  }
            }

            //Get relevent post data from advert,postimage and payment tables
            for($x = 0; $x < $addCount; $x++){
                $sql = "SELECT * FROM `advert` WHERE `addID`=".$addNumArray[$x];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $sql1 = "SELECT * FROM `postimage` WHERE `addID`=".$addNumArray[$x];
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                    while($rowimg = mysqli_fetch_assoc($result1)) {
                        $sql2 = "SELECT * FROM `payment` WHERE `addID`=".$addNumArray[$x];
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                        while($rowpay = mysqli_fetch_assoc($result2)) {
             ?>

            <form method="post">
            <div class="card">
                <div class="card-header">
                    <p class="h5">Name:&nbsp; <?php echo $row["brand"]." ".$row["model"]." ".$row["yearOfMan"] ?></p>
                </div>
                <table>
                    <tr width="fit" class="cardset">
                        <th width="5%"></th>
                        <th width="45%">
                            
                            <p class="h6">Distric: <?php echo $row["distric"] ?></p>
                            <p class="h6">Condition: <?php echo $row["conditionType"] ?></p>
                            <p class="h6">Engine Capacity: <?php echo $row["engineCapacity"] ?></p>
                            <p class="h6">Fuel: <?php echo $row["fuelType"] ?></p>
                            <p class="h6">Discription: <?php echo $row["discription"] ?></p>
                            <input type="hidden" name= "item_id" value="<?php echo $row['addID'];?>"> 
                            <br>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image1"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image2"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image3"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image4"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image5"]); ?>" id="img1" height="80" />

                        </th>
                        <th width="40%">
                            
                            <p class="h6">Pay: <?php echo $rowpay["value"].$rowpay["currency"] ?></p>

                            <br>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowpay["paySlip"]); ?>" id="img1" height="240" />


                        </th>
                        <th width="10%">
                            <button type="Submit" name="btnApprove" class="btn btn-secondary">Approve</button><br><br>
                            <button type="Submit" name="btnReject" class="btn btn-danger">Reject</button>
                        </th>
                    </tr>
                </table>
            </div></form><br>

            <?php
                    }
                    }
                }
            }
            }
            }
          }

        ?>
    </div>


    <br><br>
    <div class="container">
        <p class="text-secondary display-6">Rejected posts</p>
        <?php
            require_once('Database/db_connnection.php');
            
            //Count ID number of pending posts
            $sql = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` LIKE 'Rejected'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $addCount = $row['COUNT(`addID`)'];
               }
            } 

            //Get ID numbers of pending posts
            $addNumArray;
            for($i = 0; $i < $addCount; $i++){
                $sql = "SELECT `addID` FROM `advert` WHERE `status` LIKE 'Rejected' LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $addNumArray[$i] = $row["addID"];
                    }
                  }
            }

            //Get relevent post data from advert,postimage and payment tables
            for($x = 0; $x < $addCount; $x++){
                $sql = "SELECT * FROM `advert` WHERE `addID`=".$addNumArray[$x];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $sql1 = "SELECT * FROM `postimage` WHERE `addID`=".$addNumArray[$x];
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                    while($rowimg = mysqli_fetch_assoc($result1)) {
                        $sql2 = "SELECT * FROM `payment` WHERE `addID`=".$addNumArray[$x];
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                        while($rowpay = mysqli_fetch_assoc($result2)) {
             ?>

            <form method="post">
            <div class="card">
                <div class="card-header bg-danger">
                    <p class="h5">Name:&nbsp; <?php echo $row["brand"]." ".$row["model"]." ".$row["yearOfMan"] ?></p>
                </div>
                <table>
                    <tr width="fit" class="cardset">
                        <th width="5%"></th>
                        <th width="45%">
                            
                            <p class="h6">Distric: <?php echo $row["distric"] ?></p>
                            <p class="h6">Condition: <?php echo $row["conditionType"] ?></p>
                            <p class="h6">Engine Capacity: <?php echo $row["engineCapacity"] ?></p>
                            <p class="h6">Fuel: <?php echo $row["fuelType"] ?></p>
                            <p class="h6">Discription: <?php echo $row["discription"] ?></p>
                            <input type="hidden" name= "item_id" value="<?php echo $row['addID'];?>"> 
                            <br>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image1"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image2"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image3"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image4"]); ?>" id="img1" height="80" />
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowimg["image5"]); ?>" id="img1" height="80" />

                        </th>
                        <th width="40%">
                            
                            <p class="h6">Pay: <?php echo $rowpay["value"].$rowpay["currency"] ?></p>

                            <br>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowpay["paySlip"]); ?>" id="img1" height="240" />


                        </th>
                        <th width="10%">
                            <button type="Submit" name="btnApprove" class="btn btn-secondary">Re-Approve</button><br><br>
                            <button type="Submit" name="btnReject" class="btn btn-danger">Delete</button>
                        </th>
                    </tr>
                </table>
            </div></form><br>

            <?php
                    }
                    }
                }
            }
            }
            }
          }
          mysqli_close($conn);
        ?>
    </div>


    <br><br><br><br>
    </div>

