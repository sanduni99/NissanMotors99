<div class="d-flex justify-content-center">
        <form enctype="multipart/form-data" method="post">
            <br>
            <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Fill the form to insert new item.</h4></i>
            <hr><br>
            <table class="sell_table" style="width: 800px;">
                <tr>
                    <td><label>Distric:</label></td>
                    <td>
                        <select class="form-select" name="txtDistrict" aria-label="Default select example" required>
                            <!--<option selected>Select distric</option>-->
                            <option value="Ampara">Ampara</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Monaragala">Monaragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>
                          </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Condition:</label></td>
                    <td>
                        <select class="form-select" name="txtCondition" aria-label="Default select example" required>
                            <option value="Used" selected>Used</option>
                            <option value="Brand_New">Brand New</option>
                          </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Brand:</label></td>
                    <td>
                        <input class="form-control" type="text" name="txtBrand" aria-label="default input example" required>
                    </td>
                </tr>
                <tr>
                    <td><label>Model:</label></td>
                    <td>
                        <input class="form-control" type="text" name="txtModel" aria-label="default input example" required>
                    </td>
                </tr>
                <tr>
                    <td><label>Year of manifactured:</label></td>
                    <td>
                        <input class="form-control" type="number" name="txtYear" aria-label="default input example" min="1885" max="2025" required>
                    </td>
                </tr>
                <tr>
                    <td><label>Engine Capacity (CC):</label></td>
                    <td>
                        <input class="form-control" type="number" name="txtCapacity" aria-label="default input example" min="1" required>
                    </td>
                </tr>
                <tr>
                    <td><label>Price (LKR):</label></td>
                    <td>
                        <input class="form-control" type="number" name="txtPrice" aria-label="default input example" required>
                    </td>
                </tr>
                <tr>
                    <td><label>Fuel:</label></td>
                    <td>
                        <select class="form-select" name="txtFuel" aria-label="Default select example" required>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Electric">Electric</option>
                          </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Image:</label></td>
                    <td>
                    <img id="img1" height="25" /> <input type="file" name="image1" id="file2" accept=".jpg, .jpeg, .png" class="inputFile"><br>
                    <img id="img2" height="25" /> <input type="file" name="image2" id="file2" accept=".jpg, .jpeg, .png" class="inputFile"><br>
                    <img id="img3" height="25" /> <input type="file" name="image3" id="file3" accept=".jpg, .jpeg, .png" class="inputFile"><br>
                    <img id="img4" height="25" /> <input type="file" name="image4" id="file4" accept=".jpg, .jpeg, .png" class="inputFile"><br>
                    <img id="img5" height="25" /> <input type="file" name="image5" id="file5" accept=".jpg, .jpeg, .png" class="inputFile"><br>
                    </td>
                </tr>
                <tr>
                    <td><label>Discription:</label></td>
                    <td>
                        <textarea class="form-control" name="txtDisc" rows="3" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br>
                        <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit">&#160 &#160
                        <input type="Reset" class="btn btn-warning" name="btnClear" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
    </div>



<?php
    
    //validate fealds
    function validateTextField(){
        if(!empty($_POST['txtDistrict']) && !empty($_POST['txtCondition']) && !empty($_POST['txtBrand']) && !empty($_POST['txtModel']) && !empty($_POST['txtYear']) && !empty($_POST['txtCapacity']) && !empty($_POST['txtPrice']) && !empty($_POST['txtFuel']) && !empty($_POST['txtDisc'])){
            return true;
        }
        else{
            return false;
        }
    }

    //validate images
    function validateImages(){
        if(is_uploaded_file($_FILES['image1']['tmp_name']) || is_uploaded_file($_FILES['image2']['tmp_name']) || is_uploaded_file($_FILES['image3']['tmp_name']) || is_uploaded_file($_FILES['image4']['tmp_name']) || is_uploaded_file($_FILES['image5']['tmp_name'])){
            return true;
        }
        else{
            return false;
        }
    }

    //Insert all data
    if(isset($_POST['btnSubmit'])) {
        if(validateTextField()){
            require_once('Database/db_connnection.php');

            $sql = "SELECT MAX(`addID`) FROM `advert`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $itemNo = $row['MAX(`addID`)']+1;
                }
            } 
            else {
                echo "0 results";
            }

            date_default_timezone_set("Asia/Colombo");
            $date = date("Y-m-d h:i:sa");
            $sql2 = "INSERT INTO `advert` (`addID`, `date`, `distric`, `conditionType`, `brand`, `yearOfMan`, `model`, `engineCapacity`, `fuelType`, `discription`, `userID`, `price`, `status`) 
            VALUES ('".$itemNo."', '".$date."', '".$_POST['txtDistrict']."', '".$_POST['txtCondition']."', '".$_POST['txtBrand']."', '".$_POST['txtYear']."', '".$_POST['txtModel']."', '".$_POST['txtCapacity']."', '".$_POST['txtFuel']."', '".$_POST['txtDisc']."', '".$_SESSION['userID']."', '".$_POST['txtPrice']."','Pending');";
            if (mysqli_query($conn, $sql2)) {
                if (count($_FILES) > 0) {
                    if (validateImages()) {
                        $img1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
                        $img2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
                        $img3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
                        $img4 = addslashes(file_get_contents($_FILES['image4']['tmp_name']));
                        $img5 = addslashes(file_get_contents($_FILES['image5']['tmp_name']));
            
                        $sql3 = "INSERT INTO postimage(addID ,image1, image2, image3, image4, image5)
                        VALUES('{$itemNo}', '{$img1}', '{$img2}' , '{$img3}' , '{$img4}', '{$img5}')";
                        if (mysqli_query($conn, $sql3)) {
                            $_SESSION['addID2pay'] = $itemNo;
                            echo '<script>window.alert("New record created successfully")</script>';
                            echo "<script>window.top.location='admin-panel/Payment/add_payments.php'</script>";
                        } else {
                            $txt = "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            } 
            else {
                $txt ="Error: " . $sql2 . "<br>" . mysqli_error($conn);
                echo '<script>alert("'.$txt.'")</script>';
            }

            mysqli_close($conn);
        }
        else{
            echo '<script>alert("Fill all!")</script>'; 
        }
    }

?>