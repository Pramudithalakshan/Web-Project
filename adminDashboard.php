<?php
session_start();

if (isset($_SESSION["a"])) {
?>


    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Admin Dashboard</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.js" />
    </head>

    <body class="admin-body" onload="loadUser();">

        <!--navbar-->
        <?php include "adminNavBar.php" ?>
        <!--navbar-->

        <div class="col-10">
            <h2 class="text-center">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">
                <div>
                    <div class="alert alert-danger d-none"></div>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" placeholder="User Id" id="statuschange" />

                </div>

                <button class="btn btn-outline-light col-2" onclick="upDateUserStatus();">change Status</button>
            </div>

            <table class="table">
                <thead>
                    <tr>

                        <td class="table-warning">First name</td>
                        <td class="table-warning">Last name</td>
                        <td class="table-warning">Mobile</td>
                        <td class="table-warning"> Email</td>
                        <td class="table-warning">Gender Id</td>
                        <td class="table-warning">Status</td>


                    </tr>
                </thead>
                <tbody id="tb">
                    <!--Table ROw-->

                </tbody>
            </table>
        </div>


        <!--Footer-->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 Online Store.lk || All Right Reserved</p>
        </div>
        <!--Footer-->

        <script src="script.js"></script>
    </body>

    </html>




<?php

} else {
    //echo ("You Are Not a Valid Admin");
}

?>