<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<!-- Creamos un formulario como a los que estamos acostumbradas.
La novedad ahora es que le indicamos el método por el que tiene
que recoger los datos (POST, para que no se vea lo que mandamos)
y la página hacia donde van. 
Si queremos respetar al 100% la estructura que seguimos en la
práctica anterior, tenemos que poner los name en mayúsculas.-->

<body>
 <div class="group">
    <form method="POST" action="formulario.php">
    <h2><em>Formulario de Registro</em></h2>

 <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
 <input type="text" name="NOMBRE" class="form-input" required/><br /> 

 <label for="apellido">Apellido <span><em>(requerido)</em></span></label>            
 <input type="text" name="APELLIDO" class="form-input" required/><br />
           
 <label for="email">Email <span><em>(requerido)</em></span></label>              
 <input type="email" name="EMAIL" class="form-input" required/>
    <input class="form-btn" name="submit" type="submit" value="Suscribirse"/>  

<?php

/*Creamos conexión con los datos que requiere PHP. Creamos una variable
#con los parámetros necesarios para establecerla.*/

if ($_POST) {
    $nombre = $_POST['NOMBRE'];
    $apellido = $_POST['APELLIDO'];
    $email = $_POST['EMAIL'];

/*Agrega esta línea para comprobar fallos, como me ha pasado a mí.*/
    var_dump($nombre, $apellido, $email);

/*Conexión con PDO. Son las variables necesarias para iniciar.*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursosql";

/*Creamos conexión con los datos que requiere PHP. Creamos una variable
#con los parámetros necesarios para establecerla.*/

$conn = new mysqli($servername, $username, $password, $dbname);

/*Comprobamos conexión.*/

if ($conn->connect_error) {
    die("¡La conexión falló! :(: " . $conn->connect_error);
}

/*Aquí hacemos la query.*/

$sql = "INSERT INTO USUARIO (NOMBRE, APELLIDO, EMAIL)
VALUES ('$nombre', '$apellido', '$email')";

/*Si todo va bien, mensaje de éxito. Si no, se pide que
se repita el proceso.*/

if ($conn->query($sql) === TRUE) {
    echo "¡Registro creado con éxito! :)";
} else {
    echo "¡Error!: " . $sql . "<br>" . $conn->error;
}

/*Cerramos la conexión. Lo ideal es ponerla, aunque las versiones
recientes ya lo hace solo.*/

$conn->close();

}
?>
    </form>      

                

</div>
</body>
</html>

<script src="script.js"></script>
    
</body>
</html>