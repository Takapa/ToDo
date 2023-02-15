<?php
    require_once 'connection.php';

    function displayProfile($profile_id){
        $conn = db_connect();

        $sql = "SELECT * FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE accounts.account_id = '$profile_id'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
           return $result->fetch_assoc();
        }else{
            echo "No User Found".$conn->error;
        }
    }

    function checkOldPassword($profile_id){
        $conn = db_connect();

        $confirm_old_password = md5($_POST['confirm_old_password']);

        $sql = "SELECT password FROM accounts WHERE account_id = '$profile_id' AND password = '$confirm_old_password'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            return 1; //TRUE
        }else{
           echo $conn->error;
        }
    }

    function updateProfile($first_name, $last_name, $address, $contact_number, $username, $password, $profile_id, $avatar){
        $conn = db_connect();

        $sql = "UPDATE accounts INNER JOIN users ON users.account_id = accounts.account_id
                SET users.first_name = '$first_name',
                    users.last_name = '$last_name',
                    users.address = '$address',
                    users.contact_number = '$contact_number',

                    accounts.username = '$username',
                    accounts.password = '$password'
                WHERE accounts.account_id = '$profile_id'
        ";

        if($conn->query($sql)){
            if($avatar != ""){

                $sql = "UPDATE users SET avatar = '$avatar' WHERE account_id='$profile_id'";
                if($conn->query($sql)){
                    return 1;
                }
            }
           
        }else{
            die("ERROR: ".$conn->error);
        }
    }
    function changePassword($password,$session){
        $conn = db_connect();
        $sql = "UPDATE accounts SET password ='$password' WHERE account_id = '$session' ";
        $result = $conn->query($sql);

        if($result == FALSE){
            die("error".$conn->error);
        }
        else{
            header('location:profile.php');
        }
        
    }

    function deleteAccount($profile_id){
        $conn =db_connect();
        $sql ="DELETE FROM accounts WHERE account_id = '$profile_id'";
        $result = $conn->query($sql);

        if($result == TRUE){
            echo "<script>window.location.replace('index.php');</script>";
        }else{
            header('location:error.php');
        }
    }