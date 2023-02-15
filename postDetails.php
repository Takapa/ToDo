<?php
    include 'functions/postFunctions.php';
    
    $post_id = $_GET['post_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Post Details</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="postsPage.php" class="nav-link text-secondary" style="opacity: 1;"><i class="fas fa-chevron-left fa-2x"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto;">
                <li class="nav-item">
                    <a href="updatePost.php?post_id=<?php echo $post_id?>" class="nav-link text-info" style="opacity: 1;"><i class="fas fa-pen fa-2x"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5 mx-auto w-50">
        <?php
            displayPostDetails($post_id);
        ?>
    </div>

</body>

</html>