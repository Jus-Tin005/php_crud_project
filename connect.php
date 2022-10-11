<?php

// echo "Database Connected Successfully !";

declare(strict_types = 1);
error_reporting(E_ALL);
ini_set("display_errors", '1');


/*
! Database Connection syntax
*/

/*
mysqli_connect(server,server_name,password,dbname);
*/

// method 1
// $db = mysqli_connect('localhost','root','khunTun1997','basic_php_crud');

$server = 'localhost';
$name = 'root';
$psw = 'khunTun1997';
$dbname = 'basic_php_crud';
$db = mysqli_connect($server,$name,$psw,$dbname);


// if($db == true){
//         echo "Database connected successfully !";
// }else{
//         die("Some Error" . mysqli_connect_error($db));
// }


if($db == false){
        die("Some Error" . mysqli_connect_error($db));
}


?>