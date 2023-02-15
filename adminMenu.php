<?php 
    require_once 'functions/connection.php';
    $account_id = $_SESSION['account_id'];

    $conn = db_connect();
    $sql = "SELECT * FROM users WHERE account_id = '$account_id'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $fname = $row['first_name'];
            $lname = $row['last_name'];
        }
    }  
; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title></title> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<style>

    body {
        margin: 0;
    }
</style>

<body>

    <div class="container-fluid m-0 p-0">

        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="w-75">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="usersPage.php" class="nav-link text-white">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="postsPage.php" class="nav-link text-white">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="categoriesPage.php" class="nav-link text-white">Categories</a>
                    </li>
                </ul>
            </div>
            
            <div class="w-25 float-right">
                <a href="profile.php" class="text-white mr-3"><i class="mr-1 fas fa-user text-white mr-1"></i>Welcome <?php echo $fname." ".$lname ; ; ?></a>
                <a href="logout.php" class="text-white"><i class="mr-1 fas fa-user text-white mr-1"></i>Logout</a>
            </div>
        </nav>

    </div>
</body>
</html>