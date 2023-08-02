<br>
<h4 style="text-align: center;"> Welcome to the Advertiesment Income Page </h4></i>         
<br>
<hr color="blue">
<br>

<!-- ...............................................ADD MONTHLY INCOME LIST........................................ -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <?php
                use UI\Controls\Group;
                $conn = mysqli_connect("localhost","root" , "" , "nissanmotodb");
                $sql = "SELECT YEAR(payDate) as yname , MONTHNAME(payDate) AS mname, SUM(amount) as total FROM payment Group BY MONTH(payDate)";
                $result = $conn->query($sql);
            ?>

            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <h5 style="text-align: center;"> Monthly Income List </h5>   
                <table class="table table-bordered table-striped mb-0">
                    <thead> 
                        <tr>
                            <th scope="col"> Year </th>
                            <th scope="col"> Month </th>
                            <th scope="col"> Total Amount </th>
                        </tr>
                    </thead>
                    <?php while ($row = $result->fetch_object()): ?>
                        <tr>
                            <td> <?php echo $row->yname; ?> </td>
                            <td> <?php echo $row->mname; ?> </td>
                            <td> <?php echo $row->total; ?> </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>

        <?php 
        // .................................................ADD BAR CHART.......................................................
        require_once('Database/db_connnection.php');
        $query = "SELECT MONTHNAME(payDate) AS mname, SUM(amount) as total FROM payment  GROUP BY mname " ;
        $result = mysqli_query($conn, $query);
        $chart_data = '';
        while($row = mysqli_fetch_array($result)){
            $chart_data .= "{ mname:'".$row["mname"]."', total:".$row["total"]."}, ";
        }
        $chart_data = substr($chart_data, 0, -2);
        ?>

<!-- ..........................ADD MONTHLY INCOME GRAPH CHART....................... -->
        <div class="col-sm-8">
            <div class="container">
                <h5 style="text-align: center;"> Monthly Income Chart </h5>     
                    <div id="chart"></div>
            </div>
            <div class = "container">
            </div>
        </div>  



        <script>
        Morris.Bar({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'mname',
        ykeys:['total'],
        labels:['total'],
        hideHover:'auto',
        stacked:true
        });
        </script>

    </div>
</div>

        <br>
        <hr color="blue">
        <br>


<div class="container">
    <h5 style="text-align: center;"> View Your Selected Day Income </h5> <br>
    <div class="d-flex justify-content-center">
        <form action="" method="POST" align="center">
            <label>Date Range: </label>
            <input type="date" name="txtBeforeDate">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>To: </label>
            <input type="date" name="txtAfterDate">
            <br><br>
            <div class="d-flex justify-content-center">
                <input type="submit" name="btnView" value="View" class="btn btn-primary">
                &nbsp;&nbsp;
                <button name="btnDownload"  class="btn btn-success" onclick="window.print()"> Download </button>
                &nbsp;&nbsp;
                <input type="reset" name="btnCancel" value="Cancel" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>



<!-- ......................INCOME LIST USING DATE PICKER............................ -->
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
                if (isset($_POST['txtBeforeDate']) && isset($_POST['txtAfterDate'])){
                    $txtBeforeDate = $_POST['txtBeforeDate'];
                    $txtAfterDate = $_POST['txtAfterDate'];
                    require_once('Database/db_connnection.php');
                    $query = "SELECT payDate , payID , userID , addID , bankName, amount  FROM payment Where payDate Between '$txtBeforeDate' AND '$txtAfterDate' ORDER BY payDate" ;
                    $query_run = mysqli_query($conn,$query);
                    if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $row){
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
                    else {
                        echo '<script>window.alert("No Records Found!")</script>';
                    }
                } 
            ?>
        </tbody>
        </table> 
        <br>      
</div>

<hr color="blue">









