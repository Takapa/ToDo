<?php
    include 'functions/userFunctions.php';
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: User</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php include 'adminMenu.php';?>

    <div class="container-fluid bg-warning text-white p-3" style="">
        <h2 class="display-1"><i class="fas fa-user-edit"></i> User</h2>
    </div>

    <div class="container w-50 mx-auto mt-5">
        <form method="post">
            <div>
                <h2 class="display-4">Add User</h2>
            </div>
            <div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" name="first_name" id="inputNewUserFname" class="form-control"
                            placeholder="First Name" required>
                    </div>
                    <div class="col-6">
                        <input type="text" name="last_name" id="inputNewUserLname" class="form-control"
                            placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" name="contact_number" id="inputNewUserContactNumber"
                            class="form-control" placeholder="Contact Number" maxlength="11" required>
                    </div>
                    <div class="col-6">
                        <input type="text" name="address" id="inputNewUserAddress" class="form-control" placeholder="Address" required>
                    </div>
                </div>
            </div>
            <div>
                <input type="text" name="username" id="inputNewUserUsername" class="form-control mb-3" placeholder="Username" required>
            </div>
            <div>
                <input type="password" name="password" id="inputNewUserPassword" class="form-control mb-3" placeholder="Password" required>
            </div>
            <button type="submit" name="add" role="button"
                class="btn btn-warning form-control text-uppercase text-white font-weight-bold">Add</button>
        </form>
        <?php
            if(isset($_POST['add'])){
                addUser();
            }
        ?>
    </div>

    <div class="container">
        <table class="table table-hover mx-auto text-center my-5">
            <thead class="table table-dark text-uppercase">
                <th>User ID</th>
                <th>Full Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Username</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayAllUsers();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>