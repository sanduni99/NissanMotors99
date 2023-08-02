
<?php

session_start();

require_once('../Database/db_connnection.php');

$sql = "SELECT * FROM advert a , user u  WHERE a.userID=u.userID AND a.addID=".$_SESSION['report_ID'];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
        // ------- output data of each row
        while($row = mysqli_fetch_assoc($result)) {

                $addID = $row["addID"];
                $userID = $row["userID"];
                $name = $row["name"];
                $email = $row["email"];
                $brand = $row["brand"];
                $model = $row["model"];
                $capacity = $row["engineCapacity"];
                $fuel = $row["fuelType"];
                $condition = $row["conditionType"];
                $manu_year = $row["yearOfMan"];
                $price = $row["price"];
                $district = $row["distric"];
                $post_date = $row["date"];
                $discription = $row["discription"];
                

        require ('fpdf184/fpdf.php');
        $pdf = new FPDF ();
        $pdf -> AddPage ();
        $pdf -> SetFont ('Arial','B',11);
        $pdf -> Cell (1,10, '   Detail Report of Advertiesment');
        $pdf -> Cell (1,13, '_______________________________________________________________________________');
        $pdf -> Cell (1,30, 'Advert ID: '.$row["addID"].'');
        $pdf -> Cell (1,50, 'User ID: '.$row["userID"].'');
        $pdf -> Cell (1,70, 'User Name: '.$row["name"].'');
        $pdf -> Cell (1,90, 'Email: '.$row["email"].'');
        $pdf -> Cell (1,110, 'Car Brand: '.$row["brand"].'');
        $pdf -> Cell (1,130, 'Car Model: '.$row["model"].'');
        $pdf -> Cell (1,150, 'Engine Capacity: '.$row["engineCapacity"].' CC');
        $pdf -> Cell (1,170, 'Fuel Type: '.$row["fuelType"].'');
        $pdf -> Cell (1,190, 'Condition: '.$row["conditionType"].'');
        $pdf -> Cell (1,210, 'Year Of Manufacture: '.$row["yearOfMan"].'');
        $pdf -> Cell (1,230, 'Price: Rs.'.$row["price"].'/=');
        $pdf -> Cell (1,250, 'District: '.$row["distric"].'');
        $pdf -> Cell (1,270, 'Posted Date: '.$row["date"].'');
        $pdf -> Cell (1,290, 'Discription: '.$row["discription"].'');
        $pdf -> Output();

        }
} 		

?>
