<?php
session_start();

if (isset($_SESSION["a"])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Admin Dashboard</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.js" />

        <link rel="icon" href="resource/img/icon1.svg" />
    </head>

    <body class="admin-body" onload="loadUser();">

        <!--navbar-->
        <?php include "adminNavBar.php" ?>
        <!--navbar-->



        <div class="col-10 col-lg-10">
            <h2 class="text-center col-10">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">
                <div>
                    <div class="alert alert-danger d-none"></div>
                </div>

                <button class="btn btn-outline-info col-8 mt-3 mb-4 col-lg-2" onclick="viewFilter();">Status Change</button>

                <div class="d-none" id="filterId">
                    <div class="border border-light rounded-4 mt-4 p-5 col-10  mb-3">
                        <div class="row d-flex justify-content-end mt-4">
                            <div class="d-none" id="msgDiv" onclick="reload();">
                                <div class="alert alert-danger" id="msg"></div>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control mb-3" placeholder="User Email" id="uemail" />
                            </div>

                            <button class="btn btn-outline-light col-10 col-lg-2" onclick="updateUserStatus();">Change Status</button>
                        </div>

                    </div>
                </div>

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
            <p class="text-center">&copy; 2024 FruitVista</p>
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