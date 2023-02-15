<?php
include "functions/profileFunctions.php";
session_start();
$profile_id = $_SESSION['account_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'userMenu.php'; ?>

    <div class="container-fluid bg-secondary text-white p-3" style="">
        <h2 class="display-1 ml-5"><i class="fas fa-user"></i> Profile</h2>
    </div>

    <div class="row py-5 px-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-3 mx-auto" data-toggle="modal" data-target="#modelId">
            <i class="mr-1 fas fa-lock"></i>Change Password
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="post">

                                <input type="text" name="new_password" placeholder="New Password" class="form-control" id="">
                                <input type="text" name="confirm_password" placeholder="Confirm Password" class="form-control mt-3" id="">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="save_password" class="btn btn-primary">Save</button>
                            </form>
                        <?php
                        if (isset($_POST['save_password'])) {
                            $newPass = $_POST['new_password'];
                            $confirmPass = $_POST['confirm_password'];

                            if ($newPass == $confirmPass) {
                                changePassword(md5($newPass), $_SESSION['account_id']);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM

            });
        </script>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger col-3 mx-auto" data-toggle="modal" data-target="#deleteAccount">
            <i class="mr-1 fas fa-trash-alt"></i>Delete Account
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                           Confirm Password to Delete Account: 
                           <form action="" method="post">
                            <input type="text" class="form-control" name="password" id="">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_acc" class="btn btn-primary">Delete Account</button>
                        </form>
                        <?php 
                            if(isset($_POST['delete_acc'])){
                                $password = md5($_POST['password']);

                                $DBpassword = displayProfile($profile_id)['password'];

                                if($password == $DBpassword){
                                    deleteAccount($profile_id);
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
                
            });
        </script>

    </div>

    <div class="mt-1 mx-auto w-75">
        <?php
        $profile_details = displayProfile($profile_id);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <label for="new_first_name" class=""><small>First Name</small></label>
                                <input type="text" name="new_first_name" class="form-control" value="<?php echo $profile_details['first_name'] ?>" placeholder="First Name">
                            </div>
                            <div class="col-6">
                                <label for="new_last_name" class=""><small>Last Name</small></label>
                                <input type="text" name="new_last_name" value="<?php echo $profile_details['last_name'] ?>" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label for="new_address" class=""><small>Address</small></label>
                                <input type="text" name="new_address" value="<?php echo $profile_details['address'] ?>" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-4">
                                <label for="new_contact_number" class=""><small>Contact Number</small></label>
                                <input type="number" name="new_contact_number" value="<?php echo $profile_details['contact_number'] ?>" class="form-control" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="new_username" class=""><small>Username</small></label>
                                <input type="text" name="new_username" value="<?php echo $profile_details['username'] ?>" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="row">
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

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary form-control mt-3" data-toggle="modal" data-target="#confirmPassword">UPDATE</button>
                    </div>
                </div>
                <div class="col-4 text-center px-5">
                    <?php
                    $avatar = $profile_details['avatar'];
                    echo "<img src='images/$avatar' class='w-75 mb-2' style='height:240px;'>";
                    ?>
                    <input type="file" name="avatar" class="btn-sm">
                </div>
                <div class="col-4"></div>
            </div>
    </div>

    <!-- MODAL CONTAINER -->
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="confirmPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center" id="exampleModalLongTitle">CONFIRM YOUR OLD PASSWORD</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- MODAL FORM -->
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-0">
                                <input type="password" name="confirm_old_password" id="" class="form-control form-control-lg text-center" placeholder="PASSWORD">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-row text-right">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $password_check = checkOldPassword($profile_id);

        if ($password_check == 1) {
            $first_name = $_POST['new_first_name'];
            $last_name = $_POST['new_last_name'];
            $address = $_POST['new_address'];
            $contact_number = $_POST['new_contact_number'];
            $username = $_POST['new_username'];
            $avatar = $_FILES['avatar']['name'];
            
            if (empty($_POST['new_password'])) {
                $password = $_POST['old_password'];
            } elseif (!empty($_POST['new_password']) && $_POST['new_password'] === $_POST['confirm_password']) {
                $password = md5($_POST['new_password']);
            }

            $answer = updateProfile($first_name, $last_name, $address, $contact_number, $username, $password, $profile_id, $avatar);
            
            if($answer == 1){
                $target_dir = "images/";
                $target_file = $target_dir .basename($avatar);

                move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                echo "<script>window.location.replace('profile.php');</script>";
            }
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>
                                    <strong>INCORRECT OLD PASSWORD</strong>
                                </div>";
        }
    }
    ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>