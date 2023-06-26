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
                <li><a href="./alumnos.php">Alumnos</a></li>
            </menu>
        </nav>
        <form action="postAlumn.php" method="post">

        <?php
            $mysqli = mysqli_init();
            $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            $mysqli->real_connect("localhost", "root", "", "universidad_db");

            $res=$mysqli->query("Select * from alumnos where id_alumno=" . $_GET["idAlumn"]);
            $alumnAct=$res->fetch_assoc();
            echo'<h2>Agregar nuevo alumno</h2>
            <fieldset>
                <legend>Datos personales:</legend>
            <div>
                <label for="nombresAlumn">Nombres del alumno/a</label>';
               echo '<input id="nombresAlumn" type="text" name="nombresAlumn" value=\"'.$alumnAct['nombres_alumno'].'\" />';
            echo '</div>
            <div>
                <label for="apellidosAlumn">Apellidos:</label>';
                echo'<input id="apellidosAlumn" type="text" name="apellidosAlumn" value=\"'.$alumnAct['apellidos_alumno'].'\" />';
            echo'</div>
            <div>
                <label for="dniAlumno">DNI:</label>';
                echo '<input id="dniAlumno" type="number" name="dniAlumno" value='.$alumnAct['DNI_alumno'].'/>';
            echo'</div>

            <div>
                <label for="nacimAlumno">Fecha de Nacimiento:</label>';
                echo '<input id="nacimAlumno" type="date" name="nacimAlumno" value=\"'.$alumnAct['nacimiento_alumno'].'\" />';
            echo'</div>

            <div>
                <label for="domicAlumno">Domicilio:</label>';
                echo'<input id="domicAlumno" type="text" name="domicAlumno" value=\"'.$alumnAct['domicilio_alumno'].'\" />';
            echo '</div>
            <div>
                <label for="postalAlumno">Codigo postal:</label>';
                echo '<input id="postalAlumno" type="text" name="postalAlumno" value=\"'.$alumnAct['codigoPostal_alumno'].'\" />';
            echo'</div>

            </fieldset>

            <fieldset>
                <legend>Datos de contacto:</legend>
                
            <div>
                <label for="celularAlumno">Celular:</label>';
                echo'<input id="celularAlumno" type="text" name="celularAlumno" value=\"'.$alumnAct['celular_alumno'].'\" />';
            echo'</div>
                
            <div>
                <label for="mailAlumno">Mail:</label>';
                echo'<input id="mailAlumno" type="email" name="mailAlumno" value=\"'.$alumnAct['mail_alumno'].'\" />';
            echo'</div>
            </fieldset>

            <fieldset>
                <legend>Datos de carrera:</legend>
                <div>
                <label for="carrerasAlumn">Carrera:</label>

                <select id="carrerasAlumn" name="carrerasAlumn">';

                        
                        if ($mysqli->connect_errno) {
                            echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
                        }
                        
                        $carreras=$mysqli->query("Select * from carreras");
                        foreach ($carreras as $row) {
                            if($row['id_carrera']  == $alumnAct['id_carrera']){
                                echo "<option value=" . $row['id_carrera'] . " selected>" . $row['nombre_carrera'] . "</option>";
                            } else {
                                echo "<option value=" . $row['id_carrera'] . ">" . $row['nombre_carrera'] . "</option>";
                            }
                        }
                            
                        $mysqli->close();
                    ?>
                </select>
            </div>

            </fieldset>
                
            <div>
                <input type="submit" value="Agregar alumno">
            </div>

        </form>
    </body>
</html>