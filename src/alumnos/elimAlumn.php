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
                     echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
                 }

                 $dataCarrera=$mysqli->query("SELECT nombre_alumno FROM `alumnos` WHERE id_alumno=".$_GET['idAlumn']);
                 $carr=$dataCarrera->fetch_assoc();

                 echo "<h1>Alumno: ".$carr['nombre_carrera'];
                 echo "<p>Seguro de dar de baja al alumno? esta opcion es irreversible<p>
                 <a href='./postElimAlumn.php?idAlumn=".$_GET['idAlumn']."\'>SI, DESEO DAR DE BAJA AL ALUMNO</a></br>
                 <a href='../index.php'>NO, CANCELAR</a>"
             ?>