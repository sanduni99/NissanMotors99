<?php

        session_start();
        //text
        $text1 = '                      Detail Report of Advertiesment';
        $text2 = '_______________________________________________________________________________';

        //set date
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d h:i:sa");

        //Admin name
        $_SESSION['name'];

        //Advertiesment names
                        require_once('Database/db_connnection.php');
                        $sql1 = "SELECT COUNT(`addID`) FROM `advert`";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while($row1 = mysqli_fetch_assoc($result1)) {
                                $totalAdds =  $row1['COUNT(`addID`)'];
                            }
                        }

                        $sql2 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Posted'";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                $postedAdds = $row2['COUNT(`addID`)'];
                            }
                        }

                        $sql3 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Rejected'";
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3) > 0) {
                            while($row3 = mysqli_fetch_assoc($result3)) {
                                $rejectedAdd =  $row3['COUNT(`addID`)'];
                            }
                        }

                        $sql4 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Pending'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4) > 0) {
                            while($row4 = mysqli_fetch_assoc($result4)) {
                                $pendingAdd =  $row4['COUNT(`addID`)'];
                            }
                        }

                        $sql5 = "SELECT COUNT(`addID`) FROM `advert` WHERE `status` = 'Deleted'";
                        $result5 = mysqli_query($conn, $sql5);
                        if (mysqli_num_rows($result5) > 0) {
                            while($row5 = mysqli_fetch_assoc($result5)) {
                                $deletedAdd =  $row5['COUNT(`addID`)'];
                            }
                        }

                        $sql6 = "SELECT COUNT(`userID`) FROM `user`";
                        $result6 = mysqli_query($conn, $sql6);
                        if (mysqli_num_rows($result6) > 0) {
                            while($row6 = mysqli_fetch_assoc($result6)) {
                                $totalUsers =  $row6['COUNT(`userID`)'];
                            }
                        }

                        $sql7 = "SELECT COUNT(`userID`) FROM `user` WHERE `type` = 'Admin'";
                        $result7 = mysqli_query($conn, $sql7);
                        if (mysqli_num_rows($result7) > 0) {
                            while($row7 = mysqli_fetch_assoc($result7)) {
                                $admins =  $row7['COUNT(`userID`)'];
                            }
                        }

                        $sql8 = "SELECT COUNT(`userID`) FROM `user` WHERE `type` = 'User'";
                        $result8 = mysqli_query($conn, $sql8);
                        if (mysqli_num_rows($result8) > 0) {
                            while($row8 = mysqli_fetch_assoc($result8)) {
                                $users = $row8['COUNT(`userID`)'];
                            }
                        }


        ob_end_clean();
        require ('fpdf184/fpdf.php');
        $pdf = new FPDF();
        $pdf -> AddPage ();
        $pdf -> SetFont ('Courier','B',18);
        //$pdf -> Image('logo.png',10,20,33,0);
        $pdf -> Cell (1,10, '         Admin Report of Nissan Motors');
        $pdf -> Cell (1,15, '_________________________________________________');
        $pdf -> SetFont ('Courier','B',11);
        $pdf -> Cell (1,30, "Date:   ".$date);
        $pdf -> Cell (1,45, "Admin:  ".$_SESSION['name']);
        $pdf -> Cell (1,60, "Advertiesments Details -->   ");
        $pdf -> Cell (1,70, "     Total Advertiesments:    ".$totalAdds);
        $pdf -> Cell (1,80, "     Posted Advertiesments:   ".$postedAdds);
        $pdf -> Cell (1,90, "     Rejected Advertiesments: ".$rejectedAdd);
        $pdf -> Cell (1,100, "     Pending Advertiesments:  ".$pendingAdd);
        $pdf -> Cell (1,110, "     Deleted Advertiesments:  ".$deletedAdd);

        $pdf -> Cell (1,125, "User Details-->  ");
        $pdf -> Cell (1,135, "     Deleted Advertiesments:  ".$totalUsers);
        $pdf -> Cell (1,145, "     Deleted Advertiesments:  ".$admins);
        $pdf -> Cell (1,155, "     Deleted Advertiesments:  ".$users);

        $pdf -> Output();
        ob_end_flush();


        /*require ('fpdf184/fpdf.php');
                        $pdf = new FPDF();
                        $pdf -> AddPage ();
                        $pdf -> SetFont ('Courier','B',11);
                        $pdf -> Cell (1,10, '                      Detail Report of Advertiesment');
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
                        $pdf -> Output();*/

                    
?>