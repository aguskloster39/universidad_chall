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

                 $dataCarrera=$mysqli->query("SELECT nombre_carrera FROM `carreras` WHERE id_carrera=".$_GET['idCarr']);
                 $carr=$dataCarrera->fetch_assoc();

                 echo "<h1>Carrera: ".$carr['nombre_carrera'];
                 
                 
                 
                 $materias=$mysqli->query("SELECT m.id_carrera, m.nombre_materia, m.horas_materia, m.aprobacion_materia, m.anio_materia, ifNull(cur.cantidad,0) as inscriptos
                 FROM `materias` m
                 left join (select IFNULL(COUNT(*), 0) as cantidad, id_materia
                 from `cursadas` 
                 GROUP by id_materia
                 ) cur
                 on cur.id_materia = m.id_materia
                 WHERE m.id_carrera=".$_GET['idCarr'] .
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
                          <th>Inscriptos</th>
                          <th>Ver</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
                        </tr>";
                        $antAnio=$row["anio_materia"];
                    } 
                    $verSt='../materias/verMat.php?idCarr='.$row["id_carrera"];
                    $editarSt='../materias/modifMat.php?idCarr='.$row["id_carrera"];
                    $eliminarSt='../materias/elimMat.php?idCarr='.$row["id_carrera"];
                     echo "<tr><td>".$row["nombre_materia"]."</td>"
                     . "<td>".$row["horas_materia"]."</td>"
                     . "<td>".$row["aprobacion_materia"]."</td>"
                     . "<td>".$row["inscriptos"]."</td>"
                     . "<td><a href=".$verSt.">Ver</a></td>"
                     . "<td><a href=".$editarSt.">Editar</a></td>"
                     . "<td><a href=".$eliminarSt.">Eliminar</a></td></tr>";
                    $tableOpen=true;
                 }
                 if($tableOpen){
                    echo "</table>";
                    $tableOpen=false;
                }
                     
                 echo '<a href="./agregarMat.php">Agregar Materia</a>';

                 $alumnos=$mysqli->query("SELECT al.id_alumno, al.id_carrera, al.nombres_alumno, al.apellidos_alumno, al.DNI_alumno
                 FROM alumnos al
                 WHERE al.id_carrera=".$_GET['idCarr'] .
                 " order by al.apellidos_alumno, al.nombres_alumno;");
                 
                echo "<h2>Listado de alumnos</h2>";

                 echo "<table>
                 <tr>
                   <th>Apellido</th>
                   <th>Nombre</th>
                   <th>DNI</th>
                   <th>Ver</th>
                   <th>Modificar</th>
                   <th>Eliminar</th>
                 </tr>";

                 foreach ($alumnos as $row) {
                    $verSt='../alumnos/verAlumn.php?idCarr='.$row["id_carrera"];
                    $editarSt='../alumnos/modifAlumn.php?idCarr='.$row["id_carrera"];
                    $eliminarSt='../alumnos/elimAlumn.php?idCarr='.$row["id_carrera"];
                     echo "<tr><td>".$row["apellidos_alumno"]."</td>"
                     . "<td>".$row["nombres_alumno"]."</td>"
                     . "<td>".$row["DNI_alumno"]."</td>"
                     . "<td><a href=".$verSt.">Ver</a></td>"
                     . "<td><a href=".$editarSt.">Editar</a></td>"
                     . "<td><a href=".$eliminarSt.">Eliminar</a></td></tr>";
                 }
                 $mysqli->close();

             ?>


            

        </div>
    </body>
</html>