<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "pozospdvsa";

$conn = mysqli_connect($host, $user, $password, $database);

if(mysqli_connect_errno()){
    echo "Error: " . mysqli_connect_error();
}else{
    //echo "conexión exitosa";
}

?>