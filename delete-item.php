<?php
session_start();
require "connection.php";

$id = $_GET['id'];
$item = getItem($id);

function getItem($id){
    $conn = connect();
    $sql = "SELECT * FROM items WHERE id = $id";
    if(!$result = $conn -> query($sql)){
        die("Error getting item: ".$conn -> error);
    }
    return $result -> fetch_assoc();
}

function deleteItem($id){
    $conn = connect();
    $sql = "DELETE FROM items WHERE id = $id";
    if(!$conn -> query($sql)){
        die("Error deleting item: ".$conn -> error);
    }
    header("Location: view-items.php");
    exit;
}

if(isset($_POST['btn_delete'])){
    $id = $_GET['id'];
    deleteItem($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Delete Item</title>
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
        <div class=" z-0 m-0 bg-warning-subtle bg-gradient rounded-circle mt-4" style="height: 550px;">
            <div class="row justify-content-center w-50 mx-auto mt-4" style="padding-top:150px">
                <div class="col-auto mt-2">
                    <div class="text-center">
                        <div class="text-danger h2 border-bottom border-warning border-3">
                            <i class="fa-solid fa-triangle-exclamation"></i> Delete Item <i class="fa-solid fa-triangle-exclamation"></i>    
                        </div>
                        <p class="fw-bold mt-2">Are you sure you want to delete <?= $item['item_name']?> ?</p>
                    </div>

                    <div class="row mt-1 ">
                        <div class="col">
                            <a href="view-items.php" class="btn btn-outline-secondary w-100">Cancel</a> 
                        </div>
                        <div class="col">
                            <form method="post">
                                <button type="submit" class="btn btn-outline-danger w-100" name="btn_delete">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>