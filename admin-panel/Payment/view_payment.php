<style>
th, td {
  text-align: center;
  font-size: 14px;
}
</style>

<div class="d-flex justify-content-center" > 
    <h2> <b> All Payment Details </b> </h2> 
</div>


<p align="right">
<button class="btn btn-danger"  > <a href="admin-panel/Payment/report_all_payment.php" style="color:white;"> View Report </a>  </button> &nbsp; 
</p>

<table class="table table-hover" border="2" align="center">
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
         <td> <b> Action </td>
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

    <td>
      <a href="admin-panel/Payment/update_payment.php?txtPayID=<?php echo $data['payID']; ?>" class="btn btn-secondary"><i class="fas fa-marker"></i> </a>
      <a href="admin-panel/Payment/delete_payment.php?txtPayID=<?php echo $data['payID']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> </a>
    </td>
  </tr>	
<?php
}
?>   
</tbody>
</table>