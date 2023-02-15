<?php
    include 'functions/userFunctions.php';
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
    <div class="container">
        <div class="card mx-auto w-50 my-5 border border-0">
            <div class="card-header bg-white text-dark border-0">
                <h2 class="text-center" style="letter-spacing: 0.2em;">Login</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <input type="text" name="username" id="inputUsername" class="p-3 mb-3 loginform form-control" placeholder="USERNAME" style="letter-spacing: 0.2em;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <input type="password" name="password" id="inputPassword" class="p-3 loginform form-control" placeholder="PASSWORD" style="letter-spacing: 0.2em;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <button type="submit" name="login" class="btn btn-success form-control text-uppercase" style="letter-spacing: 0.1em; font-size:100%">enter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white text-dark border-0 mt-4">
                <div class="row">
                    <div class="col-6 mb-3">
                        <h6><a href="register.php" class="text-dark" style="letter-spacing: 0.1em;">Create an Account</a></h6>
                    </div>
                    <div class="col-6 mb-3">
                        <h6><a href="#" class="text-dark float-end" style="letter-spacing: 0.1em;">Recover Account</a></h6>
                    </div>
                </div>
                <?php
                    if (isset($_POST['login'])) {
                        login();
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>