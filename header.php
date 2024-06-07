<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap.css" />


</head>

<body>


    <div class="  container-fluid bg-info  ">


        <nav class="navbar navbar-expand-lg bg-info ">
            <div class="container justify-content-center me-5">
                <a class="navbar-brand" href="#"><img class="me-3" src="resource/img/icon1.ico" height="40" />Fruit Vista</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="home.php">Home</a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link" href="userProfile.php">User Profile</a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link" href="orderHistory.php">Order History</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link" href="adminSignin.php">Admin</a>
                        </li>



                         

                        <form class="d-flex me-5" role="search">
                            <input class="form-control " type="search" placeholder="Search" aria-label="Search" id="productsearch" onkeyup="Basicsearch(0);">
                             
                        </form>
                        <a href="advanceSearch.php"> <button class="btn btn-outline-danger me-5" type="submit" onclick="viewFilter();">Advance Search</button></a>


                        
 
                    </ul>

                </div>



            </div>


        </nav>

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>