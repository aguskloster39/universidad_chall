# universidad_chall

Repositorio correspondiente a la prueba tecnica para ingreso de Universidad Atlantida

## Detalles a tener en cuenta
1) El proyecto cuenta con dos carpetas, SRC donde se encuentran los archivos del sitio, y database donde se encuentra una copia de la base de datos
2) El repositorio fue simulado con un servidor XAMPP, utilizando PHP 8 y MySQL
3) Para mayor simplicidad, todo el sistema funciona como un unico sitio (sin tener en cuenta seguridad entre secciones)
4) Asi mismo existen detalles de seguridad que no se tuvieron en cuenta para facilitar la implementacion. Los inputs no estan sanitizados y no se corroboran errores tanto accidentales como de seguridad. Es demostrativo pero cabe aclarar que en un sistema real se tienen que tener en cuenta.

## Funcionamiento del sitio
El sitio se divide en 3 secciones: Carreras, Materias y Alumnos.
1) En el caso de carreras consta de una pagina principal que muestra la oferta actual, con cantidades de alumnos registrados. Realizando click en los links se pueden ver las materias de cada carrera con los datos de los alumnos registrados. Realizando click en las materias se entran a sus paginas respectivas. Al final de la pagina principal se ofrece la opcion de añadir una nueva carrera, que puede estar vinculada a las facultades existentes o a una nueva que se crea automaticamente.
2) En el caso de las materias, se ofrece un buscador que permite buscar cualquier materia entre todas las carreras, y entrar a la pagina especifica de cada una de ellas. Al final se ofrece un link para el formulario de ingreso de materia, para registrarla ante cualquier carrera.
3) Cada una de las materias que se ingresa, ya sea con el buscador o mediante el link de la carrera se visualiza en "modo docente". Es decir es una tabla donde se encuentran cada uno de los alumnos, y se colocan las notas. Se supone que se colocan todas las notas a la vez, asi calcula el promedio y el estado en el momento.
4) En el caso de los alumnos, hay un buscador para tener los datos de cada alumno. En su pagina, estara el nombre de la carrera, y las materias con las notas, no modificables. Las que tengan link son las que ofrecen la posibilidad de registrarse como alumno. Al final del buscador, se permite ingresar un nuevo alumno, eligiendo su carrera.
5) La unica logica realizada por MySQL son los campos de fecha de carrera que se colocan automaticamente (revisar ante cambio de motor de base de datos). Todo el resto de la logica se realiza en PHP, utilizando JavaScript solo para cuestiones visuales. 
