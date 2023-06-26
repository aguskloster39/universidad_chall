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
        <?php

            $mysqli = mysqli_init();
            $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            $mysqli->real_connect("localhost", "root", "", "universidad_db");

            if ($mysqli->connect_errno) {
                echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
            }

            $res=$mysqli->query("Select * from carreras where id_carrera=" . $_GET["idCarr"]);
            $carrAct=$res->fetch_assoc();


        echo '<form action="postCarreraMod.php" method="post">';
        echo '<input id="idCarrera" name="idCarrera" type="hidden" value='.$_GET["idCarr"]. '>';
        echo    '<h2>Modificar carrera: ' . $carrAct['nombre_carrera'] .   '</h2>';
        echo    '<fieldset>
                <legend>Datos de la carrera:</legend>
            <div>';
        echo       "<label for='nombreCarr'>Nombre de la carrera:</label>";
                
        echo        '<input id="nombreCarr" type="text" name="nombreCarr" value="' .$carrAct['nombre_carrera'] . '"/>';
        echo    '</div>
            <div>
                <label for="descripCarr">Breve descripcion:</label>';
        echo      '<input id="descripCarr" type="text" name="descripCarr" value="' .$carrAct['descripcion_carrera'] . '"/>';
        echo    '</div>
            <div>
                <label for="duracionCarr">Años de duracion:</label>';
        echo    '<input id="duracionCarr" type="number" name="duracionCarr" value="' .$carrAct['duracion_carrera'] . '"/>';
        echo   '</div>
                
            <div >
                <label for="facultades">Facultad:</label>';

        echo    '<select id="facultades" name="facultCarr">';
               
                        
                        $facultades=$mysqli->query("Select * from facultades");
                        foreach ($facultades as $row) {
                            if($row['id_facultad']  == $carrAct['id_facultad']){
                                echo "<option value=" . $row['id_facultad'] . " selected>" . $row['nombre_facultad'] . "</option>";
                            } else {
                                echo "<option value=" . $row['id_facultad'] . ">" . $row['nombre_facultad'] . "</option>";
                            }
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
