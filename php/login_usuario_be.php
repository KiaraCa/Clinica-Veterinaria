<?php  

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; 

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");

        if(mysqli_num_rows($validar_login) > 0){
            header("location: miregistro.php");
            exit;
        }else{
            echo '
                <script>
                alert("Usuario no existe, porfavor verifique sus datos");
                window.location = "../miportal.php";
                </script>
                ';
            exit;
        }

?>