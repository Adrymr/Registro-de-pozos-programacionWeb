<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Pozos | Mediciones</title>

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
            <h3 class="title">Registro de mediciones del pozo</h3><br>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="valorPSI" class="form-label" name="valorPSI" >Valor PSI a Registrar</label>
                    <input type="number" step="0.01" class="form-control"  name="valorPSI" placeholder="Ingrese el valor PSI del pozo a registrar" required>
                </div>
                <br>
                
                <div class="btn-container">
                    <button type="submit" class="btn btn-bg" name="btn-registrar">Registrar</button>
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

if(!empty($_GET['id']) && isset($_POST['btn-registrar']) && isset($_POST['valorPSI'])){
    $idPozo = $_GET['id'];
    $valorPSI = $_POST['valorPSI'];
    $query = "INSERT INTO registros (idPozoRegistro, fechaRegistro, valorPSI) values ('$idPozo', now(), '$valorPSI')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo "<div class='container-fluid'>
            <div class='alert alert-dark btn-container' role='alert'>
                Medición registrada con exito! <br>
            </div>
        </div>";

    mysqli_close($conn);
}
?>