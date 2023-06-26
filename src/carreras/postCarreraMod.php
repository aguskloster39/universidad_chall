<?php 

$idFac=$_POST['facultCarr'];

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "universidad_db");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if((int)$_POST['facultCarr'] < 0) {
    if (!$mysqli->query("INSERT INTO
    facultades (nombre_facultad) VALUES 
    (\"" . $_POST['posibFac'] . "\")" ) ){
    echo "Falló la creación de la facultad: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    $idFac =$mysqli->insert_id;
    echo "Facultad creada con exito!";
}
}

echo "UPDATE
carreras set nombre_carrera=\"" . $_POST['nombreCarr'] . "\",
descripcion_carrera=\"" . $_POST['descripCarr']  . "\",
duracion_carrera=" . $_POST['duracionCarr'] .", 
id_facultad=" . $idFac .
"WHERE id_carrera=" . stripslashes($_POST['idCarrera']);
if (!$mysqli->query("UPDATE
    carreras set nombre_carrera=\"" . $_POST['nombreCarr'] . "\",
    descripcion_carrera=\"" . $_POST['descripCarr']  . "\",
    duracion_carrera=" . $_POST['duracionCarr'] .", 
    id_facultad=" . $idFac .
    " WHERE id_carrera=" . stripslashes($_POST['idCarrera'])
    )  ) {
    
    echo "Falló la modificación de la carrera: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Carrera modificada con exito!";
}

$mysqli->close();

?>