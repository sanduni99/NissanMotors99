<div class="d-flex justify-content-center">
    <form method="post">
        <br>
        <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Celebrate your success!</h4></i>
        <hr>
    </form>
</div>


<div class="container">
    <p class="text-secondary h1">Advertiesment details</p><br>
    <div class="row row-cols-2 justify-content-center">
        <div class="card bg-white" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Total Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql1 = "SELECT COUNT(`addID`) FROM `advert`";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while($row1 = mysqli_fetch_assoc($result1)) {
                                echo $row1['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
        <div class="card bg-success" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Active Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql2 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Posted'";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                echo $row2['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
        <div class="card bg-danger" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Rejected Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql3 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Rejected'";
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3) > 0) {
                            while($row3 = mysqli_fetch_assoc($result3)) {
                                echo $row3['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
        <div class="card bg-warning" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Pending Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql4 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Pending'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) > 0) {
                            while($row4 = mysqli_fetch_assoc($result4)) {
                                echo $row4['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
        <div class="card bg-dark text-white" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Deleted Advertiesments</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql5 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Deleted'";
                        $result5 = mysqli_query($conn, $sql5);
                        if (mysqli_num_rows($result5) > 0) {
                            while($row5 = mysqli_fetch_assoc($result5)) {
                                echo $row5['COUNT(`addID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp 
        <!--
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        --> 
    </div><hr>

    <p class="text-secondary h1">User details</p><br>
    <div class="row row-cols-2 justify-content-center">
        <div class="card bg-white" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Total Users</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql6 = "SELECT COUNT(`userID`) FROM `user`";
                        $result6 = mysqli_query($conn, $sql6);
                        if (mysqli_num_rows($result6) > 0) {
                            while($row6 = mysqli_fetch_assoc($result6)) {
                                echo $row6['COUNT(`userID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
        <div class="card bg-primary" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Admin</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql7 = "SELECT COUNT(`userID`) FROM `user` WHERE `type` = 'Admin'";
                        $result7 = mysqli_query($conn, $sql7);
                        if (mysqli_num_rows($result7) > 0) {
                            while($row7 = mysqli_fetch_assoc($result7)) {
                                echo $row7['COUNT(`userID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
        <div class="card bg-secondary" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Users</h5>
                <p class="display-2 card-text text-center">
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql8 = "SELECT COUNT(`userID`) FROM `user` WHERE `type` = 'User'";
                        $result8 = mysqli_query($conn, $sql8);
                        if (mysqli_num_rows($result8) > 0) {
                            while($row8 = mysqli_fetch_assoc($result8)) {
                                echo $row8['COUNT(`userID`)'];
                            }
                        }
                    ?>
                </p>
            </div>
        </div><br>&nbsp&nbsp
    </div><hr>
</div>