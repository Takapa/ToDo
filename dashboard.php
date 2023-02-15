<?php
    //HELLO FROM THE MASTER BRANCH
    include "functions/dashboardFunctions.php";
    include 'functions/postFunctions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Dashboard</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'adminMenu.php';?>

    <div class="container-fluid bg-danger text-white p-3" style="">
        <h2 class="display-1"><i class="fas fa-user-cog"></i> Dashboard</h2>
    </div>
    <div class="container mx-auto mt-5 my-5">
        <div class="row">
            <div class="col-4">
                <a class="btn btn-primary btn-lg w-100" role="button" href="addPost.php"><i
                        class="fas fa-plus-circle"></i> Add Post</a>
            </div>
            <div class="col-4">
                <a class="btn btn-success btn-lg w-100" role="button" href="categoriesPage.php"><i
                        class="fas fa-folder-plus"></i> Add Category</a>
            </div>
            <div class="col-4">
                <a class="btn btn-warning text-white btn-lg w-100" role="button" href="usersPage.php"><i
                        class="fas fa-user-plus"></i> Add User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <table class="table table-striped table-hover mt-4">
                    <thead class="table table-dark">
                        <th>#</th>
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
            <div class="col-4">
                <div class="container bg-primary rounded text-center text-white p-3 mt-4">
                    <h2>Posts</h2>
                    <h3><i class="fas fa-pencil-alt"></i> <?php countPosts();?></h3>
                    <a href="postsPage.php"  class="btn btn-outline-light font-weight-bold text-uppercase">view</a>
                </div>
                
                <div class="container bg-success rounded text-center text-white p-3 mt-4">
                    <h3>Category</h3>
                    <h2><i class="far fa-folder-open"></i> <?php countCategories();?></h2>
                    <a href="categoriesPage.php" class="btn btn-outline-light font-weight-bold text-uppercase">view</a>
                </div>
                <div class="container bg-warning rounded text-center text-white p-3 mt-4">
                    <h3>Users</h3>
                    <h2><i class="fas fa-users"></i> <?php countUsers();?></h2>
                    <a href="usersPage.php" class="btn btn-outline-light font-weight-bold text-uppercase">view</a>
                </div>
            </div>
        </div>
</body>

</html>