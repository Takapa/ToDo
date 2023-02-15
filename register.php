<?php
    include 'functions/userFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark">
    <div class="card mx-auto w-50 mt-3 bg-dark border border-0">
        <div class="card-header text-white border-0">
            <h2 class="text-center" style="letter-spacing: 0.2em;">Registration</h2>
        </div>
        <div class="card-body text-white">
            <form action="" method="post">
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="first_name" style="letter-spacing: 0.1em;">First Name<span style="color: crimson">*</span></label>
                        <input type="text" name="first_name" id="inputFirstName" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                    <div class="col-6">
                        <label for="last_name" style="letter-spacing: 0.1em;">Last Name<span style="color: crimson">*</span></label>
                        <input type="text" name="last_name" id="inputLastName" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="address" style="letter-spacing: 0.1em;">Address</label>
                        <input type="text" name="address" id="inputAddress" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="contact_number" style="letter-spacing: 0.1em;">Contact Number<span style="color: crimson">*</span></label>
                        <input type="text" name="contact_number" id="inputContactNumber" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" pattern="[0-9]+" maxlength="11" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="username" style="letter-spacing: 0.1em;">Username<span style="color: crimson">*</span></label>
                        <input type="text" name="username" id="inputUsername" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="password" style="letter-spacing: 0.1em;">Password<span style="color: crimson">*</span></label>
                        <input type="password" name="password" id="inputContactNumber" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <button type="submit" name="register" class="btn btn-secondary form-control form-control-lg float-left" style="letter-spacing: 0.1em;">Register</button>
                    </div>
                    <div class="col-6">
                        <p class="text-end"><span class="text-white">Have an account? </span><a href="index.php" class="text-primary">Sign In</a></p>
                    </div>
                </div>
                <?php
                    if(isset($_POST['register'])){
                        register();
                    }
                ?>
            </form>

        </div>
    </div>
</body>
</html>