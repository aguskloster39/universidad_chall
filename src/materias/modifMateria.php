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
                <li><a href="./materias.php">Materias</a></li>
                <li><a href="../alumnos/alumnos.php">Alumnos</a></li>
            </menu>
        </nav>
        <form action="postMateria.php" method="post">
            <h2>Agregar nueva materia</h2>
            <fieldset>
                <legend>Datos de materia:</legend>

            
                <?php
                        $mysqli = mysqli_init();
                        $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
                        $mysqli->real_connect("localhost", "root", "", "universidad_db");
                        
                        if ($mysqli->connect_errno) {
                            echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
                        }

                        $res=$mysqli->query("Select * from materias where id_carrera=" . $_GET["idMat"]);
                        $matAct=$res->fetch_assoc();
                        echo '<div>
                            <label for="carrerasMat">Carrera:</label>';
                        echo '<select id="carrerasMat" name="carrerasMat">';
                        $carreras=$mysqli->query("Select * from carreras");
                        foreach ($carreras as $row) {
                            if($row['id_carrera']  == $matAct['id_carrera']){
                                echo "<option value=" . $row['id_carrera'] . " selected>" . $row['nombre_carrera'] . "</option>";
                            } else {
                                echo "<option value=" . $row['id_carrera'] . ">" . $row['nombre_carrera'] . "</option>";
                            }
                        }
                            

           echo     '</select>
            </div>

            <div>
                <label for="nombreMat">Nombre:</label>';
                echo '<input id="nombreMat" type="text" name="nombreMat" value=\"'.$matAct['nombre_materia'].'\"/>';
            echo '</div>

            <div>
                <label for="anioMat">Año:</label>';
                echo '<input id="anioMat" type="number" name="anioMat" value='.$matAct['anio_materia'].'/>';
            echo '</div>

            <div>
                <label for="horasMat">Horas anuales:</label>';
                echo '<input id="horasMat" type="number" name="horasMat" value='.$matAct['horas_materia'].'/>';
            echo'</div>
                
            <div>
                <label for="aprobacionMat">Forma de aprobacion:</label>';
                if($matAct['aprobacion_materia']=='final')
                    echo '<input type="radio" id="aprobacionFinal" name="aprobacionMat" value="Final" checked/>';
                else 
                    echo '<input type="radio" id="aprobacionFinal" name="aprobacionMat" value="Final"/>';
                echo '<label for="aprobacionFinal">Final</label>';
              
                if($matAct['aprobacion_materia']=='promocion')
                    echo '<input type="radio" id="aprobacionPromocion" name="aprobacionMat" value="Promocion" checked/>';
                else 
                    echo '<input type="radio" id="aprobacionPromocion" name="aprobacionMat" value="Promocion"/>';
                echo '<label for="aprobacionPromocion">Promocion</label>
                
            </div>';

            $mysqli->close();
            ?>

            </fieldset>
                
            <div>
                <input type="submit" value="Agregar Materia">
            </div>

        </form>
    </body>
</html>