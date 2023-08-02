<div class="d-flex justify-content-center">
    <form method="post">
        <br>
        <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Promote new user as an "Admin"</h4></i>
        <hr>
    </form>
</div>

<?php
    if(isset($_POST['btnSubmit'])){
        if($_POST['txtEmail'] !="" && $_POST['txtPassword'] != ""){
            require_once('Database/db_connnection.php');
            $sql1 = "SELECT `password` FROM `user` WHERE `userID` =".$_SESSION['userID'];
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)) {
                    $password = $row1['password'];
                }
            }

            if($_POST['txtPassword'] == $password){
                $sql2 = "UPDATE `user` SET `type` = 'Admin' WHERE `email` ='".$_POST['txtEmail']."'";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2 == true) {
                    echo "<script>alert('Successfully updated!')</script>";
                }
                else{
                    echo "<script>alert('User Email is wrong!')</script>";
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
                <label class="form-label">Email of users</label>
                <input type="text" class="form-control" name="txtEmail" width="15%" placeholder="Email">
            </div>
            <br>
            <div>
            <label class="form-label">Confirm demotion with your Password</label>
                <input type="password" class="form-control" name="txtPassword" placeholder="Confirm Password">
            </div>
            <br><br>
            <div>
                <input type="submit" class="form-control btn-primary" name="btnSubmit" value="Confirm">
            </div>
        </form>       
    </div>
</div>