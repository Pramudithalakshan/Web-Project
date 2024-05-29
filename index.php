<?php

include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FruitVista</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.js">
    <link rel="stylesheet" href="style.css">

    <link rel="#" href="#">
    <link rel="stylesheet" href="resource/img/icon1.svg"/>
</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center mt-5">

        <!-- signupbox -->

        <div class="singup_box p-4" id="signUpBox">
            <div class="row g-2">
            <h2 class="text-center">Join With US</h2>



                <div class="mt-3 d-none" id="msgdiv">
                    <div class="alert alert-danger" role="alert" id="msg">

                    </div>
                </div>

                <div class="col-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="Pramuditha" id="fname" />
                </div>

                <div class="col-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Lakshan" id="lname" />
                </div>

                <div class="col-12">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" id="email" />
                </div>

                <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="********" id="password" />
                </div>

                <div class="col-6">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" placeholder="+94 00 000 000" id="mobile" />
                </div>

                <div class="col-6">
                    <label class="form-label1">Gender</label>
                    <select class="form-control" id="gender">
                 


                        <?php

                        $rs = Database::search("SELECT * FROM `gender`");
                        $num = $rs->num_rows;

                        for ($x = 0; $x < $num; $x++) {
                            $data = $rs->fetch_assoc();


                        ?>  
                            <option value="<?php echo $data["gender_id"]; ?>">
                                
                                <?php echo $data["gender_name"]; ?>

                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-primary" onclick="signup();">Sign Up</button>
                </div>

                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-dark" onclick="changeView();">Already have an account?</button>
                </div>

            </div>
        </div>

        <!-- signupbox -->

        <!-- signinbox -->

        <div class="signin_box2 col-12 col-lg-4 p-3 d-none" id="signInBox">
            <div class="row g-5">

                <div class="mt-2 d-none" id="msg 1">
                    <div class="alert alert-dark" role="alert" id="msg1"></div>
                </div>

                <?php
                $email = "";
                $password = "";

                if (isset($_COOKIE["email"])) {
                    $email = $_COOKIE["email"];
                }

                if (isset($_COOKIE["password"])) {
                    $password = $_COOKIE["password"];
                }
                ?>



                <div class="col-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" id="email2" value="<?php echo $email; ?>" />
                </div>

                <div class="col-12 signin_form-label-style ">

                    <label class="form-label"  for="showpasswordoption">Password</label>
                    <input type="password" class="form-control" placeholder="********" id="password2" value="<?php echo $password; ?>" />

                    <input type="checkbox" onchange="showPassword(this)">
                    <label for="showPasswordCheckbox" class="mt-3">Show Password</label>

                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberme" />
                        <label class="form-check-label">Remember Me</label>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <a href="#" class="link-primary">Forgot Password?</a>
                </div>
                <div class="col-6 col-lg-6 d-grid">
                    <button class="btn btn-primary" onclick="signin();">Sign In</button>
                </div>
                <div class="col-6 col-lg-6 d-grid">
                    <button class="btn btn-danger" onclick="changeView();">New to eShop? Join Now</button>
                </div>
            </div>
        </div>

        <!-- signinbox -->

    </div>

    </div>
    <script src="script.js"></script>
</body>

</html>