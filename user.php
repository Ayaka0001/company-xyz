<?php
session_start();
require "connection.php";

function getUserInfo(){
    $conn = connect();
    $sql = "SELECT * FROM users WHERE id = {$_SESSION['id']};";

    if(!$result = $conn -> query($sql)){
        die("Error getting user information: ".$conn -> error);
    }

    return $result;
}

function getUserInfoFromInfo(){
    $conn = connect();
    $sql = "SELECT * FROM user_information WHERE id = {$_SESSION['id']};";

    if(!$result = $conn -> query($sql)){
        die("Error getting user information from user information table: ".$conn -> error);
    }

    return $result;
}

$users = getUserInfo()->fetch_assoc();
$user = getUserInfoFromInfo()->fetch_assoc();

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
                    
                <div class="row justify-content-center text-center">
                    <h2 class="col-5 border-bottom border-dark"><i class="fa-regular fa-user"></i> User Information</h2>
                </div>

                <table class="table table-borderless w-50 mx-auto align-center table-info">
                    <tr>
                        <td>Username</td>
                        <td class="pe-2">:</td>
                        <td><?= $users['username'] ?></td>
                        <td>
                            <a href="update-user.php?id=<?= $_SESSION['id'] ?>" class="col-auto text-end text-decoration-none"><i class="fa-regular fa-pen-to-square"></i>Change username</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:  </td>
                        <td>********</td>
                        <td>
                            <a href="change-password.php?id=<?= $_SESSION['id'] ?>" class="col-auto text-end text-decoration-none"><i class="fa-regular fa-pen-to-square"></i>Change password</a>
                        </td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>:  </td>
                        <td><?= $user['first_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>:  </td>
                        <td><?= $user['last_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:  </td>
                        <td><?= $user['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Postal Code</td>
                        <td>:  </td>
                        <td><?= $user['post_code'] ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:  </td>
                        <td><?= $user['home_address'] ?></td>
                    </tr>
                </table>
                
                <div class="row justify-content-center mt-3">
                    <a href="update-user-info.php?id=<?= $_SESSION['id'] ?>" class="col-auto text-end text-decoration-none"><i class="fa-regular fa-pen-to-square"></i>Update user information</a>
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>