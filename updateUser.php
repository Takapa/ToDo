<?php 
    include 'functions/userFunctions.php';

    $accnt_id = $_GET['id'];
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
        <h2 class="display-1"><i class="fas fa-user-edit"></i> Update User</h2>
    </div>

    <div class="container mt-5 mx-auto w-50">
    <div class="container ml-5 mt-1">
        <?php
            $profile_details = displayProfile($accnt_id);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-6">
                    <div class="container">
                        <div class="form-row">
                            <div class="col-6">
                                <label for="new_first_name" class=""><small>First Name</small></label>
                                <input type="text" name="new_first_name" class="form-control" value="<?php echo $profile_details['first_name'] ?>" placeholder="First Name">
                            </div>
                            <div class="col-6">
                                <label for="new_last_name" class=""><small>Last Name</small></label>
                                <input type="text" name="new_last_name" value="<?php echo $profile_details['last_name'] ?>" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-8">
                                <label for="new_address" class=""><small>Address</small></label>
                                <input type="text" name="new_address" value="<?php echo $profile_details['address'] ?>" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-4">
                                <label for="new_contact_number" class=""><small>Contact Number</small></label>
                                <input type="number" name="new_contact_number" value="<?php echo $profile_details['contact_number'] ?>" class="form-control" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <label for="new_username" class=""><small>Username</small></label>
                                <input type="text" name="new_username" value="<?php echo $profile_details['username'] ?>" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="new_password" class=""><small>Password</small></label>
                                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="col-6">
                                <label for="confirm_password" class=""><small>Confirm Password<span class='text-danger'>*</span></small></label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        <input type="hidden" name="old_password" value="<?php echo $profile_details['password'] ?>">
                        <input type="hidden" name="account_id" value="<?php echo $accnt_id ?>">

                        <input type="submit" name="update" value="Update" class="btn btn-primary form-control mt-3">
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    $avatar = $profile_details['avatar'];
                    echo "<img src='images/$avatar' class='w-100 mb-2'>";
                    ?>
                    <input type="file" name="avatar" class="btn-sm">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if (isset($_POST['update'])) {
        $first_name = $_POST['new_first_name'];
        $last_name = $_POST['new_last_name'];
        $address = $_POST['new_address'];
        $contact_number = $_POST['new_contact_number'];
        $username = $_POST['new_username'];
        $avatar = $_FILES['avatar']['name'];
        $account_id = $_POST['account_id'];
        
        if (empty($_POST['new_password'])) {
            $password = $_POST['old_password'];
        } elseif (!empty($_POST['new_password']) && $_POST['new_password'] === $_POST['confirm_password']) {
            $password = md5($_POST['new_password']);
        }

        $answer = updateProfile($first_name, $last_name, $address, $contact_number, $username, $password, $account_id, $avatar);
        
        if($answer == 1){
            $target_dir = "images/";
            $target_file = $target_dir .basename($avatar);

            move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
        }
        echo "<script>window.location.replace('usersPage.php');</script>";
    }

?>