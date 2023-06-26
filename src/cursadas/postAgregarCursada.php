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
                <li><a href="../materias/materias.php">Materias</a></li>
                <li><a href="../alumnos/alumnos.php">Alumnos</a></li>
            </menu>
        </nav>
        <div>

<?php 



$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "universidad_db");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


if (!$mysqli->query("INSERT INTO
    cursadas (id_materia, id_alumno) VALUES 
    (" . $_GET['idMat'] . "," . $_GET['idAlumn'] . ")" )  ) {
    echo "Falló el ingreso a la materia: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Ingreso exitoso a la materia";
}
$mysqli->close();

?>

</body>

</html>