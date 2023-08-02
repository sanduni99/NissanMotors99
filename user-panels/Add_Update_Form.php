<?php
        require_once('Database/db_connnection.php');
        $sql = "SELECT `addID`,`date`,`distric`,`conditionType`,`brand`,`yearOfMan`,`model`,`engineCapacity`,`fuelType`,`discription`,`userID`,`price` FROM `advert` WHERE `addID` = ".$_SESSION['passEditID'];
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['addID'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>
    <!-- Import Bootstrap v5.0.2-->
    <link rel="stylesheet" href="../Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="../Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import CSS files-->
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/navbar & footer.css">
    <!-- Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import JavaScript files-->
    <script src="../JavaScript/mainScripts.js"></script>
  </head>

  <body>
    <div calss="bg-white">

        <div class="d-flex justify-content-center">
                <form method="post">
                    <br>
                    <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Fill the form to update item.</h4></i>
                    <br>
                    <table class="sell_table" style="width: 800px;">
                        <tr>
                            <td><label>Distric:</label></td>
                            <td>
                                <select class="form-select" name="txtDistrict" value = "<?php echo $row['distric'] ?>" aria-label="Default select example" required>
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
                                <select class="form-select" name="txtCondition" value = "<?php echo $row['conditionType'] ?>" aria-label="Default select example" required>
                                    <option value="Used" selected>Used</option>
                                    <option value="Brand_New">Brand New</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Brand:</label></td>
                            <td>
                                <input class="form-control" type="text" name="txtBrand" value = "<?php echo $row['brand'] ?>" aria-label="default input example" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Model:</label></td>
                            <td>
                                <input class="form-control" type="text" name="txtModel" value = "<?php echo $row['model'] ?>" aria-label="default input example" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Year of manifactured:</label></td>
                            <td>
                                <input class="form-control" type="text" name="txtYear" value = "<?php echo $row['yearOfMan'] ?>" aria-label="default input example" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Engine Capacity:</label></td>
                            <td>
                                <input class="form-control" type="text" name="txtCapacity" value = "<?php echo $row['engineCapacity'] ?>"  aria-label="default input example" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Fuel:</label></td>
                            <td>
                                <select class="form-select" name="txtFuel" value = "<?php echo $row['fuelType'] ?>"  aria-label="Default select example" required>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Electric">Electric</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Price (LKR):</label></td>
                            <td>
                                <input class="form-control" type="number" name="txtPrice" value = "<?php echo $row['price'] ?>" aria-label="default input example" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Discription:</label></td>
                            <td>
                                <textarea class="form-control" name="txtDisc" rows="3" required><?php echo $row['discription'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <br>
                                <button type="Submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>



<?php

} 
}
else {
  echo "0 results";
}


//Submit Values

if(isset($_POST['btnSubmit'])){
        require_once('Database/db_connnection.php');
        $sql = "UPDATE `advert` SET `distric` = '".$_POST['txtDistrict']."',`conditionType` = '".$_POST['txtCondition']."',`brand` ='".$_POST['txtBrand']."',`yearOfMan` = '"
        .$_POST['txtYear']."',`model` = '".$_POST['txtModel']."',`engineCapacity` = '".$_POST['txtCapacity']."',`fuelType` = '".$_POST['txtFuel']."',`discription` = '"
        .$_POST['txtDisc']."',`price` = '".$_POST['txtPrice']."' WHERE `advert`.`addID` = ".$_SESSION['passEditID'];

        $result = mysqli_query($conn, $sql);
        if ($result = true) {
            echo '<script>alert("Update successfully!");</script>';
            echo "<script>window.top.location='admin-panel.php'</script>";


        }
        else{
            echo '<script>alert("Update successfully!");</script>';
        }
}
?>