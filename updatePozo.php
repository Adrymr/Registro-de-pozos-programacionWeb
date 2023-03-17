<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Pozos | Modificación</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/3d4edb8365.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="assets/1280px-PDV_S.A._logo.svg.png" alt="Logo" width="180" height="55" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container-fluid main-container">
        <div class="form-container">
            <h3 class="title">Modificación del registro del pozo</h3><br>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="nombrePozo" class="form-label" name="nombrePozo" >Nombre del Pozo</label>
                    <input type="text" class="form-control"  name="nombrePozo" placeholder="Ingrese el nombre del pozo">
                </div>
                <br>
                <div class="mb-3">
                    <label for="ubicacionPozo" class="form-label">Ubicación del Pozo</label>
                    <select class="form-select" aria-label="Default select example" name="ubicacionPozo" required>
                        <option></option>
                        <option value="Zulia - Ciudad Ojeda">Zulia - Ciudad Ojeda</option>
                        <option value="Zulia - Lagunillas">Zulia - Lagunillas</option>
                        <option value="Zulia - Bachaquero">Zulia - Bachaquero</option>
                        <option value="Falcon - Buchivacoa">Falcon - Buchivacoa</option>
                        <option value="Falcon - Mene Mauroa">Falcon - Mene Mauroa</option>
                        <option value="Barinas - La Victoria">Barinas - La Victoria</option>
                        <option value="Barinas - San Silvestre">Barinas - San Silvestre</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="estadoPozo" class="form-label">Estado del Pozo</label>
                    <select class="form-select" aria-label="Default select example" name="estadoPozo" required>
                        <option></option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                        <option value="Abandonado">Abandonado</option>
                    </select>
                </div>
                <br>
                <div class="btn-container">
                    <button type="submit" class="btn btn-bg" name="btn-modificar">Modificar</button>
                    <a href='index.php' class='btn-bg'>Regresar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
</body>
</html>


<?php

include_once ('conexion/conexion.php');

if(!empty($_GET['id']) && isset($_POST['btn-modificar']) && isset($_POST['nombrePozo']) && isset($_POST['ubicacionPozo']) && isset($_POST['estadoPozo'])){

    $idPozo = $_GET['id'];
    $nombrePozo = $_POST['nombrePozo'];
    $ubicacionPozo = $_POST['ubicacionPozo'];
    $estadoPozo = $_POST['estadoPozo'];

    $query = "UPDATE pozos set nombre='$nombrePozo', ubicacion='$ubicacionPozo', estado='$estadoPozo' WHERE idPozo='$idPozo'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo "<div class='container-fluid'>
            <div class='alert alert-dark btn-container' role='alert'>
                Registro modificado con exito! <br>
            </div>
        </div>";

    mysqli_close($conn);
}

?>