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

function getAllItems(){
    $conn = connect();
    $sql = "SELECT id,
                   item_name as 'name', 
                   item_price as 'price', 
                   quantity  
                   FROM items";

    if(!$result = $conn -> query($sql)){
        die("Error getting items: ".$conn -> error);
    }

    return $result;
}

function updateItem($id, $name, $price, $quantity){
    $conn = connect();
    $sql = "UPDATE items 
            SET item_name = '$name',
                item_price = '$price',
                quantity = '$quantity'
            WHERE id = $id";
    if(!$conn -> query($sql)){
        die("Error updating item: ".$conn -> error);
    }
    header("Location: view-items.php");
    exit;
}

if(isset($_POST['btn_update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    updateItem($id, $name, $price, $quantity);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - Edit Item</title>
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
        <div class=" z-0 m-0 bg-info-subtle bg-gradient rounded-circle mt-4" style="height: 550px;">
            <div class="row justify-content-center" style="padding-top:80px">
                <div class="col-auto">
                    <h2 class="mb-2">Edit Item</h2>

                    <form method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name" max="50" value="<?= $item['item_name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <div class="input-group">
                                <div class="input-group-text">$</div>
                                <input type="number" class="form-control" id="price" name="price" value="<?= $item['item_price'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-bold">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $item['quantity'] ?>" required>
                        </div>
                        <a href="view-items.php" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary fw-bold" name="btn_update">
                            <i class="fa-solid fa-pen-to-square"></i> Update Item
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>