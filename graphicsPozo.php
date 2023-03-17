<?php
include_once ('conexion/conexion.php');

if(!empty($_GET['id'])){
    $idPozo = $_GET['id'];
    $query = "SELECT * FROM registros WHERE idPozoRegistro = '$idPozo'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $fechaP = [];
    $valoresM = [];

    if (mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_array($result)){
            array_push($fechaP, $rows['fechaRegistro']);
            array_push($valoresM, $rows['valorPSI']);
        }
    }else{
        echo " <h3 class='title'>Este pozo no tiene mediciones registradas</h3><br>";
    }
}      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Pozos | Gráficas</title>

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
        <div class="graphic-container">
            <h3 class="title">Graficas de Mediciones</h3><br>
            <canvas id = "lineChart" height = "400" width = "400"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const CHART = document.getElementById("lineChart");
                console.log(CHART);
                let lineChart = new Chart(CHART, {
                    type: "line",
                    data: {
                        labels: [<?php echo '"'.implode('","',  $fechaP ).'"' ?>],
                        datasets: [{
                            label: 'Gráfica de pozos petroleros',
                            data: [<?php echo '"'.implode('","',  $valoresM ).'"' ?>],
                            fill: false,
                            borderColor: 'rgb(28, 40, 51)',
                            tension: 0.1,
                            backgroundColor: 'rgb(255, 255, 255, 1)',
                        }]
                    }
                })  
            </script>

            <br>

            <div class="btn-container">
                <a href='index.php' class='btn-bg'>Regresar</a>
            </div>
        </div>
    </div>
</body>
</html>

