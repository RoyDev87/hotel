<?php

    include 'conexion_be.php';

    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    $personas = $_POST['personas'];


    $query = "INSERT INTO reservas(user_id,desde, hasta, personas)
                 VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

//VERIFICAR QUE EL CORREO NO SE REPITA EN LA BASE DE DATOS
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("Éste correo ya se encuentra registrado, por favor intenta con uno diferente");
                window.location = "../login.php"
            </script>';
        exit();
    }

//VERIFICAR QUE EL NOMBRE DE USUARIO NO SE REPITA EN LA BASE DE DATOS
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
            <script>
                alert("Éste usuario ya se encuentra registrado, por favor intenta con uno diferente");
                window.location = "../login.php"
            </script>';
        exit();
    }


    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario registrado con éxito");
                window.location = "../login.php"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Hubo un error al registrarse, intentelo de nuevo");
                window.location = "../login.php"
            </script>
        ';
    }

    mysqli_close($conexion);

?>