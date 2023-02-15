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
    <!-- <title>Document</title> -->
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        margin: 0;
    }
</style>
<body>

    <div class="container-fluid m-0 p-0">

        <nav class="navbar navbar-expand-md bg-info navbar-info">
            <div class="w-75">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-white ml-5">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="addPostByUser.php" class="nav-link text-white ml-3">Add Post</a>
                    </li>
                </ul>
            </div>
            
            <div class="w-25 float-right">
                <a href="profile.php" class="text-white mr-3"><i class="mr-1 fas fa-user text-white mr-1"></i>Welcome <?php echo $fname." ".$lname; ?></a>
                <a class="text-white" href="logout.php"><i class="mr-1 fas fa-user text-white mr-1"></i>Logout</a>
            </div>

        </nav>

    </div>
    
</body>
</html>

