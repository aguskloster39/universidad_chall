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

                 $dataCarrera=$mysqli->query("SELECT nombre_materia FROM `materias` WHERE id_materia=".$_GET['idMat']);
                 $carr=$dataCarrera->fetch_assoc();

                 echo "<h1>Materia: ".$carr['nombre_materia'];
                 echo "<p>Seguro de eliminar la materia? esta opcion es irreversible<p>
                 <a href='./postElimMat.php?idMat=".$_GET['idMat']."\'>SI, DESEO ELIMINAR LA MATERIA</a></br>
                 <a href='../index.php'>NO, CANCELAR</a>"
             ?>