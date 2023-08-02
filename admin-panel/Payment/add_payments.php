<?php 
session_start();
?>

<!-- ----------------------------------------- ADD AUTO INCREMENT PAY_ID --------------------------------- -->
          <?php
          require_once('../../Database/db_connnection.php');

            $sql = "SELECT MAX(`payID`) FROM `payment`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $itemNo = $row['MAX(`payID`)']+1;
                }
            } 
            else {
                echo "0 results";
            }
   	  	?>

<head>
  <title> Advertiesment Payment </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- ------ Column Cards -------->  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
/* ------ Column Cards CSS --------*/
#card2, #card3 {
  box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
  padding: 50px;
  text-align: center;
  background-color: #f1f1f1;
}
#paycard{
  box-shadow: 0 30px 40px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<div class="d-flex justify-content-center" > 
    <h2><b> Advertisment Payment Submission Page</b> </h2>
</div>

<hr color="blue">

<!-- -------------------------------------------- Payment Form -------------------------------------------------------->

<div class="d-flex justify-content-center" >
<div class="row">
<div class="column">
<div id="paycard">
        <form method="post" enctype="multipart/form-data">
         <br>
            <table class="sell_table" style="width: 600px;" border="0">
            <tr>
                <td colspan="2"> <h4 align="center"> Submission & Payment </h4> </td>   
            </tr>
            <tr>
            <td><br>
                    <label> Payment ID : </label>
                    <input class="form-control" type="text" name="txtPayID" style="width: 200px;" aria-label="default input example" value="NMPID<?php echo $itemNo; ?>" readonly>
                </td>
                <td><br>
                    <label> Payment Amount : LKR.</label>
                    <input class="form-control" type="number" name="intAmount" aria-label="default input example" value="1000" readonly>
                </td> 
            </tr>         
            <tr>
            <td><br>
                    <label> Advertisment ID : </label>
                    <input class="form-control" type="text" name="txtAddID" style="width: 200px;" aria-label="default input example" value="<?php echo $_SESSION['addID2pay']; ?>" readonly>
                </td> 
                <td><br>
                    <label> Bank Name : </label>
                    <input class="form-control" type="text" name="txtBank" aria-label="default input example" required >
                </td>
            </tr>        
            <tr>
                <td><br>
                    <label> Date Of Payment : </label>
                    <input type="date" name="txtPayDate" required >
                </td>
                <td><br>
                    <label> Payment Slip : </label> 
                    <input type="file"  name="filePay" id="filePay" required >
                </td> 
            </tr>              
            <tr>
                <td colspan="2" align="center"> <br>

            <p style="color: red;">
            <?php
              if (isset($_POST["btnSubmit"]))
              {
                $payId = $_POST["txtPayID"];
                $amount = $_POST["intAmount"];
                $addId = $_POST["txtAddID"];
                $bankname = $_POST["txtBank"];
                $paydate = date_create("txtPayDate");
                $img1 = addslashes(file_get_contents($_FILES['filePay']['tmp_name']));
                //$payImg = addslashes(file_get_contents($_FILES['filePay']['tmp_name']));
                date_default_timezone_set("Asia/Colombo");
                $time = date("Y-m-d h:i:sa");

                require_once('../../Database/db_connnection.php');
                //$sql1 = "INSERT INTO `payment` (`payID`, `userID`, `addID`, `amount`, `bankName`, `paySlip`, `payDate`) VALUES ('".$itemNo."', '".$_SESSION['userID']."', '".$_SESSION['addID2pay']."', '".$amount."', '".$bankname."', ". $payImg.", '".$paydate."');";
                $sql = "INSERT INTO `payment` (`payID`, `userID`, `addID`, `amount`, `bankName`, `paySlip`, `payDate`, `submissionDate`) VALUES ('".$itemNo."', '".$_SESSION['userID']."', '".$_SESSION['addID2pay']."', '".$amount."', '".$bankname."', '{$img1}', '".$paydate."','".$time."');";
                if(mysqli_query($conn,$sql)){
                  echo "<script>alert('Payment submission sucessfully!')</script>";
                  echo "<script>window.top.location='../../user-panel.php'</script>";
                }
                else{
                  echo "<script>alert('Something went wrong, Please try again!')</script>";
                }
              }
            ?>
            </p>
            </tr>  
            <tr>
                <td colspan="2" align="center"> <blockquote>
                    <input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-dark" value="SUBMIT"  style="width: 400px;" />
                    <input type="reset" name="clear" class="btn btn-secondary" value="CLEAR"  style="width: 190px;" /> 
                    <blockquote></td>
            </tr>               
        </table>
      </form>
</div>
</div>
</div>
</div>

<br>

<!-- ------------------- PAYMENT STEP BUTTON ---------------------------->
<table align="center">
<tr>
<td>
<div class="container mt-3">
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"> How To Make a Payment</button>
</div>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Payment Steps </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
            <div class="modal-body"> Sign in with NissanMoto using the correct credentials. </div>
            <div class="modal-body"> Read all terms and conditions below. </div> 
            <div class="modal-body"> Make the required payments with  BOC Bank or Commercial Bank through online banking or deposit slips. <br> <b> Advertising fee is Rs.1000 / = And Valid for one month </b></div>
            <div class="modal-body"> Fill in the panel and clearly attach the payment slips. If making a payment deposit slip, take a photo and attach it. If you do an online banking payment, take a screenshot or photo and attach it. </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
     </div>
  </div>
</div>
</div>
</td>
<td>
<!-- ------------------- READ TERM AND CONDITION BUTTON ------------ -->
<div class="offcanvas offcanvas-start" id="demo">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title"> Terms & Conditions  </h3>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
<div class="offcanvas-body">
  <ul>
        <li> Once the user submits the payment submission form correctly, the NissanMoto team will check the details and payment entered by the user. 
            The advertisement will be published within 24 hours. </li>
        <li> NissanMotor does not accept any responsibility for misrepresentation of paid content. </li>
        <li> NissanMotor reserves the right to change the advertising time and content for publishing purposes
             based on payment. </li>
        <li> NissanMotor collects information from users and advertisers. Use of NissanMotor is a condition 
            that all users and advertisers authorize and authorize NissanMotor to collect and use this information. </li>
        <li> Advertisers and users are responsible for ensuring that the payment details, payment slip pictures 
            and details uploaded for inclusion in NissanMotor comply with all applicable laws.</li>
        <li> Some content and services of NissanMotor require payment, including but not limited to, 
            membership packages, posting of ads in select categories, and sale of items through Doorstep Delivery.</li>  
        <li> NissanMotor is operated under the laws and regulations of Sri Lanka. </li>     
  </ul>
  <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas"> Ok..Got it</button>
</div>
</div>
<div class="container-fluid mt-3">
  <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> Read Term & Conditions </button>
</div>
</div>
</td>
</tr>
</table>

<hr color="blue">
<br>

<!-- -------------------------------------------- Payment Option ------------------------------------------------------->

<h4 align="center"> Payment Option </h4>  
<table align="center">
<tr>
<td>
<div class="d-flex justify-content-center" >
<div class="row">
  <div class="column">
        <div class="card" id="card2">
        <center>
        <img src="../../Images/payBOC.jpg" height="50px" width="70px">
        <h5> Bank of Ceylon BOC</h5>
        <p> Account No : 00012345678</p>
        <p> In favor of : <br> NissanMoto(PVT)LTD </p>
        </center>
        </div>
  </div>
  </td>
<td></td><td></td><td></td><td></td><td></td>
  <td>
  <div class="column">
        <div class="card" id="card3">
        <center>
        <img src="../../Images/payCOM.png" height="50px" width="50px">
        <h5> Commercial Bank </h5>
        <p> Account No : 00012345678</p>
        <p> In favor of : <br> NissanMoto(PVT)LTD </p>
        </center>
        </div>
  </div>
</div>
</div>
</div>
</td>
</tr>
</table>

<hr color="blue">


<?php  

// -------------------------------------------------- validate fields ------------------------------------------------------
/*
function validateTextField(){
    if( !empty($_POST['txtUserID']) && !empty($_POST['intAmount']) && !empty($_POST['txtPayID']) 
    && !empty($_POST['txtBank']) && !empty($_POST['txtAddID']) ) {
        return true;
    }
    else {
        return false;
    }
}

// --------------------------------------------------- validate paySlips -------------------------------------------------
function validateImages(){
    if(is_uploaded_file($_FILES['payImage']['tmp_name'])){
        return true;
    }
    else {
        return false;
    }
}
*/

?>







