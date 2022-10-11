<?php
session_start();
require "connect.php";
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

<div class="container">
        <div class="row">
                <div class="col-md-12">


                        <div class="card">
                                <div class="card-header">
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="card-title">Post Lists</div>
                                                </div>
                                                <div class="col-md-6">
                                                        <a href="./post_create.php" class="btn btn-success float-end">+ Add New</a>
                                                </div>
                                        </div>


                                </div>
                                <div class="card-body">

                                        <?php if(isset($_SESSION['successMsg'])): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <?php
                                                                echo  $_SESSION['successMsg'];
                                                                unset($_SESSION['successMsg']);
                                                        ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <!--  2 errors = btn-close error & db error -->
                                        </div>

                                        <?php endif ?>

                                        <table class="table table-bordered">
                                                <thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                        </tr>
                                                </thead>

                                                <tbody>

                                                <?php

                                                #method 1
                                                        $query = "SELECT * FROM posts";

                                                        // mysqli_query(dbconnnection,queery);
                                                        $posts = mysqli_query($db,$query);

                                                #method 2 $posts = mysqli_query($db, "SELECT * FROM posts");



                                                        foreach($posts as $post){

                                                ?>



                                                        <tr>
                                                                <td><?php echo $post['id']; ?></td>
                                                                <td><?php echo $post['title']; ?></td>
                                                                <td><?php echo $post['description']; ?></td>
                                                                <td>
                                                                        <!-- <a href="post_edit.php?key=value&key=value&kkey=value">Edit</a> | -->
                                                                        <a href="post_edit.php?postId=<?php  echo $post['id'] ?>">Edit</a> |
                                                                        <a href="index.php?post_id_to_delete=<?php echo $post['id']; ?>" onclick="confirm('Are you sure you want to delete  it ?');">Delete</a>
                                                                </td>
                                                        </tr>


                                                        <?php
                                                                        }
                                                        ?>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>
</div>


<?php
        if(isset($_GET['post_id_to_delete'])){
                // echo "kooo";

                $postIdToDelete = $_GET['post_id_to_delete'];
                $query = "DELETE FROM posts WHERE id=  $postIdToDelete";

                 mysqli_query($db,$query);
                 $_SESSION['successMsg'] = ' A post is deleted successfully !';
                 header('locantion:index.php');


                // Delete db
                /*
                DELETE FROM table_name  WHERE condition;
                */
        }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>