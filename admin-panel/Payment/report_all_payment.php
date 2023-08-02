<?php 
session_start();
?>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>  

<body>

<center>
<table>
    <tr>
        <td> <img src="../../Images/icon/logo.jpg" width="250" alt="nissanmotologo"> </td>
        <td></td><td></td><td></td><td></td>
        <td> <h2> NissanMotors (PVT) LTD. </h2> 
             <h6> Address : No.288, Katugasthota Road, Kandy, Sri Lanka.</h6>
             <h6> Contact No : 081 49401813 | 077 4362019 </h6>
             <h6> Email : nissanmotors@gmail.com </h6>
             <h6> Web : <a href="www.nissanmotors.com"> www.nissanmotors.com </a> </h6>
        </td>
    </tr>
</table>


<hr color="black">
<h3> Report on all payments </h3>
</center>
<table class="table table-hover" border="1" align="center">
  <thead>
  <tr> 
    <td> <b> Payment ID </td>
    <td> <b> User ID </td>
    <td> <b> Advertiesment ID</td>
    <td> <b> Amount </td>
    <td> <b> Bank Name </td>
    <td> <b> Pay Slips </td>
    <td> <b> Date Of Payment </td>
    <td> <b> Date Of Submission </td> 
  </tr>
  </thead>
  <tbody>
<?php

include "db_connection.php"; // Using database connection file here

$records = mysqli_query($db,"select * from payment"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr align="center">
    <td><?php echo $data['payID']; ?></td>
    <td><?php echo $data['userID']; ?></td>
    <td><?php echo $data['addID']; ?></td>
    <td><?php echo $data['amount']; ?></td>
    <td><?php echo $data['bankName']; ?></td>
    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['paySlip']); ?>" id="img1" height="80" /></td>
    <td><?php echo $data['payDate']; ?></td>
    <td><?php echo $data['submissionDate']; ?></td>
  </tr>	
<?php
}
?>   
</tbody>
</table>

<p style="text-align:center;color:red;"> This is a computer generated report and carries no signature or seal  &nbsp;&nbsp;
<a href="#" onclick="window.print()" style="color:blue;" > DOWNLOAD REPORT </a>
</p>
</body>