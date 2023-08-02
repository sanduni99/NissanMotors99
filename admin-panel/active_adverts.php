<div class="d-flex justify-content-center">
        <form method="post">
            <br>
            <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>All the active Advertiesment.</h4></i>
            <br>
    </form>
</div>

<br><br>
    <div class="container">
        <p class="text-secondary display-6">All Current posts</p>
        <?php
            if(isset($_POST['btnOpen'])){
                $_SESSION['advert'] = $_POST['addID'];
                echo "<script>window.top.location='viewAdds.php'</script>";
            }

            require_once('Database/db_connnection.php');
            
            //Count number of adds what you created
            $sql = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` LIKE 'Posted'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $addCount = $row['COUNT(`addID`)'];
               }
            } 

            //Get ID numbers of posts what you created
            $addNumArray;
            for($i = 0; $i < $addCount; $i++){
                $sql = "SELECT `addID` FROM `advert` WHERE `status` LIKE 'Posted' LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $addNumArray[$i] = $row["addID"];
                  }
                }
            }
            //Read data from Advert,PostImage data tables.
            for($x = 0; $x < $addCount; $x++){
                $sql = "SELECT * FROM `advert` WHERE `addID`=".$addNumArray[$x];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $sql1 = "SELECT * FROM `postimage` WHERE `addID`=".$addNumArray[$x];
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                    while($rowimg = mysqli_fetch_assoc($result1)) {
             ?>
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <p class="h5">Name:&nbsp; <?php echo $row["brand"]." ".$row["model"]." ".$row["yearOfMan"] ?></p>
                    </div>
                    <table>
                        <tr width="fit" class="cardset">
                            <th width="5%"></th>
                            <th width="85%">
                                
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
                            <th width="10%">
                                <input type="hidden" name="addID" value="<?php echo $row["addID"] ?>">
                                <button type="Submit" name="btnOpen" class="btn btn-light">Open</button>
                            </th>
                        </tr>
                    </table>
                </div>
            </form><br>

            <?php
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