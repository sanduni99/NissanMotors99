<div class="d-flex justify-content-center">
    <form action="post">
        <br>
        <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Fill the form to create news.</h4></i>
        <br>
    </form>
</div>

<?php
    if(isset($_POST['btnSubmit'])){

        require_once('Database/db_connnection.php');
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['fileimage']['tmp_name']) && !empty($_POST['txtDiscription']) && !empty($_POST['txttopic'])) {
                
                $sql = "SELECT MAX(`newsID`) FROM `news`";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $newsCount = $row['MAX(`newsID`)'] + 1;
                    }
                }
                
                $img1 = addslashes(file_get_contents($_FILES['fileimage']['tmp_name']));
                $txtuserID = $_SESSION['userID'];
                $txttopic = $_POST['txttopic'];
                $txtDiscription = $_POST['txtDiscription'];
   
                $sql = "INSERT INTO `news` (`newsID`, `userID`, `topic`, `image`, `discription`) VALUES ('".$newsCount."', '".$txtuserID."', '".$txttopic."','".$img1."','".$txtDiscription."')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.alert("New record created successfully")</script>';
                } else {
                    $txt = "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo '<script>window.alert("' . $txt . '")</script>';
                }
            }
            else{
                echo '<script>window.alert("Error 2")</script>';
            }
        }   
        else{
            echo '<script>window.alert("Error 1")</script>';
        }
        mysqli_close($conn);
    }
?>

<div class="d-flex justify-content-center">
    <div class="submit-form" style="width: 800px;">
        <form enctype="multipart/form-data" method="post" class="form-horizontal">
            <div class="col-xs-8 col-xs-offset-4">
                <h2>News and Updates </h2>
            </div>		
            <br>
            <div class="form-group">
                <label class="control-label col-xs-4">Topic</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="txttopic" id="txttopic" required>
                </div>        	
            </div>
            <div class="form-group">
                <label class="control-label col-xs-4">Discription</label>
                <div class="col-xs-8">
                    <textarea id="text" class="form-control" name="txtDiscription" rows="4" cols="50" required>
                    </textarea>
                <div class="form-group ">
                <label class="mr-2">Upload your Image:</label>
                <input type="file" name="fileimage" id="image1" accept=".jpg, .jpeg, .png" class="inputFile" required>
            </div>	
                </div>        
                <br>
            <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit">
                </div>  
            </div>	</div>	</div>	</div> </div>
        </form>				
	</div>
</div>


