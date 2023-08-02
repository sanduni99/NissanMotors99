<?php
        session_start();
        require_once('../Database/db_connnection.php');
        $sql = "SELECT * FROM `news` WHERE `newsID` = ".$_SESSION['passEditNews'];
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['newsID'];

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
                    <i class = "fs-1" style="text-align: center;"><h2>Hi <?php echo $_SESSION['name'] ?>,</h2><h4>Fill the form to update news.</h4></i>
                    <br>
                    <table class="sell_table" style="width: 800px;">                           
                        <tr>
                            <td><label>Brand:</label></td>
                            <td>
                                <input class="form-control" type="text" name="txtTopic" value = "<?php echo $row['topic'] ?>" aria-label="default input example" required>
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
        require_once('../Database/db_connnection.php');
        $sql = "UPDATE `news` SET `topic` = '".$_POST['txtTopic']."',`discription` = '".$_POST['txtDisc']."' WHERE `news`.`newsID` = ".$_SESSION['passEditNews'];

        $result = mysqli_query($conn, $sql);
        if ($result = true) {
            echo '<script>alert("Update successfully!");</script>';
            echo "<script>window.top.location='../admin-panel.php'</script>";


        }
        else{
            echo '<script>alert("Update Fail!");</script>';
        }
}
?>