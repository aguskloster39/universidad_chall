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

            <div>
                <label for="carrerasMat">Carrera:</label>

                <select id="carrerasMat" name="carrerasMat">
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

            <div>
                <label for="nombreMat">Nombre:</label>
                <input id="nombreMat" type="text" name="nombreMat"/>
            </div>

            <div>
                <label for="anioMat">Año:</label>
                <input id="anioMat" type="number" name="anioMat"/>
            </div>

            <div>
                <label for="horasMat">Horas anuales:</label>
                <input id="horasMat" type="number" name="horasMat"/>
            </div>
                
            <div>
                <label for="aprobacionMat">Forma de aprobacion:</label>
                    <input type="radio" id="aprobacionFinal" name="aprobacionMat" value="Final" checked/>
                    <label for="aprobacionFinal">Final</label>
              
                    <input type="radio" id="aprobacionPromocion" name="aprobacionMat" value="Promocion" />
                    <label for="aprobacionPromocion">Promocion</label>
                
            </div>

            </fieldset>
                
            <div>
                <input type="submit" value="Agregar Materia">
            </div>

        </form>
    </body>
</html>