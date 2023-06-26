<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>

    <body>
        <header>
            <h1>Gestor universidad </h1>
        </header>

        <nav id="nav">
            <menu>
                <li><a href="../carreras/carreras.php">Carreras</a></li>
                <li><a href="./materias.php">Materias</a></li>
                <li><a href="../alumnos/alumnos.php">Alumnos</a></li>
            </menu>
        </nav>

<?php 

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "universidad_db");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO materias 
    anio_materia=". $_POST['anioMat'] .", 
    aprobacion_materia=\"" . $_POST['aprobacionMat']  ."\",
    id_carrera=". $_POST['carrerasMat']  .", 
    nombre_materia=\"" . $_POST['nombreMat'] . "\", 
    horas_materia=" . $_POST['horasMat'] . " WHERE
    id_materia=".stripslashes($_POST['idMat']) )  ) { 
    echo "Falló el registro de la materia: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Materia registrada con exito!";
}
$mysqli->close();

?>

</body>

</html>