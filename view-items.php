<?php
session_start();
require "connection.php";

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company XYZ - View Items</title>
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
            <div class="z-n1 m-0 mt-5bg-gradient rounded-circle" style="height: 500px;background-color: #E6E6FA">
                <div class="row mb-4 border-bottom border-dark" style="margin-top:50px">
                    <div class="col">
                        <h2 class="fw-bold">View Items</h2>
                    </div>
                    <div class="col text-end">
                        <a href="add-item.php" class="btn btn-success">
                        <i class="fa-regular fa-square-plus"></i> Add Item
                        </a>
                    </div>
                </div>

                <table class="table table-hover table-light table-striped align-middle border">
                    <thead class="small text-uppercase">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th style="width: 100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $all_items = getAllItems();
                        while($item = $all_items -> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name']?></td>
                            <td><?= $item['price']?></td>
                            <td><?= $item['quantity']?></td>
                            <td>
                                <a href="edit-item.php?id=<?= $item['id'] ?>" class="btn btn-secondary btn-sm">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="delete-item.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>