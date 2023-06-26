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
//La eliminacion de la materia elimina cursadas asociadas, en cascada por MySQL
if (!$mysqli->query("DELETE FROM
    materias WHERE id_materia=" . $_GET['idMat'])) { 
    echo "Falló la eliminacion de la materia: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Materia eliminada con exito!";
}
$mysqli->close();

?>

</body>

</html>