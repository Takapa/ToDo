<?php
    require_once 'connection.php';

    function countPosts(){
        $conn = db_connect();
        
        $sql = "SELECT COUNT(post_id) AS post_count FROM posts";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['post_count'];
            }
        }
    }

    function countUsers(){
        $conn = db_connect();
        
        $sql = "SELECT COUNT(user_id) AS user_count FROM users INNER JOIN accounts ON accounts.account_id = users.account_id WHERE accounts.status = 'U'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['user_count'];
            }
        }
    }

    function countCategories(){
        $conn = db_connect();
        
        $sql = "SELECT COUNT(category_id) AS category_count FROM categories";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['category_count'];
            }
        }
    }

?>