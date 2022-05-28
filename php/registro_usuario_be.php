<?php

/* Acceso*/
include 'conexion_be.php';


/* Variables name*/

$nombre_completo = $_POST ['nombre_completo'];
$correo = $_POST ['correo'];
$usuario = $_POST ['usuario'];
$contrasena = $_POST ['contrasena'];

$query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) 
          VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

/*verificando que el correo no se repita en la base de datos*/

$verificar_correo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo ='$correo'");

if(mysqli_num_rows($verificar_correo)>0){
    echo '
    <script>
        alert("Este correo ya se encuentra registrado, intentalo otra ves");
        window.location = "../miportal.php";
    </script>
    ';

exit();
}


/*Ejecutando query */

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
        <script>
        alert ("Usuario almacenado exitosamente");
        window.location = "../miportal.php";
        </script>
    ';

} 

else{
    echo '
    <script>
    alert("intentalo de nuevo, no pudimos almacenar tus datos"); 
    window.location = "../miportal.php"; 
    </script>
    ';
}

mysqli_close($conexion); 

?>