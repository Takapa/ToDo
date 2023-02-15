<?php
    session_start();
    require_once 'connection.php';

    function displayUserPosts(){
        $conn = db_connect();
        $user_id = $_SESSION['account_id'];

        $sql = "SELECT * FROM posts INNER JOIN categories ON categories.category_id = posts.category_id";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <td>".$row['post_id']."</td>
                        <td>".$row['post_title']."</td>
                        <td>".$row['category_name']."</td>
                        <td>".$row['date_posted']."</td>
                        <td>
                            <a href='postDetails.php?post_id=".$row['post_id']."' class='btn btn-sm btn-outline-dark'><i class='fas fa-angle-double-right'></i> Details</a>
                        </td>
                    </tr>
                ";
            }
        }
    }

    function displayDropdownCategory(){
        $conn = db_connect();

        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
            }
        }else{
            echo "<option>No Records Found</option>";
        }
    }

    function displayDropdownUsername(){
        $conn = db_connect();

        $sql = "SELECT * FROM accounts";

        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['account_id']."'>".$row['username']."</option>";
            }
        }else{
            echo "<option>No Records Found</option>";
        }
    }

    function addPost($user_id){
        $conn = db_connect();

        $title = $_POST['title'];
        $date_posted = $_POST['date_posted'];
        $category_id = $_POST['category'];
        $message = $_POST['message'];
        $uname = $_POST['usernames'];

        $sql = "INSERT INTO posts (post_title, date_posted, category_id, post_message, account_id) 
                VALUES ('$title','$date_posted','$category_id','$message', '$uname')";
        
        if($conn->query($sql)){
            echo "<script>window.location.replace('postsPage.php');</script>";
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
            <strong> Error in POSTS Table: ".$conn->error."</strong>
            </div>";
        }
    }

    function addPostbyUser($user_id){
        $conn = db_connect();

        $title = $_POST['title'];
        $date_posted = $_POST['date_posted'];
        $category_id = $_POST['category'];
        $message = $_POST['message'];

        $sql = "INSERT INTO posts (post_title, date_posted, category_id, post_message, account_id) VALUES ('$title','$date_posted','$category_id','$message','$user_id')";
        
        if($conn->query($sql)){
            echo "<script>window.location.replace('postsPage.php');</script>";
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
            <strong> Error in POSTS Table: ".$conn->error."</strong>
            </div>";
        }
    }

    function displayPostDetails($post_id){
        $conn = db_connect();
        
        $sql = "SELECT * FROM posts 
                INNER JOIN categories ON categories.category_id = posts.category_id 
                INNER JOIN users ON users.account_id = posts.account_id 
                WHERE post_id = '$post_id'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
            echo "
                <div class='row'>
                    <div class='col-12'>
                        <h1 class='display-3'>".$row['post_title']."</h1>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-12 text-uppercase'>
                        <p class='lead'><small>By: <span class='text-primary'>".$row['first_name']." ".$row['last_name']."</span>, ".$row['date_posted'].", ".$row['category_name']."</small></p>
                    </div>
                </div>
                <div class='row mt-5'>
                    <div class='col-12'>
                        <p class='lead'>".$row['post_message']."</p>
                    </div>
                </div>
            ";
            }
        }else{
            echo "
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <h1 class='display-3'>ERROR 404: Not Found</h1>
                </div>
            </div>";
        }

    }

    function displayUpdatePost($post_id){
        $conn = db_connect();

        $sql = "SELECT * FROM posts INNER JOIN categories ON categories.category_id = posts.category_id 
                INNER JOIN users ON users.account_id = posts.account_id WHERE posts.post_id = '$post_id'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
                $title = $row['post_title'];
                $date_posted = $row['date_posted'];
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                $message = $row['post_message'];
            }

            echo "
            <div class='container mt-5 mx-auto'>
            <form action='' method='post'>
                <div class='row'>
                    <div class='col-10 mx-auto'>
                        <input type='text' name='new_title' id='' class='form-control' value='".$title."'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-10 mx-auto'>
                        <input type='date' name='new_date_posted' id='' class='form-control' value='".$date_posted."'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-10 mx-auto'>
                        <select name='new_category' id='' class='form-control'>
                            <option value='".$category_id."' selected>".$category_name."</option>
            ";

            displayDropdownCategory();
            
            echo"
                    </select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-10 mx-auto'>
                        <textarea name='new_message' id='' class='form-control' rows='7'>".$message."</textarea>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-10 mx-auto'>
                    <button type='submit' name='update' class='btn btn-dark form-control mt-2'>UPDATE</button>
                    </div>
                </div>
                
                </div>
            ";
        }
    }

    function updatePost($post_id){
        $conn = db_connect();
        $new_title = $_POST['new_title'];
        $new_date_posted = $_POST['new_date_posted'];
        $new_category = $_POST['new_category'];
        $new_message = $_POST['new_message'];
        
        $sql = "UPDATE posts 
                SET post_title = '$new_title',
                    date_posted = '$new_date_posted',
                    category_id = '$new_category',
                    post_message = '$new_message'
                WHERE post_id = '$post_id'
                ";
        if($conn->query($sql)){
            header('location:postsPage.php');
        }else{
            echo "ERROR IN UPDATING THE POST ".$conn->error;
        }

        $conn->close();
    }
?>