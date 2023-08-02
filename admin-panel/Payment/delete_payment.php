<?php 
  session_start();
  
  $payID = $_GET["txtPayID"];
  require_once('../../Database/db_connnection.php');
  $sql =  "DELETE FROM `payment` WHERE `payID` = '".$payID."' ";
  if(mysqli_query($conn,$sql)){
    echo '<script>window.alert("File Deleted")</script>';
    echo "<script>window.top.location='../../admin-panel.php?viewPayment=true'</script>";
  }
  else{
    echo '<script>window.alert("Something went wrong , Please select the file again...")</script>';
  }
    
?>