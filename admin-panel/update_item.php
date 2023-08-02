<?php

?>

    <br><br>
    <div class="container">
        <p class="text-secondary display-6">Current posts</p>
        <div>

            <?php
            //Get count of adds
            require_once('Database/db_connnection.php');
            
            $sql = "SELECT COUNT(`addID`) FROM `advert`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $addCount = $row['COUNT(`addID`)']+1;
               }
            } 

            //Get Add IDs
            for($i = 0; $i < $addCount; $i++){
                $sql = "SELECT `addID` FROM `advert` WHERE `status` LIKE 'Posted' OR 'Pending' LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $addNumArray[$i] = $row["addID"];
                  }
                }
            }

            //Display Advertiesments
            for($x = 0; $x < $addCount; $x++){
                $sql = "SELECT * FROM `advert` WHERE `status` LIKE 'Posted' OR 'Pending' LIMIT ".$x.",1";
                $result = mysqli_query($conn, $sql);
              
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $sql1 = "SELECT * FROM `postimage` WHERE `addID`=".$row["addID"]."; ";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                    while($rowimg = mysqli_fetch_assoc($result1)) {
             ?>

            <form method = "post">
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
                            <th width="10%"><input type=hidden name="hiddenValue" value="<?php echo $row["addID"] ?>">
                            <button type="Submit" name="btnEdit" class="btn btn-secondary">Edit</button></th>
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
    </div>
    <br><br><br><br>
    </div>