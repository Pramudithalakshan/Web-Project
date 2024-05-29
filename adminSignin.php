<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit_vista - Admin Signin</title>

    <link rel="stylesheet" href="bootstrap.js" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />

</head>

<body class="adminSigninBody">

    <div class="adminSigninBox">
        <h2 class="text-center">Admin Login</h2>


        <div class="col-12">
            <label class="form-label">Email</label>
            <input type="email" class="form-control border-black" placeholder="example@gmail.com" id="adminemail" />
        </div>

        <div class="col-12">
            <label class="form-label">Password</label>
            <input type="password" class="form-control  border-black" placeholder="********" id="adminpassword" />
        </div>

        <div class="mt-2 d-none" id="adminmsgDiv">
            <div class="alert alert-danger" role="alert" id="adminmsg"></div>
        </div>

        <div class="mt-5">
            <button class="btn btn-danger col-12 mb-2" onclick="adminSingin();">Sign In</button>
            <button class="btn btn-warning col-12" onclick="history.back()">Back To Home</button>
        </div>


    </div>

    <script src="script.js"></script>
</body>

</html>