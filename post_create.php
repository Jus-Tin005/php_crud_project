
<?php

// declare(strict_types = 1);
// error_reporting(E_ALL);
// ini_set("display_errors", '1');


// ..............SESSION code area..........
session_start();




// include("connect.php");
require("connect.php");
$titleError = ' ';
$descError = ' ';

if(isset($_POST['post_create_button'])){
        // echo 'You clicked me now !';

        /* echo $_POST['title'];
        echo $_POST['description']; */

       $title = $_POST['title'];
       $desc = $_POST['description'];

//        echo  $title,$desc;

        // step 1

        //if($title == ''){
              //  $titleError = "The title field is required !";
       // }

       // if($desc == ''){
                //$descError = "The Description field is required !";
        //}elseif($title != '' && $desc != ''){
                // echo'hi';

        //    mysqli_query($db," INSERT INTO posts(title,description) VALUES('$title','$desc')");   // error here

       // }else{

        //}



           // step 2

           if(empty($title)){
                $titleError = "The title field is required !";
        }

        if(empty($desc)){
                $descError = "The Description field is required !";
        }


        if(!empty($title)&& !empty($desc)){
                // echo'hi';

        //    mysqli_query($db," INSERT INTO posts(title,description) VALUES('$title','$desc')");   // error here
        $_SESSION['successMsg'] = ' A post is created successfully !';
        header('location:index.php');

        }else{

        }



       // mehod 1
       // query statement
//        $query = " INSERT INTO posts(title,description) VALUES('$title','$desc') ";    // need double quote here

//    mysqli_query(database_conection,query);
//        mysqli_query($db,$query);


       // method 2

//        mysqli_query($db," INSERT INTO postsecond(title,description) VALUES('$title','$desc')");
//        mysqli_query($db,"INSERT persons(Title,Description) VALUES('$title','$desc')");
        //    mysqli_query($db," INSERT INTO posts(title,description) VALUES('$title','$desc')");   // error here

}

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
                                                                                        <div class="card-title">Post Creattion Form</div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <a href="index.php" class="btn btn-secondary float-end"><< Back</a>
                                                                                </div>
                                                                </div>

                                                </div>
                                <form action="post_create.php" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">
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
                                                                <button type="submit" name="post_create_button" class="btn btn-success">Create Posts</button>
                                                </div>
                                </form>
                        </div>
                </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>