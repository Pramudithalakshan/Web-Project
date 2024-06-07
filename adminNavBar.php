<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css" />
</head>

<body class="adminNavBar-body">

    <nav class="navbar navbar-expand-lg  fixed-top">

        <div class="container bg-info border-primary rounded-4">
            <a class="navbar-brand me-5 h1 mb-0" href="home.php"><img class="me-3" src="resource/img/icon1.ico" height="30" />Online Store Admin Dashboard</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="adminDashboard.php">User Management</a>
                    </li>

                    

                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="adminStock.php">Stock / Product Management</a>
                    </li>

                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="adminAddNewProducts.php">Add New Products</a>
                    </li>

                    <li class="nav-item me-5 ">
                        <div class="dropdown">
                            <a class="btn btn-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="nav-link active" aria-current="page" href="adminUserReportPrint.php">User Report</a></li>
                                <li><a class="nav-link active" aria-current="page" href="adminStockReportPrint.php">Stock Report</a></li>
                                <li><a class="nav-link active" aria-current="page" href="adminProductReportPrint.php">Product Report</a> </li>
                            </ul>
                        </div>
                        
                    </li>


                </ul>

            </div>
        </div>
    </nav>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>