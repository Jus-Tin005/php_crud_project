<?php
require "connect.php";
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basic PHP CRUD Project</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


        <style>
                body{
                        padding: 50px;
                }
        </style>
</head>
<body>

<?php
if(isset($_GET['postId'])){
        // echo "Got it !";
        $post_id_to_update = $_GET['postId'];
        // echo $post_id_to_update;

        $postIdFromDbs = mysqli_query($db,"SELECT * FROM  posts WHERE id = $post_id_to_update");

        if(mysqli_num_rows($postIdFromDbs)  == 1){
                // echo "Got it Again !";

                foreach($postIdFromDbs as $postIdFromDb){
                        $postInputId = $_POST['id'];
                        $title =  $postIdFromDb['title'];
                        $desc =  $postIdFromDb['description'];
                }
        }else{
                // echo "Did not get it yet !";
        }
}


// update posts

$titleError = '';
$descError = '';
if(isset($_POST['post_update_button'])){
        // echo "hoooo";

        $postId = $_POST['post-id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];


        if(empty($title)){
                $titleError = "The title field is required !";
        }

        if(empty($desc)){
                $descError = "The Description field is required !";
        }

        if(!empty($title) && !empty($desc)){
                $query = "UPDATE posts SET title='$title', description='$desc' WHERE id=$postId";
                $_SESSION['successMsg'] = ' A post is updated successfully !';
                header('location:index.php');
        }

}


// Update Syntax
/*
UPDATE table_name SET column1 = value1,column2=value2,....WHERE condition;
*/

?>

<div class="container">
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                                                <div class="card-header">
                                                                <div class="row">
                                                                                <div class="col-md-6">
                                                                                        <div class="card-title">Post Edition Form</div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <a href="index.php" class="btn btn-secondary float-end"><< Back</a>
                                                                                </div>
                                                                </div>

                                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">

                                                        <input type="hidden" name="post-id" value="<?php echo $postInputId;?>">
                                                                <div class="form-group">
                                                                                <label>Title</label>
                                                                                <input type="text" name="title" id="" class="form-control <?php if($titleError != ' '):?>is-invalid<?php endif ?>" placeholder="Enter Post Title..."  value="<?php echo  $title;?>">
                                                                                <span class="text-danger"><?php echo $titleError ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                                <label for="">Description</label>
                                                                                <textarea name="description" id="" class="form-control <?php if($descError != ' '):?>is-invalid<?php endif ?>" placeholder="Enter Post Descriptions..."><?php echo  $desc;?></textarea>
                                                                                <span class="text-danger"><?php echo $descError ?></span>
                                                                </div>
                                                </div>

                                                <div class="card-footer">
                                                                <button type="submit" name="post_update_button" class="btn btn-success">Update</button>
                                                </div>
                                </form>
                        </div>
                </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>