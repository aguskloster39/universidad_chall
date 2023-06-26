<?php 

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "universidad_db");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO
    alumnos (apellidos_alumno, celular_alumno, codigoPostal_alumno, DNI_alumno, domicilio_alumno, id_carrera, mail_alumno, nacimiento_alumno, nombres_alumno) VALUES 
    (\"" . $_POST['apellidosAlumn'] . "\",\"" . $_POST['celularAlumno']  . "\",\"" 
    . $_POST['postalAlumno']  . "\"," . $_POST['dniAlumno'] . ",\"" . $_POST['domicAlumno'] . "\","
    . $_POST['carrerasAlumn'] . ",\"" . $_POST['mailAlumno'] . "\",\"" . $_POST['nacimAlumno'] . "\",\"" . $_POST['nombresAlumn']
    . "\")" )  ) { 
    echo "Falló el ingreso del alumno: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Alumno ingresado con exito!";
}
$mysqli->close();

?>