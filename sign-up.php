<?php
require "connection.php";

function addUser($username,$password){
    $conn = connect();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";
    
    if(!$conn -> query($sql)){
        die("Error creating account: ".$conn -> error);
    }
    
    header("Location: sign-in.php");
}

function addUserInfo(){
    $conn = connect();
    $sql = "INSERT INTO user_information(id)
            SELECT id
            FROM users";
    
    if(!$conn -> query($sql)){
        die("Error inserting account info: ".$conn -> error);
    }

    header("Location: sign-in.php");
}

if(isset($_POST['btn_signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    addUser($username,$password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body class="text-center"style="background-color: #FFFFEE">
<?php include"nav-bar-top.php"?>
    <div style="height: 100vh">
        <div class="row m-0 mt-1 bg-info-subtle bg-gradient rounded-circle" style="height: 550px">
           
            <form class="col-3 form-signin mx-auto my-auto" method="post">
                <h1 class="mb-3">Create Account</h1>

                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-2" placeholder="Username"  maxlength="50" required autofocus>

                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password" maxlength="50" required>

                <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn_signup">Create Account</button>
    
                <div class="text-center mt-2">
                    <p class="small">Already have an account? <a href="sign-in.php" class="text-decoration-none">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>