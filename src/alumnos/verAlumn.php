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

                 $dataAlumn=$mysqli->query("SELECT id_carrera, id_alumn FROM `alumnos` WHERE id_alumno=".$_GET['idAlumn']);
                 $alumn=$dataAlumn->fetch_assoc();
                 $indCarr=$alumn['id_carrera'];

                 $dataCarrera=$mysqli->query("SELECT nombre_carrera FROM `carreras` WHERE id_carrera=".$indCarr);
                 $carr=$dataCarrera->fetch_assoc();

                 echo "<h1>Carrera: ".$carr['nombre_carrera']."</h1>";
                 
                 
                 
                 $materias=$mysqli->query("SELECT m.id_carrera, m.nombre_materia, m.horas_materia, m.aprobacion_materia
                 FROM `materias` m
                 WHERE m.id_carrera=".$indCarr .
                 " order by m.anio_materia, m.nombre_materia;");
                
                $antAnio=0;
                $tableOpen=false;
                echo "<h2>Lista de materias</h2>";
                 foreach ($materias as $row) {
                    if($row["anio_materia"]!=$antAnio){
                        if($tableOpen){
                            echo "</table>";
                            $tableOpen=false;
                        }
                        echo "<h3> Materias del ".$row["anio_materia"]."º año</h3>";
                        echo "<table>
                        <tr>
                          <th>Materia</th>
                          <th>Horas</th>
                          <th>Forma de Aprobacion</th>
                          <th>Inscribirse</th>
                        </tr>";
                        $antAnio=$row["anio_materia"];
                    } 
                    $inscrSt='../cursadas/postAgregarCursada.php?idMat='.$row["id_materia"].'·&idAlumn='.$alumn['id_alumno'];
                     echo "<tr><td>".$row["nombre_materia"]."</td>"
                     . "<td>".$row["horas_materia"]."</td>"
                     . "<td>".$row["aprobacion_materia"]."</td>"
                     . "<td><a href=".$inscrSt.">Inscribirse</a></td>";
                    $tableOpen=true;
                 }
                 if($tableOpen){
                    echo "</table>";
                    $tableOpen=false;
                }
                     
                 $mysqli->close();

             ?>


            

        </div>
    </body>
</html>