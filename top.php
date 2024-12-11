<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Top</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body class="bg-light">
<?php include"nav-bar-top.php"?>
    <main class="container w-100">
        <div class="row bg-gradient rounded-circle mt-5" style="height: 550px;background-color: #4682B4">
            <div class="row  mt-4 rounded-circle" style="height: 500px;margin-left:0.5px;background-color: #A7F1FF">
                <div class="mx-auto my-auto" >
                    <div style="position:relative">
                        <img src="company.jpg" alt="top image" style="width: 80%;margin-left:10%;border-radius: 10px">
                        <h1 class="text-center display-4 fst-italic fw-bold text-white" style="position:absolute;top:50%;left:50%;transform:translateX(-50%);text-shadow: 2px 2px 2px black;">
                        Welcome to <br>Company XYZ</h1>
                    </div>
                    <p class="text-center">Please sign in or create an account to continue</p>

                    <div class="my-3 text-center">
                        <a href="sign-in.php" class="btn btn-outline-success">Sign in</a>
                        <a href="sign-up.php" class="btn btn-outline-primary">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>