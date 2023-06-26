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
                <li><a href="../alumnos/alumnos.php">Alumnos</a></li>
            </menu>
        </nav>
        <form action="postModificarCursada.php" method="post">
            <h2>Modificar cursada</h2>
            <fieldset>
                <legend>Datos de cursada:</legend>

        
                    <?php
                        $mysqli = mysqli_init();
                        $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
                        $mysqli->real_connect("localhost", "root", "", "universidad_db");
                        
                        if ($mysqli->connect_errno) {
                            echo '<script>alert("Falló la conexión a MySQL, recargar pagina")</script>';
                        }
                        
                        $dataAlumno=$mysqli->query("SELECT nombres_alumno, apellidos_alumno FROM `alumnos` WHERE id_alumno=".$_GET['idAlumn']);
                        $alumn=$dataAlumno->fetch_assoc();
                        $dataMateria=$mysqli->query("SELECT nombre_materia FROM `materias` WHERE id_materia=".$_GET['idMat']);
                        $mater=$dataAlumno->fetch_assoc();
       
                        echo "<h3>Notas de cursada de ".$alumn['apellidos_alumno']." ".$alumn['nombres_alumno']." de la materia ".$mater['nombre_materia']."</h3>";

                            
                        $mysqli->close();
                    ?>

            <div>
                <label for="primerParcial">Primer parcial:</label>
                <input id="primerParcial" type="number" name="primerParcial"/>
            </div>

            <div>
                <label for="segundoParcial">Segundo parcial:</label>
                <input id="segundoParcial" type="number" name="segundoParcial"/>
            </div>


            <div>
                <label for="tercerParcial">Tercer parcial:</label>
                <input id="tercerParcial" type="number" name="tercerParcial"/>
            </div>

            <div>
                <label for="cuartoParcial">Cuarto parcial:</label>
                <input id="cuartoParcial" type="number" name="cuartoParcial"/>
            </div>

            </fieldset>
                
            <div>
                <input type="submit" value="Guardar notas">
            </div>

        </form>
    </body>
</html>