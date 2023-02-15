<?php
    session_start();
    require_once 'connection.php';

    function displayAllCategories(){
        $conn = db_connect();
        $sql = "SELECT * FROM categories order by category_id desc";
        
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"
                    <tr>
                        <td>".$row['category_id']."</td>
                        <td>".$row['category_name']."</td>
                        <td><a href='updateCategory.php?id=".$row['category_id']."' class='btn btn-sm btn-warning text-white'>Update</a></td>
                        <td><a href='deleteCategory.php?id=".$row['category_id']."' class='btn btn-sm btn-danger text-white'>Delete</a></td>
                    </tr>
                ";
            }
        }else{
            echo "<tr>
            <td colspan='4' class = 'text-center 'font-weight-bold'>No Records Found</td>
            </tr>";
        }
    }

    function addCategory(){
        $conn = db_connect();
        
        $category_name = $_POST['category_name'];

        $sql = "INSERT INTO categories (category_name) VALUES('$category_name')";

        if($conn->query($sql)){
            echo "<div class='mt-5 alert alert-success text-center' role='alert'>
                <strong> ADDED NEW CATEGORY: </strong>".$category_name."
                </div>";
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong> Error: ".$conn->error."</strong>
                </div>";
        }
    }

    function displayUpdateCategory($cat_id){
        $conn = db_connect();

        $sql = "SELECT * FROM categories WHERE category_id='$cat_id'";
        
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $cat_name = $row['category_name'];
                echo "
                    <div class='container mt-5 mx-auto'>
                        <form action='' method='post'>
                            <div class='row'>
                                <div class='col-10 mx-auto'>
                                    <input type='text' name='new_title' id='' class='form-control rounded-0' value='".$cat_name."'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-10 mx-auto'>
                                <button type='submit' name='update' class='btn btn-dark form-control mt-4'>UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    ";
            }
        }else{
            echo "<tr>
            <td colspan='4' class = 'text-center 'font-weight-bold'>No Records Found</td>
            </tr>";
        }
    }

    function deleteCategory($cat_id){
        $conn = db_connect();
        $sql = "DELETE FROM categories WHERE category_id = '$cat_id'";
        $result = $conn->query($sql);

        if($result == TRUE){
            echo "<script>window.location.replace('categoriesPage.php');</script>";
        }else{
            die("ERROR".$conn->error);
        }
    }

    function  updateCategory($cat_id, $cat_name){
        $conn = db_connect();

        $sql = "UPDATE categories SET category_name = '$cat_name' WHERE category_id='$cat_id'";
        $result = $conn->query($sql);

        if($result == TRUE){
            echo "<script>window.location.replace('categoriesPage.php');</script>";
        }else{
            die("ERROR".$conn->error);
        }

    }


?>