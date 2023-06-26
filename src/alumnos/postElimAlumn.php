<html>
    <body>
        <header>
            <h1>Gestor universidad </h1>
        </header>

        <nav id="nav">
            <menu>
                <li><a href="../carreras/carreras.php">Carreras</a></li>
                <li><a href="../materias/materias.php">Materias</a></li>
                <li><a href="./alumnos.php">Alumnos</a></li>
            </menu>
        </nav>


<?php 

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "universidad_db");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//La eliminacion del alumno elimina cursadas asociadas, en cascada por MySQL
if (!$mysqli->query("DELETE FROM
    alumnos WHERE id_alumno=" . $_GET['idAlumn'])) { 
    echo "Falló la baja del alumno: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Alumno dado de baja con exito!";
}
$mysqli->close();

?>
</body>
</html>