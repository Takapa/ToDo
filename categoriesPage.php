<?php
    include 'functions/categoryFunctions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Category</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'adminMenu.php';?>
    
    <div class="container-fluid bg-success text-white p-3" style="">
        <h2 class="display-1"><i class="fas fa-folder"></i> Category</h2>
    </div>

    <div class="container w-50 mx-auto mt-5">
        <form class="form-inline text-center" method="post">
            <div class="form-group mx-auto">
                <label for="newCategory" class="mr-3">Add Category</label>
                <input type="text" name="category_name" id="inputNewCategory" class="mr-3">
                <button type="submit" name="add" role="button"
                    class="btn btn-success text-uppercase font-weight-bold">Add</button>
            </div>
        </form>
        <?php
                if(isset($_POST['add'])){
                addCategory();
            }
        ?>
    </div>

    <div class="container w-50">
        <table class="table table-hover w-75 mx-auto text-center mt-5">
            <thead class="table table-dark text-uppercase">
                <th>Category ID</th>
                <th>Category Name</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayAllCategories();
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>