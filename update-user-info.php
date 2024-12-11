<?php
session_start();
require "connection.php";
function getUserInfoFromInfo(){
    $conn = connect();
    $sql = "SELECT * FROM user_information WHERE id = {$_SESSION['id']};";

    if(!$result = $conn -> query($sql)){
        die("Error getting user information from user information table: ".$conn -> error);
    }

    return $result;
}
$user = getUserInfoFromInfo()->fetch_assoc();

function updateUserInfo($id, $first_name, $last_name, $email, $postcode,$address){
    $conn = connect();
    $sql = "UPDATE user_information 
            SET first_name = '$first_name',
                last_name = '$last_name',
                email = '$email',
                post_code = '$postcode',
                home_address = '$address'
            WHERE id = '$id'";
    if(!$conn -> query($sql)){
        die("Error updating user information: ".$conn -> error);
    }
    header("Location: user.php");
    exit;
}

if(isset($_POST['btn_update_user_info'])){
    $id = $_GET['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $postcode = $_POST['postcode'];
    $address = $_POST['address'];

    updateUserInfo($id, $first_name, $last_name, $email, $postcode, $address);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
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

    <main class="container ">
        <div class="row justify-content-center">
            <div class="col-4">
                <h2 class="fw-light my-4">Update User Information</h2>
                
                <form method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label fw-bold">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $user['first_name'] ?>" max="50">
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label fw-bold">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $user['last_name'] ?>" max="50">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" max="50">
                    </div>

                    <div class="mb-3">
                        <label for="postcode" class="form-label fw-bold">Postal Code</label>
                        <input type="text" name="postcode" id="postcode" class="form-control" value="<?= $user['post_code'] ?>" placeholder="xxx-xxxx" max="50">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?= $user['home_address'] ?>" max="50">
                    </div>

                    <div class="d-flex justify-content-around">
                    <a href="user.php" class="btn btn-outline-secondary" style="width: 100px">Cancel</a>
                    <button type="submit" class="btn btn-primary fw-bold" name="btn_update_user_info" style="width: 100px">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>