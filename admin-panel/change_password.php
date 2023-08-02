
<!------------------ Select user ID to display ------------------------->
<?php
									require_once('Database/db_connnection.php');

									$sql = "SELECT * FROM `user` WHERE `userID` = ".$_SESSION['userID'];
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
										// ------- output data of each row
										while($row = mysqli_fetch_assoc($result)) {
                                            $email = $row["email"];
											$userID = $row["userID"];
                                            $name = $row["name"];
										}

									} 
					?>
		 <!------------------ Select user ID to display -------------------------> 


<div class="container rounded bg-white mt-5 mb-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="150px" src="Images/user.png">				
			<span class="font-weight-bold"><?php echo $name ?></span><span class="text-black-50"><?php echo $email ?></span></div>
        </div>
        <div class="col-md-5 border-right">
        <form method="post">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Change Your Password</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">User ID</label>
                    <input type="text" class="form-control" placeholder="User Id" value="<?php echo $userID ?>" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Current Password</label>
                    <input type="password" name="currentpassword" class="form-control" placeholder="Your current password" value="" required></div>
					
                    <div class="col-md-12"><label class="labels">New Password</label>
                    <input type="password" name="npassword" class="form-control" placeholder="Your new Password" value="" required></div>
					
                    <div class="col-md-12"><label class="labels">Confirm Password</label>
                    <input type="password" name="conpassword" class="form-control" placeholder="Confirm new Password" value="" required></div>
                </div>
                <div class="mt-5 text-center">
                    <button type="submit" name="submit" class="btn btn-primary profile-button">Save New Password</button></div>
            </div>
            </form>
        </div>
    </div>
</div>

<!------------------ Change user password ------------------------->

            <?php
				if(isset($_POST['submit'])) {
					require_once('Database/db_connnection.php');

                    $sql = "SELECT `password` FROM `user` WHERE `userID` = ".$_SESSION['userID'];
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $password = $row['password'];
                        }
                    }

                    if($_POST["currentpassword"] == $password){
                        if($_POST["npassword"] == $_POST["conpassword"]) {
                            $sql = "UPDATE `user` SET `password`='".$_POST['conpassword']."' WHERE `userID` = ".$_SESSION['userID'];
                            if ($conn->query($sql) == TRUE) {
                                echo '<script>alert("Password update successfully!")</script>';
                            }
                            else {
                                echo '<script>alert("Somthing Wrong.")</script>';
                            }
                        }
                        else {
                            echo '<script>alert("Password not matching.")</script>';
                        }
                    }
                    else{
                        echo '<script>alert("Current password failure!")</script>';
                    }
                }
             $conn->close();
            ?>
<!------------------ Change user password ------------------------->