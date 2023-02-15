<?php
    session_start();

    require_once 'connection.php';

    function login(){
        $conn = db_connect();
        $uname = $_POST['username'];
        $pass = md5($_POST['password']);

        $sql = "SELECT * FROM accounts  WHERE username = '$uname' AND password = '$pass'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
                $_SESSION['account_id'] = $row['account_id'];

                if($row['status'] == 'A'){
                    header("Location:dashboard.php");
                }elseif($row['status'] == 'U'){
                    header("Location:profile.php");
                }
            }
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong>Incorrect Username or Password</strong>
            </div>";
        }  
    }

    function register(){
        $conn = db_connect();
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $avatar = 'profile.jpg';
        
        //sql1
        $insertIntoAccounts = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($conn->query($insertIntoAccounts)){
            //insert_id <-- this will get the last ID generated in the previous table
            $last_account_id = $conn->insert_id;
            //sql2n
            $insertIntoUsers = "INSERT INTO users (first_name, last_name, address, contact_number, account_id, avatar) 
                                VALUES ('$first_name', '$last_name', '$address','$contact_number', '$last_account_id', '$avatar')";

            if($conn->query($insertIntoUsers)){
                // header("Location: login.php");
                echo "<script>window.location.replace('index.php');</script>";
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'>
                <strong> Error in USERS Table: ".$conn->error."</strong>
                </div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
            <strong> Error in ACCOUNTS Table: ".$conn->error."</strong>
            </div>";
        }
    }

    function displayAllUsers(){
        $conn = db_connect();

        $sql = "SELECT * FROM users INNER JOIN accounts ON accounts.account_id = users.account_id WHERE accounts.status = 'U'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <td>".$row['user_id']."</td>
                        <td>".$row['first_name']." ".$row['last_name']."</td>
                        <td>".$row['contact_number']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['username']."</td>
                        <td><a href='updateUser.php?id=".$row['account_id']."' class='btn btn-sm btn-warning text-white'>Update</a></td>
                        <td><a href='deleteUser.php?id=".$row['account_id']."' class='btn btn-sm btn-danger text-white'>Delete</a></td>
                    </tr>
                ";
            }
        }else{
            echo "<tr>
            <td colspan='8' class = 'text-center 'font-weight-bold'>No Records Found</td>
            </tr>";
        }
    }

    function addUser(){
        $conn = db_connect();
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $insertIntoAccounts = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($conn->query($insertIntoAccounts) == TRUE){
            $last_account_id = $conn->insert_id;

            $insertIntoUsers = "INSERT INTO users (first_name, last_name, address, contact_number, account_id) VALUES ('$first_name', '$last_name', '$address','$contact_number','$last_account_id')";

            if($conn->query($insertIntoUsers)){
                echo "<div class='mt-3 alert alert-success text-center' role='alert'>
                <strong> ADDED NEW USER: </strong>".$first_name." ".$last_name."
                </div>";
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'>
                <strong> Error in USERS Table: ".$conn->error."</strong>
                </div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
            <strong> Error in ACCOUNTS Table: ".$conn->error."</strong>
            </div>";
        }
    }

    function deleteUser($id){
        $conn =db_connect();
        $sql ="DELETE FROM users WHERE account_id = '$id'";
        $result = $conn->query($sql);
        if($result == TRUE){
            header('location:usersPage.php');

        }else{
            die("ERROR".$conn->error);
        }
    }

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
?>