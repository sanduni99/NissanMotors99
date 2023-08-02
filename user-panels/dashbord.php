<div class="d-flex justify-content-center">
    <form method="post">
        <br>
        <i class = "fs-1" style="text-align: center;"><h2><?php echo $_SESSION['name'] ?>,</h2><h4>Dashboard</h4></i>
        <hr>
    </form>
</div>


<!-- <div class="container"> -->
    <p class="text-secondary h1">Advertiesment details <hr></p><br>
    <div class="container">
    <div class="row row-cols-1 justify-content-center">
        <div class="card bg-white">
            <div class="card-body">
                <h5 class="card-title text-center">Total Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql1 = "SELECT COUNT(`addID`) FROM `advert` WHERE `userID` = '".$_SESSION['userID']."'";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while($row1 = mysqli_fetch_assoc($result1)) {
                                echo $row1['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>
        <div class="card bg-success">
            <div class="card-body">
                <h5 class="card-title text-center">Active Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql2 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Posted' && `userID` = '".$_SESSION['userID']."'";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                echo $row2['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>
        <div class="card bg-danger">
            <div class="card-body">
                <h5 class="card-title text-center">Deleted Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql3 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Deleted' && `userID` = '".$_SESSION['userID']."'";
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3) > 0) {
                            while($row3 = mysqli_fetch_assoc($result3)) {
                                echo $row3['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>
        <div class="card bg-warning">
            <div class="card-body">
                <h5 class="card-title text-center">Pending Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql4 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Pending' && `userID` = '".$_SESSION['userID']."'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) > 0) {
                            while($row4 = mysqli_fetch_assoc($result4)) {
                                echo $row4['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Rejected Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql5 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Rejected' && `userID` = '".$_SESSION['userID']."'";
                        $result5 = mysqli_query($conn, $sql5);
                        if (mysqli_num_rows($result5) > 0) {
                            while($row5 = mysqli_fetch_assoc($result5)) {
                                echo $row5['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
                    </div>

