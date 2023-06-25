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
        <form action="postCarrera.php" method="post">
            <h2>Agregar nueva carrera</h2>
            <fieldset>
                <legend>Datos de la carrera:</legend>
            <div>
                <label for="nombreCarr">Nombre de la carrera:</label>
                <input id="nombreCarr" type="text" name="nombreCarr"/>
            </div>
            <div>
                <label for="descripCarr">Breve descripcion:</label>
                <input id="descripCarr" type="text" name="descripCarr"/>
            </div>
            <div>
                <label for="duracionCarr">Años de duracion:</label>
                <input id="duracionCarr" type="number" name="duracionCarr"/>
            </div>
                
            <div >
                <label for="facultades">Facultad:</label>

                <select id="facultades" name="facultCarr">
                    <?php
                        $mysqli = mysqli_init();
                        $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
                        $mysqli->real_connect("localhost", "root", "", "universidad_db");
                        
                        if ($mysqli->connect_errno) {
                            echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
                        }
                        
                        $facultades=$mysqli->query("Select * from facultades");
                        foreach ($facultades as $row) {
                            echo "<option value=" . $row['id_facultad'] . ">" . $row['nombre_facultad'] . "</option>";
                        }
                            
                        $mysqli->close();
                    ?>
                    <option value=-1>Otro</option>
                </select>
            </div>
                
            <div id="showFacul" >
                <label for="posibFac">Nueva facultad:</label>
                <input id="posibFac" type="text" name="posibFac"/>
            </div>

            </fieldset>
                
            <div>
                <input type="submit" value="Agregar carrera">
            </div>

        </form>

        <script>
            document.getElementById("showFacul").style.visibility = "hidden";
            document.getElementById("showFacul").style.display = "none";
            document.getElementById("facultades").addEventListener("change", function() {
                if(document.getElementById('facultades').value == -1) {
                    document.getElementById("showFacul").style.display = "block";
                    document.getElementById("showFacul").style.visibility = "visible";
                } else {
                    document.getElementById("showFacul").style.display = "none";
                    document.getElementById("showFacul").style.visibility = "hidden";
                }
            });
            </script>
    </body>
</html>
