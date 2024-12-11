<?php
session_start();
require "connection.php";

$id = $_GET['id'];
$user = getUser($id);
function getUser($id){
    $conn = connect();
    $sql = "SELECT * FROM users WHERE id = '$id'";

    if(!$result = $conn -> query($sql)){
        die("Error getting user information: ".$conn -> error);
    }

    return $result -> fetch_assoc();
}

function updatePassword($id,$password,$new_password){
    $conn = connect();
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE users 
                SET password = '$new_password'
                WHERE id = '$id'";
    
    if(!$result = $conn -> query($sql)){
        die("Error updating password: ".$conn -> error);
    }

    header("Location: main.php");
    exit;
}



if(isset($_POST['btn_change_password'])){
    $id = $_GET['id'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if(password_verify($password,$user['password']) && $new_password != $confirm_new_password){
        echo "<p class ='alert alert-danger'>New Password and Confirm New Password do not match</p>";
    }
    elseif(!(password_verify($password,$user['password'])) && $new_password == $confirm_new_password){
        echo "<p class ='alert alert-danger'>Password is incorrect</p>";
    }
    elseif(!(password_verify($password,$user['password'])) && $new_password != $confirm_new_password){  
        echo "<p class ='alert alert-danger'>Password is incorrect and New Password and Confirm New Password do not match</p>";
    }
    else{
        updatePassword($id,$password,$new_password);
     }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Update Passoword</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-gradient"  style="background-color:#99CC99">
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

    <main class="container">
        <div class="z-n1 m-0 mt-5 bg-danger-subtle bg-gradient rounded-circle" style="height: 500px">
            <div style="height: 100vh;padding-top:50px">
                <div class="row m-0">
                    
                    <div class="card border-danger border-3 w-50 mx-auto p-0">
                        <div class="card-header bg-white border-0">
                            <h1 class="card-title">Change Password</h1>
                        </div>

                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="text" class="form-control" id="password" name="password" maxlength="50" required>
                                </div>

                                <div class="mb-3">
                                    <label for="new-password" class="form-label">New Password:</label>
                                    <input type="text" class="form-control" id="new-password" name="new_password" maxlength="50" required>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm-new-password" class="form-label">Confirm New Password:</label>
                                    <input type="text" class="form-control" id="confirm-new-password" name="confirm_new_password" maxlength="50" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100" name="btn_change_password">Change Password</button>

                            </form>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="small">Go back to <a href="user.php" class="text-decoration-none text-primary">My Page</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>