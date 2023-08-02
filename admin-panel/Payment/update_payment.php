<?php 
session_start();

?>

<head>
  <title>Nissan Motors - Pay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  /* Style the counter cards */
.card {
  box-shadow: 0 22px 30px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>  
  
</head>
<body>

<?php
	
  require_once('../../Database/db_connnection.php');
	$sql = "SELECT * FROM `payment` WHERE `payID` = ".$_GET["txtPayID"]."" ;
	$result = mysqli_query($conn,$sql);			
	 if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);	
?>

<br>
<div class="d-flex justify-content-center" >
<div class="row">
<div class="column">
<div class="card">  
<form method="post" enctype="multipart/form-data">
<h2 class="glow"> Update Payment </h2>
      <table width="500" height="300" border="0" align="center">
      <tr>
        <td width="200"> Advertisement ID : </td>
        <td width="200"> <input type="text" name="txtAddID" id="txtAddID" value="<?php echo $row["addID"]; ?>" disabled/></td>
      </tr>
      <tr>
        <td> Payment Amount : </td>
        <td> <input type="int" name="intAmount" id="intAmount"  value="<?php echo $row["amount"]; ?>" required/></td>
      </tr>
      <tr>
        <td> Bank Name : </td>
        <td> <input type="text" name="txtBank" id="txtBank" value="<?php echo $row["bankName"];?>" required/></td>
      </tr>
      <tr>
        <td> Payment Slip : </td>
        <td> <input type="file" name="filePay" id="filePay" required/></td>
      </tr>
      <tr>
        <td> Date Of Payment : </td>
        <td><input type="date" name="txtPayDate" id="txtPayDate" required/></td>
      </tr>
      <tr>
        <td colspan="2"><blockquote>
            <input name="btnSubmit" type="submit" id="btnSubmit" value="Update" class="btn btn-dark">
            <input name="btnReset" type="reset" id="btnReset" value="Cancel" class="btn btn-secondary"  />
        </blockquote></td>
      </tr>
    </table>
	<?php
	 }
	
	?>
  </form>
</div>
</div></div></div>

  </body>
  </html>

  <?php
  if(isset($_POST['btnSubmit'])){
    $payId = $_GET["txtPayID"];
    $addId = $row["addID"];  //$_POST["txtAddID"]
    $Amount = $_POST["intAmount"];
    $bankname = $_POST["txtBank"];

    $payImg = addslashes(file_get_contents($_FILES['filePay']['tmp_name']));
    $paydate = $_POST["txtPayDate"];

    require_once('../../Database/db_connnection.php');
    $sql = "UPDATE `payment` SET `addID`='".$addId."',`amount`='".$Amount."',`bankName`='".$bankname."',`paySlip`='".$payImg."' ,`payDate`='".$paydate."' WHERE `payID` = '".$payId."'" ;
    if(mysqli_query($conn,$sql)){
      echo '<script>window.alert("File Updated Sucessfully")</script>';
      echo "<script>window.top.location='../../admin-panel.php?viewPayment=true'</script>";
    }
    else{
      echo "Something went wrong , Please select the file again !!!!";
    }
    mysqli_close($con);
  }
  ?>
