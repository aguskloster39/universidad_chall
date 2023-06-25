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
                <li><a href="./carreras/carreras.php">Carreras</a></li>
                <li><a href="./materias/materias.php">Materias</a></li>
                <li><a href="./alumnos/alumnos.php">Alumnos</a></li>
            </menu>
        </nav>
        <?php
$mysqli = new mysqli("localhost", "root", "", "universidad_db");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br/>";

$mysqli = new mysqli("127.0.0.1", "root", "", "universidad_db", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info;
?>
    </body>
</html>