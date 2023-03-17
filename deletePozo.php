<?php
ob_start();

include_once ('conexion/conexion.php');

if(!empty($_GET['id'])){
    $idPozo = $_GET['id'];
    $query = "DELETE FROM registros WHERE idPozoRegistro='$idPozo'";
    $query2 = "DELETE FROM pozos WHERE idPozo='$idPozo'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

    if($result == true){
        header('Location: index.php');
    }
}

ob_end_flush();
?>