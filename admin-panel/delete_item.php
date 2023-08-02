<?php
    if(isset($_POST["btnDelete"])){
        require_once('Database/db_connnection.php');

        $sql = "UPDATE `advert` SET `status` = 'Deleted' WHERE `advert`.`addID` = ".$_POST['item_id'];
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Post sucessfully Deleted!'); <script>";
            INCLUDE 'admin-panel.php?delete_item.php';
        } else{
            echo "<script> alert('Something Wrong!'); <script>";
        }
        mysqli_close($conn);
    }

?>

    <div class="d-flex justify-content-center">
        <form action="post">
            <br>
            <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Fill the form to delete item.</h4></i>
            <br>
        </form>
    </div>

    <br><br>
    <div class="container">
        <p class="text-secondary display-6">Current posts</p>
        <?php
            require_once('Database/db_connnection.php');
            
            //Count number of adds what you created
            $sql = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` LIKE 'Posted' OR 'Pending' AND `userID` =".$_SESSION['userID'];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $itemCount = $row['COUNT(`addID`)'];
               }
            } 

            //Get ID numbers of posts what you created
            $itemNumArray;
            for($i = 0; $i < $itemCount; $i++){
                $sql = "SELECT `addID` FROM `advert` WHERE `status` LIKE 'Posted' OR 'Pending' AND `userID` =".$_SESSION['userID']." LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $itemNumArray[$i] = $row["addID"];
                  }
                }
            }
            //Read data from Advert,PostImage data tables.
            for($x = 0; $x < $itemCount; $x++){
                $sql = "SELECT * FROM `advert` WHERE `addID`=".$itemNumArray[$x];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $sql1 = "SELECT * FROM `postimage` WHERE `addID`=".$itemNumArray[$x];
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
                                <button type="Submit" name="btnDelete" class="btn btn-danger">Delete</button>
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
