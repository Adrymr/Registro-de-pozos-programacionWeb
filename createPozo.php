<?php
ob_start();

include_once ('conexion/conexion.php');

if(isset($_POST['btn-registrar']) && isset($_POST['nombrePozo']) && isset($_POST['ubicacionPozo']) && isset($_POST['estadoPozo'])){

    $nombrePozo = $_POST['nombrePozo'];
    $ubicacionPozo = $_POST['ubicacionPozo'];
    $estadoPozo = $_POST['estadoPozo'];

    $query = "INSERT INTO pozos (nombre, ubicacion, estado, fechaRegistroPozo) values ('$nombrePozo', '$ubicacionPozo', '$estadoPozo', now())";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "se guardo";

    mysqli_close($conn);

    if($result == true){
        header('Location: index.php');
    }
}

ob_end_flush();
?>