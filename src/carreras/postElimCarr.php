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
                <li><a href="./carreras.php">Carreras</a></li>
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
//La eliminacion de la carrera elimina materias y alumnos asociados, en cascada por MySQL
if (!$mysqli->query("DELETE FROM
    carreras WHERE id_carrera=" . $_GET['idCarr'])) { 
    echo "Falló la eliminacion de la carrera: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Carrera eliminada con exito!";
}
$mysqli->close();

?>

</body>

</html>