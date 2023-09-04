<?php

include("conexion.php");


$Usuario=$_POST['Usuario'];
$Mail=$_POST['Mail'];
$Contraseña=$_POST['Contraseña'];
$Contraseña2=$_POST['Contraseña2'];





$consulta="SELECT * FROM `usuarios` WHERE `Usuario`='$Usuario' OR `Mail`= '$Mail'";


$result=mysqli_query($conn,$consulta);


if((mysqli_num_rows($result)!=0)&&($Usuario!=null)&&($Mail!=null))
{
    echo "<script>alert('El nombre de usuario o el mail ya estan en uso') 
    window.location.href = 'crearCuenta.php';</script>";
    

}else {
    
    if (($Contraseña==$Contraseña2) &&($Contraseña!=null)&&(filter_var($Mail, FILTER_VALIDATE_EMAIL))&&((strlen($Usuario)>=4) && (strlen($Usuario)<=10))){
        $insertar= "INSERT INTO usuarios(Usuario,Mail,Contraseña,tipo) VALUES
        ('$Usuario','$Mail','$Contraseña','user')" ;
    
    
    
    
        $resultado = mysqli_query($conn,$insertar);
        
        
        echo "<script>alert('Cuenta creada') 
        window.location.href = 'registrarse.php';</script>";

        
    }else{
        echo "<script>alert('Revisar campos mal cargados') 
        window.location.href = 'crearCuenta.php';</script>";

    }

}



?>