<?php
session_start();
require "connection.php";

function signin($username,$password){
    $conn = connect();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    
    if(!$result = $conn -> query($sql)){
        die("Error signing in: ".$conn -> error);
    }

    if($result -> num_rows == 1){
        $user = $result -> fetch_assoc();

        if(password_verify($password,$user['password'])){
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: main.php");
            exit;
        }else{
            echo "<div class='alert alert-danger'>Invalid password</div>";
        }
    }else{
        $user = $result -> fetch_assoc();
        echo "<div class='alert alert-danger'>Invalid username</div>";
    }
}

if(isset($_POST['btn_signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    signin($username,$password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body class="bg-light text-center">
<?php include"nav-bar-top.php"?>
    <div style="height: 100vh">
        <div class="row m-0 mt-1 bg-primary-subtle bg-gradient rounded-circle" style="height: 550px">
            
            <form method="post" class="col-3 form-signin mx-auto my-auto">
                <h1 class="mb-3">Sign In</h1>

                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-2" placeholder="Username"  maxlength="50" required autofocus>

                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password" maxlength="50" required>

                <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn_signin">Sign In</button>

                <div class="text-center mt-2">
                    <p class="small">Don't have an account?
                    <a href="sign-up.php" class="text-decoration-none text-primary">Create an account</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>