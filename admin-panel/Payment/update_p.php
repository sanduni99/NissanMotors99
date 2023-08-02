<?php session_start(); 

$payId = $_GET["txtPayID"];
$addId = $_GET["txtAddID"];
$Amount = $_GET["intAmount"];
$bankname = $_GET["txtBank"];
                
/*$payImg = "uploads/".basename($_FILES["filePay"]["name"]);
move_uploaded_file($_FILES["filePay"]["tmp_name"],$payImg);*/

$payImg = addslashes(file_get_contents($_FILES['filePay']['tmp_name']));

$paydate = date_create("txtPayDate");

$con = mysqli_connect("localhost","root","","nissanmotodb"); 
				   
		  if(!$con)
			{
				      die("Cannot connect to DB Server");
			}
					
			$sql = "UPDATE `payment` 
      SET `addID`='".$addId."',`amount`='".$Amount."',`bankName`='".$bankname."',`paySlip`='".$payImg."' ,`payDate`='".$paydate."' 
      WHERE `payID` = '".$payId."'" ;
					
		  if(mysqli_query($con,$sql))
			{
				echo "File Updated Sucessfully";
				echo "<script>window.top.location='../../admin-panel.php?viewPayment=true'</script>";
			}
			else
			{
				echo "Something went wrong , Please select the file again !!!!";
			}

            //header('Location:../admin-panel.php?viewPayment=true');
			

?>