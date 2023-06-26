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

if (!$mysqli->query("UPDATE alumnos SET  
    apellidos_alumno=\"" . $_POST['apellidosAlumn'] . "\",
    celular_alumno=\"". $_POST['celularAlumno']  . "\",
    codigoPostal_alumno=\""  . $_POST['postalAlumno']  . "\",
    DNI_alumno=" . $_POST['dniAlumno'] . ",
    domicilio_alumno=\"" . $_POST['domicAlumno'] . "\",
    id_carrera=". $_POST['carrerasAlumn'] . ",
    mail_alumno=\"" . $_POST['mailAlumno'] . "\",
    nacimiento_alumno=\""  . $_POST['nacimAlumno'] . "\",
    nombres_alumno=\"" . $_POST['nombresAlumn'] ."\" WHERE
    id_alumno=" .(stipslashes)($_POST['idAlumn'] ) ) ) { 
    echo "Falló el ingreso del alumno: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Alumno ingresado con exito!";
}
$mysqli->close();

?>

</body>
</html>