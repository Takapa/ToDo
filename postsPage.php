<?php
    include 'functions/postFunctions.php';
    include 'adminMenu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>

</head>
<body>
    <div class="container-fluid bg-info text-white p-3" style="">
        <h2 class="display-1"><i class="fas fa-pen-nib"></i> Post</h2>        
    </div>
    <div class="container mt-4">
        <a href="addPost.php" class="btn btn-lg btn-outline-dark border border-0"><i class="fas fa-edit"></i> Add Post</a>
    </div>

    <div class="container mt-2">
        <table class="table table-hover table-striped overflow-auto">
            <thead class="table table-dark">
                <th>Post ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date Posted</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayUserPosts();
                ?>
            </tbody>
        </table>
    </div>
    </body>
</html>

