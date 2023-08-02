		<!------------------ Select user details to display ------------------------->
        <?php
									require_once('Database/db_connnection.php');

									$sql = "SELECT * FROM `user` WHERE `userID` = ".$_SESSION['userID'];
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
										// ------- output data of each row
										while($row = mysqli_fetch_assoc($result)) {

											$email = $row["email"];
											$name = $row["name"];
											$type = $row["type"];
											$userID = $row["userID"];
											$contact = $row["contact"];
											$nic = $row["nic"];
										}

									} 		
	
					?>
		 <!------------------ Select user details to display -------------------------> 
<div class="container rounded bg-white mt-5 mb-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="Images/user.png">
				<span class="font-weight-bold"><?php echo $name ?></span><span class="text-black-50"><?php echo $email ?></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <div class="row mt-3">
					<div class="col-md-12"><label class="labels">User ID</label>
						<input type="text" name="userID" class="form-control" value="<?php echo $userID ?>" disabled></div>
                    <div class="col-md-12"><label class="labels">User Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $name ?>" disabled></div>
                    <div class="col-md-12"><label class="labels">Email Address</label>
						<input type="text" name="email" class="form-control" value="<?php echo $email ?>" disabled></div>
                    <div class="col-md-12"><label class="labels">NIC/Passport</label>
						<input type="text" name="nic" class="form-control" value="<?php echo $nic ?>" disabled></div>
                    <div class="col-md-12"><label class="labels">Contact</label>
						<input type="text" name="contact" class="form-control" value="<?php echo $contact ?>" disabled></div>
			
                </div>
            </div>
        </div>
    </div>
</div>








