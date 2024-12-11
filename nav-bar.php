<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <title>Company XYZ - Main</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-gradient"  style="background-color: #20B2AA;">
    <div class="container-fluid">
        <h1 class="navbar-brand my-auto ms-3 fw-bold text-uppercase">Company XYZ</h1>

        <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="main.php" class="nav-link text-decoration-none text-white"><i class="fas fa-house text-white"></i> My Page</a>
                </li>
                <li>
                    <a href="users.php" class="nav-link text-decoration-none text-white"><i class="fas fa-users text-white"></i> Users</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>