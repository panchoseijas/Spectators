<?php

include("conexion.php");

$mail=$_POST['mail'];

$password=$_POST['password'];

$consulta="SELECT * FROM `usuarios` WHERE Contraseña= BINARY  '$password' AND Mail=BINARY '$mail'";

$result=mysqli_query($conn,$consulta);


if((mysqli_num_rows($result)!=0)&&($mail!=null ||$password!=null))
{
    $consultaUsuario = "SELECT * FROM usuarios Where mail='$mail'";
    $respuesta = mysqli_query($conn,$consultaUsuario);
    if ($respuesta){
        while ($row = $respuesta -> fetch_array()){
            $usuario = $row['Usuario'];
            $tipoUsuario = $row['tipo'];
            $idUsuario = $row['IdUser'];
        }
    }
    session_start();
    $_SESSION['Usuario'] = $usuario;
    $_SESSION['tipoUsuario'] = $tipoUsuario;
    $_SESSION['IdUser'] = $idUsuario;
    header("Location:index.php");
     
    
}else{
    
    
    echo "<script>alert('Revisar campos completados')
        window.location.href = 'registrarse.php';</script>";
    

}

$conn->close();


?>