<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`ut_id` ORDER BY `user`.`email` ASC");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="resource/img/icon1.svg"/>
        <title>User Report</title>
    </head>

    <body>
        <div class="container mt-3">
            <a href="adminReport.php"><img src="Resources/back.png" height="25"></a>
        </div>

        <div id="printarea">
            <div class="container mt-3">
                <h2 class="text-center ">User Report</h2>
                <table class="table table-hover mt-5">

                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>User type</th>
                            <th>Status</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                    
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["user_type_id"]?></td>
                                <td><?php echo $d["fname"]?></td>
                                <td><?php echo $d["lname"]?></td>
                                <td><?php echo $d["email"]?></td>
                                <td><?php echo $d["mobile"]?></td>
                                <td><?php echo $d["user_type"]?></td>
                                <td><?php 
                                    if ($d["status_status_id"] == 1){
                                        echo ("Active");
                                    } else {
                                        echo ("Inactive");
                                    }
                                ?></td>
                            </tr>
                        <?php 
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mt-3 d-flex justify-content-end">
            <button class="btn btn-outline-dark col-2" onclick="window.printDiv()">Print</button>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>


<?php
} else {
    echo ("You are not a Valid Admin");
}
?>
