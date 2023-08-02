<?php
    if(isset($_POST["btnDelete"])){
        require_once('Database/db_connnection.php');

        $sql = "DELETE FROM `news` WHERE `news`.`newsID` = ".$_POST['hiddenValue'];
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
            $sql = "SELECT COUNT(`newsID`) FROM `news`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $newsCount = $row['COUNT(`newsID`)'];
               }
            } 

            //Get ID numbers of posts what you created
            $itemNumArray;
            for($i = 0; $i < $newsCount; $i++){
                $sql = "SELECT `newsID` FROM `news` LIMIT ".$i.",1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $itemNumArray[$i] = $row["newsID"];
                  }
                }
            }
            //Read data from Advert,PostImage data tables.
            for($x = 0; $x < $newsCount; $x++){
                $sql = "SELECT * FROM `news` WHERE `newsID`=".$itemNumArray[$x];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    
             ?>
             
            <form method="post">
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
                            <th width="10%">
                                <input type=hidden name="hiddenValue" value="<?php echo $row["newsID"] ?>">
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
          mysqli_close($conn);
        ?>
    </div>
    <br><br><br><br>
    </div>
