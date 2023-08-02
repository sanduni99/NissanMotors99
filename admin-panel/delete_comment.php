
<?php session_start();
    $cmtID = $_GET["cmtID"];
    require_once('../Database/db_connnection.php');
    $sql =  "DELETE FROM `comment` WHERE `commentID` = '".$cmtID."' ";

    if(mysqli_query($conn,$sql)){
        echo '<script>alert("File Deleted");</script>';
        echo "<script>window.top.location='../admin-panel.php?comment=true'</script>";
    }
    else{
        echo '<script>alert("Something went wrong , Please select the file again...");</script>';
    }
        
?>
