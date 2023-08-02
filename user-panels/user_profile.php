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
				
				
				<img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

				<span class="font-weight-bold"><?php echo $name ?></span><span class="text-black-50"><?php echo $email ?></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">User Type</label>
						<input type="text" class="form-control" value="<?php echo $type ?>" readonly></div>
                </div>
                <div class="row mt-3">
					<div class="col-md-12"><label class="labels">User ID</label>
						<input type="text" name="userID" class="form-control" value="<?php echo $userID ?>" readonly></div>
                    <div class="col-md-12"><label class="labels">User Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $name ?>" readonly></div>
                    <div class="col-md-12"><label class="labels">Email Address</label>
						<input type="text" name="email" class="form-control" value="<?php echo $email ?>" readonly></div>
                    <div class="col-md-12"><label class="labels">NIC/Passport</label>
						<input type="text" name="nic" class="form-control" value="<?php echo $nic ?>" readonly></div>
                    <div class="col-md-12"><label class="labels">Contact</label>
						<input type="text" name="contact" class="form-control" value="<?php echo $contact ?>" readonly></div>
			
                </div>
            </div>
        </div>
    </div>
</div>








