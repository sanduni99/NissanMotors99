<div class="d-flex justify-content-center">
    <form method="post">
        <br>
        <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Demote new user as an "User"</h4></i>
        <hr>
    </form>
</div>

<?php
    if(isset($_POST['btnSubmit'])){
        if($_POST['inputState'] !="" && $_POST['txtPassword'] != ""){
            require_once('Database/db_connnection.php');
            $sql1 = "SELECT `password` FROM `user` WHERE `userID` =".$_SESSION['userID'];
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)) {
                    $password = $row1['password'];
                }
            }

            if($_POST['txtPassword'] == $password){
                if($_SESSION['name'] != $_POST['inputState']){
                    require_once('Database/db_connnection.php');
                    $sql2 = "UPDATE `user` SET `type` = 'User' WHERE `user`.`name` = '".$_POST['inputState']."'";
                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2 == true) {
                        echo "<script>alert('Successfully updated!')</script>";
                    }
                    else{
                        echo "<script>alert('User name is wrong!')</script>";
                    }
                }
                else{
                    echo "<script>alert('You can't demote your self!')</script>";
                }
            }
            else{
                echo "<script>alert('Password is wrong!')</script>";
            }
        }  
    }

?>

<div class="d-flex justify-content-center">
    <div class="container-sm" style="width: 800px;">
        <form method="post">
            <div>
                <label class="form-label">Name of users</label>
                <!--<input type="text" class="form-control" name="txtEmail" width="15%" placeholder="Email">-->
                <select name="inputState" class="form-select" required>
                    <option selected> </option>
                    <?php
                        require_once('Database/db_connnection.php');
                        $sql1 = "SELECT COUNT(*) FROM `user` WHERE `type`='Admin'";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while($row1 = mysqli_fetch_assoc($result1)) {
                                $x = $row1['COUNT(*)'];
                                for($n=0; $n<$x; ++$n){
                                    $sql2 = "SELECT `name` FROM `user` WHERE `type`='Admin' LIMIT ".$n.",1";
                                    $result2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while($row2 = mysqli_fetch_assoc($result2)) {
                                            echo "<option>".$row2['name']."</option>";
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                </select>
            </div>
            <br>
            <div>
            <label class="form-label">Confirm demotion with your Password</label>
                <input type="password" class="form-control" name="txtPassword" placeholder="Confirm Password" required>
            </div>
            <br><br>
            <div>
                <input type="submit" class="form-control btn-primary" name="btnSubmit" value="Confirm">
            </div>
        </form>       
    </div>
</div>