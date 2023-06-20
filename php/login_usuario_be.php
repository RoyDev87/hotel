<?php

    session_start();

    include 'conexion_be.php';

    $correo = $_POST ['correo'];
    $contrasena = $_POST ['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;



        //$datos_usuario = mysqli_fetch_assoc($validar_login);
        //$consulta_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");

        //$datos_usuario = mysqli_query($validar_login);
        $datos_usuario = mysqli_fetch_assoc($validar_login);

        $nombres = $datos_usuario['nombres'] . " " . $datos_usuario['ap_paterno'] . " " . $datos_usuario['ap_materno'];
    
        $id_user = $datos_usuario['id'];

        $_SESSION['nombres'] = $nombres;
        $_SESSION['id_user'] = $id_user;
        
        //var_dump($correo);
        //echo "Bienvenido, " . $_SESSION['usuario'];
        //echo '<p>Bienvenido, ' . $_SESSION['usuario']. '</p>';
        //sleep(5);

        header("location: ../index.php");
        exit();
    }else{
        echo '
            <script>
                alert("Usuario no existe, por favor verifique los datos ingresados");
                window.location = "../login.php"
            </script>';
        exit();
    }

?>