 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link rel="stylesheet" href="bootstrap.js" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/img/icon1.svg"/>
</head>

<body>
    <!-- signinbox -->
    <div class="container-fluid vh-100 d-flex justify-content-center mt-5">

        <div class="signin_box2 col-12 col-lg-4 p-1 " id="signInBox">
            <div class="row g-5">

            <h2 class="text-center">Reset Password</h2>

                <div class="d-none">
                    <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"]) ?>" />
                </div>


                <div class="col-12">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" placeholder="**********" id="newpass1" />
                </div>

        

                <div class="col-12">
                    <label class="form-label">Re-Enter Password</label>
                    <input type="password" class="form-control" placeholder="**********" id="newpass2" />
                </div>

                <div class="col-12 col-lg-12 d-grid">
                    <button class="btn btn-primary" onclick="resetPassword();">Update</button>

                </div>


                <div class="mt-2 d-none" id="msgDiv1">
                    <div class="alert alert-dark" role="alert" id="msg1"></div>
                </div>


            </div>
        </div>
    </div>

    <!-- signinbox -->


    <script src="script.js"></script>
</body>

</html>