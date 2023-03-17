<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registro de Pozos | Inicio</title>

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
            <h3 class="title">Registro de pozos petroleros</h3><br>
            <form action="createPozo.php" method="post">
                <div class="mb-3">
                    <label for="nombrePozo" class="form-label" name="nombrePozo" >Pozo a Registrar</label>
                    <input type="text" class="form-control"  name="nombrePozo" placeholder="Ingrese el nombre del pozo a registrar" required>
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
                    <button type="submit" class="btn btn-bg" name="btn-registrar">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="fluid-container main-container">
        <div class="table-container">
            <h3 class="title">Historico de registros</h3><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Pozo registrado</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de registro</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    include_once ('conexion\conexion.php');
                    include ('deletePozo.php');
                    $query = "SELECT * FROM pozos";
                    $rs    = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
                    $count = mysqli_num_rows($rs);
                    if($count > 0){
                        while($rows = mysqli_fetch_array($rs)){
                            ?>
                            <tr>
                                <td><?php echo $rows['nombre']; ?></td>
                                <td><?php echo $rows['ubicacion']; ?></td>
                                <td><?php echo $rows['estado']; ?></td>
                                <td><?php echo $rows['fechaRegistroPozo']; ?></td>
                                <td>
                                    <a href="createMedicion.php?id=<?php echo $rows['idPozo'];?>" class="btn btn-small btn-success"><i class="fa-solid fa-plus"></i></a>
                                    <a href="graphicsPozo.php?id=<?php echo $rows['idPozo'];?>" class="btn btn-small btn-primary"><i class="fa-solid fa-chart-simple"></i></a>
                                    <a href="updatePozo.php?id=<?php echo $rows['idPozo'];?>" class="btn btn-small btn-secondary"><i class="fa-solid fa-file-pen"></i></a>
                                    <a href="deletePozo.php?id=<?php echo $rows['idPozo'];?>" class="btn btn-small btn-danger"><i class="fa-solid fa-xmark"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="5">No hay pozos registrados</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>