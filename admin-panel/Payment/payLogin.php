<?php session_start(); ?>

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

<br>
<div class="d-flex justify-content-center">
    <h2><b> Payment Login Page</b> </h2>
</div>  
<br>
<form name="login" method="post" action="payLogin.php"> 
<div class="d-flex justify-content-center">    
<table width="400px" border="0">
    <tr>
        <td> 
            <label> User Email : </label>
        </td> 
        <td>
            <input class="form-control" type="text" placeholder="Enter User Email" name="txtEmail" required>
        </td> 
    </tr> 
    <tr>
        <td> <br>
            <label> Password : </label>
        </td> 
        <td>
            <input class="form-control" type="password" placeholder="Enter Password" name="txtPassword" required>
        </td> 
    </tr> 
    <tr> 
        <td colspan="2">
        <br>    
        <p>
        <?php
        if (isset($_POST["btnsubmit"]))
        {
          $userEmail = $_POST["txtEmail"];
          $password = $_POST["txtPassword"];

          $valid = false;
        
          $con = mysqli_connect("localhost","root","","nissanmotodb");

          if(!$con)
          {
            die("Cannot connect to DB server");
          }

          $sql = "SELECT * FROM `login` WHERE `email`= '".$userEmail."' and `password`= '".$password."' ";

          $result = mysqli_query($con,$sql);

          if(mysqli_num_rows($result) > 0 )

          {
             $valid = true;
          }
           
          else  
          {
            $valid = false;
          }

          if ($valid)
          {
            $_SESSION ["userEmail"] = $userEmail;
            header('Location:add_payments.php');
          }
          else 
          {
            echo "Please enter correct User Email & Password !";
          }
        }
        ?>
      </p>
    </td>
</tr>
<tr> 
    <td colspan="2"> 
    <button class="btn btn-dark" type="submit" name="btnsubmit" style="width: 400px;"> Login </button>
    </td>
</tr>
</table>
</div>  
</form>
</body>