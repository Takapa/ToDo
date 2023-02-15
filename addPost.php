<?php
    include 'functions/postFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Add Post</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php include 'adminMenu.php';?>

    <div class="container-fluid" style="margin-top:100px;">
        <h2 class="display-3 text-center mt-4"><i class="far fa-edit"></i> Add Post</h2>
    </div>

    <div class="container mt-5 mx-auto w-50">
        <form action="" method="post">
            <div class="row">
                <div class="col-10 mx-auto">
                    <input type="text" name="title" id="" class="form-control" placeholder="TITLE">
                </div>
            </div>
            <div class="row">
                <div class="col-10 mx-auto">
                    <input type="date" name="date_posted" id="" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-10 mx-auto">
                    <select name="category" id="" class="form-control">
                        <option value="#" selected disabled>CATEGORY</option>
                        <?php
                            displayDropdownCategory();
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mx-auto">
                    <textarea name="message" id="" class="form-control" rows="7"
                        placeholder="MESSAGE"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mx-auto">
                    <div class="input-group my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white" id="basic-addon1">Author:</span>
                        </div>
                        <select name="usernames" id="" class="form-control">
                        <option value="#" selected disabled>usernames</option>
                            <?php
                                displayDropdownUsername();
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mx-auto">
                    <button type="submit" name="add" class="btn btn-dark form-control">POST</button>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['add'])){
                $user_id = $_SESSION['login_id'];

                addPost($user_id);
            }
        ?>
    </div>

</body>

</html>