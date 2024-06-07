<?php
include "connection.php";
session_start();
if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"];
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $user["email"] . "'");
    $data = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
    </head>

    <body>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.js" />
        </head>

        <body>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <div class="card bg-body-secondary">
                            <div class="d-flex justify-content-center">
                                <img src="
                        <?php
                        if (!empty($data["p_img_path"])) {
                            echo $data["p_img_path"];
                        } else {
                            echo "resource/img/profile.png";
                        }
                        ?>
                        " alt="" height="150px" id="i">
                            </div>

                            <div class="card-body">

                                <h5 class="card-title"><?php echo $user['fname']; ?> <?php echo $user['lname']; ?></h5>

                               
                                <p class="card-text"><?php echo $user['email']; ?></p>

                                <form id="uploadForm" enctype="multipart/form-data">
                                    <input type="file" id="imageUpload" accept="image/*" class="col-12 bg-body-secondary">
                                    <button type="submit" class="btn btn-primary btn-sm col-12" onclick="uploaduserimg();">Update Picture</button>
                                </form>

                                <div>
                                    <button class="btn btn-danger mt-3" onclick="signOut();">Log Out</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-8 ">

                        <div class="row">

                            <div class="col-6">

                                <h5 class="text-center">User Details</h5>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" value="<?php echo $data["fname"]; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $data["lname"]; ?>">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $data["email"]; ?>">
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" value="<?php echo $data["mobile"]; ?>">
                                </div>

                                <div class="row mt-3">

                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" value="<?php echo $data["password"]; ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <h5 class="mt-3">Shipping Address</h5>

                                <div class=" mt-3">

                                    <div>
                                        <label class="form-label">Line 01:</label>
                                        <input type="text" class="form-control" id="line1">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Line 02:</label>
                                    <input type="text" class="form-control" id="line2">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-outline-warning w-100" onclick="updateData();">Update</button>
                                </div>

                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <script src="script.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
             
        </body>

    </html>

<?php
} else {
    header("location: signin.php");

}

?>