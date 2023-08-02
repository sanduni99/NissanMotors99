<?php

?>

    <br><br>
    <div class="container">
        <p class="text-secondary display-6">Current posts</p>
        <div>

            <?php
            //Get count of adds
            require_once('Database/db_connnection.php');
            
            $sql = "SELECT COUNT(`newsID`) FROM `news`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $newsCount = $row['COUNT(`newsID`)']+1;
               }
            } 

            //Get Add IDs
            /*for($i = 0; $i < $newsCount; $i++){
                $sql = "SELECT `newsID` FROM `news` LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $newsNumArray[$i] = $row["addID"];
                  }
                }
            }*/

            //Display Advertiesments
            for($x = 0; $x < $newsCount; $x++){
                $sql = "SELECT * FROM `news` LIMIT ".$x.",1";
                $result = mysqli_query($conn, $sql);
              
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    
             ?>

            <form method = "post">
                <div class="card">
                    <div class="card-header">
                        <p class="h5">Topic:&nbsp; <?php echo $row["topic"]?></p>
                    </div>
                    <table>
                        <tr width="fit" class="cardset">
                            <th width="5%"></th>
                            <th width="40%">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" id="img1" width="400" />
                            </th>
                            <th width="45%">
                                <p class="h6">Discription: <?php echo $row["discription"] ?></p>
                                <br>
                            </th>
                            <th width="10%"><input type=hidden name="hiddenValue" value="<?php echo $row["newsID"] ?>">
                            <button type="Submit" name="btnEditNews" class="btn btn-secondary">Edit</button></th>
                        </tr>
                    </table>
                </div>
            </form><br>

            <?php
            }
            }
          }
          mysqli_close($conn);
        ?>


        </div>
    </div>
    <br><br><br><br>
    </div>