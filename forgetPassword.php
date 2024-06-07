<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resource/img/icon1.svg"/>
    <title>forgetPassword</title>
</head>

<body>
    <div class="container-fluid vh-100 d-flex justify-content-center mt-5">

        <div class="signin_box2 col-12 col-lg-4 p-3 " id="signInBox">
            <div class="row ">
                <h2 class="text-center">Forget Password</h2>

                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="forgetemail">
                </div>
                
                <div class="mt-2">
                    <button class="btn btn-secondary col-12" onclick="forgetPassword();">Send Email</button>
                </div>

                <div class="d-none" id="msgDiv">
                    <div class="alert" id="msg"></div>
                </div>

                
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>