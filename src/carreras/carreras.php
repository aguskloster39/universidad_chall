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
                 
                 $carreras=$mysqli->query("SELECT c.id_carrera, c.nombre_carrera, c.descripcion_carrera, c.duracion_carrera, ifNull(a.cantidad,0) as inscriptos, f.nombre_facultad
                 FROM `carreras` c
                 left join `facultades` f
                 on f.id_facultad=c.id_facultad
                 left join (select IFNULL(COUNT(*), 0) as cantidad, id_carrera
                 from `alumnos` 
                 GROUP by id_carrera
                 ) a
                 on a.id_carrera = c.id_carrera
                 order by f.nombre_facultad, c.nombre_carrera;");
                $antFac="";
                $tableOpen=false;
                 foreach ($carreras as $row) {
                    if($row["nombre_facultad"]!=$antFac){
                        if($tableOpen){
                            echo "</table>";
                            $tableOpen=false;
                        }
                        echo "<h2>".$row["nombre_facultad"]."</h2>";
                        echo "<table>
                        <tr>
                          <th>Carrera</th>
                          <th>Descripcion</th>
                          <th>Duracion (años)</th>
                          <th>Inscriptos</th>
                          <th>Ver</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
                        </tr>";
                        $antFac=$row["nombre_facultad"];
                    } 
                    $verSt='./verCarr.php?idCarr='.$row["id_carrera"];
                    $editarSt='./modifCarr.php?idCarr='.$row["id_carrera"];
                    $eliminarSt='./elimCarr.php?idCarr='.$row["id_carrera"];
                     echo "<tr><td>".$row["nombre_carrera"]."</td>"
                     . "<td>".$row["descripcion_carrera"]."</td>"
                     . "<td>".$row["duracion_carrera"]."</td>"
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
                     
                 $mysqli->close();
                 echo '<a href="./agregarCarr.php">Agregar Carrera</a>'

             ?>


            

        </div>
    </body>
</html>