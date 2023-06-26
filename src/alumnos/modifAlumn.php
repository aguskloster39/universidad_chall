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
            <h2>Agregar nuevo alumno</h2>
            <fieldset>
                <legend>Datos personales:</legend>
            <div>
                <label for="nombresAlumn">Nombres del alumno/a</label>
                <input id="nombresAlumn" type="text" name="nombresAlumn"/>
            </div>
            <div>
                <label for="apellidosAlumn">Apellidos:</label>
                <input id="apellidosAlumn" type="text" name="apellidosAlumn"/>
            </div>
            <div>
                <label for="dniAlumno">DNI:</label>
                <input id="dniAlumno" type="number" name="dniAlumno"/>
            </div>

            <div>
                <label for="nacimAlumno">Fecha de Nacimiento:</label>
                <input id="nacimAlumno" type="date" name="nacimAlumno" value="2023-06-26"/>
            </div>

            <div>
                <label for="domicAlumno">Domicilio:</label>
                <input id="domicAlumno" type="text" name="domicAlumno"/>
            </div>
            <div>
                <label for="postalAlumno">Codigo postal:</label>
                <input id="postalAlumno" type="text" name="postalAlumno"/>
            </div>

            </fieldset>

            <fieldset>
                <legend>Datos de contacto:</legend>
                
            <div>
                <label for="celularAlumno">Celular:</label>
                <input id="celularAlumno" type="text" name="celularAlumno"/>
            </div>
                
            <div>
                <label for="mailAlumno">Mail:</label>
                <input id="mailAlumno" type="email" name="mailAlumno"/>
            </div>
            </fieldset>

            <fieldset>
                <legend>Datos de carrera:</legend>
                <div>
                <label for="carrerasAlumn">Carrera:</label>

                <select id="carrerasAlumn" name="carrerasAlumn">
                    <?php
                        $mysqli = mysqli_init();
                        $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
                        $mysqli->real_connect("localhost", "root", "", "universidad_db");
                        
                        if ($mysqli->connect_errno) {
                            echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
                        }
                        
                        $facultades=$mysqli->query("Select * from carreras");
                        foreach ($facultades as $row) {
                            echo "<option value=" . $row['id_carrera'] . ">" . $row['nombre_carrera'] . "</option>";
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