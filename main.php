<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-gradient"  style="background-color: #99CC99">
        <div class="container-fluid">
            <h1 class="navbar-brand my-auto ms-3 fw-bold text-uppercase">Company XYZ</h1>

            <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="main.php" class="nav-link text-decoration-none text-white"><i class="fas fa-house text-white"></i> Top Page</a>
                    </li>
                    <li>
                        <a href="user.php" class="nav-link text-decoration-none text-white"><i class="fas fa-user text-white"></i> My page</a>
                    </li>
                    <li class="nav-item">
                        <a href="view-items.php" class="nav-link text-decoration-none text-white"><i class="fas fa-table-list text-white"></i> View Items</a>
                    </li>
                    <li class="nav-item">
                        <a href="add-item.php" class="nav-link text-decoration-none text-white"><i class="fas fa-square-plus text-white"></i> Add Item</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a href="sign-out.php" class="btn btn-danger"><i class="fas fa-right-from-bracket"></i> Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container w-100">       
         <div class="row z-n1 m-0 mt-5 bg-primary-subtle bg-gradient rounded-circle" style="height: 550px">
            <div class="col z-0 bg-info-subtle mt-4 rounded-circle" style="height: 500px;margin-left:0.5px">
            
                <h1 class="text-center display-2 mt-3">Welcome to Company XYZ</h1>
                
                <div class="row ms-o" style="margin-top:100px">
                    <div class="col-4">
                        <a href="user.php" class="row text-decoration-none" style="position:relative">
                            <img src="mypage-icon.jpg" alt="My Page icon" class="rounded-circle mx-auto" style="width: 200px; height: 200px;object-fit: cover">
                            <h2 class="h4 text-center text-dark" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)">My Page</h2>
                        </a>
                        <p class="text-center">Check and edit your registrated user information.</p>
                    </div>

                    <div class="col-4">
                        <a href="user.php" class="row text-decoration-none" style="position:relative">
                            <img src="items-icon.jpg" alt="My Page icon" class="rounded-circle mx-auto" style="width: 200px; height: 200px;object-fit: cover">
                            <h2 class="h4 text-center text-dark" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)">View Items</h2>
                        </a>
                        <p class="text-center">View the items you have registered.</p>
                    </div>

                    <div class="col-4">
                        <a href="user.php" class="row text-decoration-none" style="position:relative">
                            <img src="add-icon.jpg" alt="My Page icon" class="rounded-circle mx-auto" style="width: 200px; height: 200px;object-fit: cover">
                            <h2 class="h4 text-center text-dark" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)">Add Items</h2>
                        </a>
                        <p class="text-center">Add new items to your list.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>