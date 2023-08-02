<br>    
<h2 align="center"> Customer Comment Report </h2>  

<p align="right">
<a href="#" onclick="window.print()" > DOWNLOAD REPORT </a> &nbsp; 
</p>

<hr>  
<table class="table table-hover" border="2">
  <thead align="center" style="font-size:medium;">
  <tr>
    <td> Comment ID </td>
    <td> User ID </td>
    <td> News ID </td>
    <td> Name of commenter </td>
    <td> Comment </td>
    <td> Action </td>
  </tr>
  </thead>
  <tbody align="center">

  <?php
    require_once('Database/db_connnection.php'); // Using database connection file here
    $sql = "SELECT * FROM comment c, user u WHERE c.userID = u.userID";
    $records = mysqli_query($conn, $sql); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
    ?>

    <tr>
        <td><?php echo $data['commentID']; ?></td>
        <td><?php echo $data['userID']; ?></td>
        <td><?php echo $data['newsID']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['comment']; ?></td>
        <td> <a href="admin-panel/delete_comment.php?cmtID=<?php echo $data['commentID']; ?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </a></td>
    </tr>

<?php
}
?> 
  </tbody>
</table>	