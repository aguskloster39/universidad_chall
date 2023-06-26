<?php 

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "universidad_db");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO
    materias (anio_materia, aprobacion_materia, id_carrera, nombre_materia, horas_materia) VALUES 
    (" . $_POST['anioMat'] . ",\"" . $_POST['aprobacionMat']  . "\"," . $_POST['carrerasMat']  . ",\"" . $_POST['nombreMat'] . "\"," . $_POST['horasMat'] . ")" )  ) { 
    echo "Falló el registro de la materia: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Materia registrada con exito!";
}
$mysqli->close();

?>