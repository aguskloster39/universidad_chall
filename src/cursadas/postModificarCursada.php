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


$dataMateria=$mysqli->query("SELECT aprobacion_materia FROM `materias` WHERE id_materia=".$_POST['idMat']);
$mater=$dataAlumno->fetch_assoc();
$formaAprobacion=$mater['aprobacion_materia'];
$cantDes=0;
$sumProm=0;
$arregNot=array($_POST['primerParcial'],$_POST['segundoParcial'],$_POST['tercerParcial'],$_POST['cuartoParcial']);
foreach($arregNot as $nota){
    if($nota<4){
        $cantDes=$cantDes+1;
    } else {
        $sumProm=$sumProm+$nota;
    }
}
$notaFin=0;
$result="";

if($cantDes>1){
    $notaFin=2;
    $result="recursa";
} else {
    if($cantDes==1){
        $notFin=($sumProm/3);
        $result="final";
    } else {
        $notFin=($sumProm/4);
        if($notFin>7 && $formaAprobacion=="promocion") $result="promocion";
        else $result="final";
    }
}

if (!$mysqli->query("UPDATE cursadas SET 
    primer_parcial=" . $_POST['primerParcial'] . ",
    segundo_parcial=" . $_POST['segundoParcial']  . ",
    tercer_parcial=" . $_POST['tercerParcial'] .", 
    cuarto_parcial=" . $_POST['cuartoParcial'] .",
    nota=" . $notFin ",
    estado=\"" . $resultado . "\" WHERE
    id_materia=" . stripslashes($_POST['idMat']) . " AND 
    id_alumn=" .stripslashes($_POST['idMat'])  )) {
    echo "Falló el registro de la cursada: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Cursada registrada con exito";
}
$mysqli->close();

?>

</body>

</html>