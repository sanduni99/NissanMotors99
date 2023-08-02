<div class="container">
        <h5> Income List</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td> Date Of Payment</td>
                    <td> Payment ID </td>
                    <td> User ID </td>
                    <td> Advertisment ID </td>
                    <td> Bank Name </td>
                    <td> Amount </td>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['txtBeforeDate']) && isset($_GET['txtAfterDate']))
                {
                    $txtBeforeDate = $_GET['txtBeforeDate'];
                    $txtAfterDate = $_GET['txtAfterDate'];

                    $conn = mysqli_connect("localhost","root" , "" , "nissanmotodb");

                    $query = "SELECT payDate , payID , userID , addID , bankName, amount  FROM payment Where payDate Between 
                    '$txtBeforeDate' AND '$txtAfterDate' ORDER BY payDate" ;

                    $query_run = mysqli_query($conn,$query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>
                            <tr>
                                <td> <?php echo $row['payDate']; ?> </td>
                                <td> <?php echo $row['payID']; ?> </td>
                                <td> <?php echo $row['userID']; ?> </td>
                                <td> <?php echo $row['addID']; ?> </td>
                                <td> <?php echo $row['bankName']; ?> </td>
                                <td> <?php echo $row['amount']; ?> </td>
                           
                            </tr>
                            <?php
                        }
                    }
                else 
                {
                    echo "No Records Found!";
                }
            } 
        ?>
        </tbody>
        </table> 
        <br>      
</div>
