<?php

include("conexion.php");


$actores=$_POST['nombre_actor'];

$Foto = addslashes(file_get_contents($_FILES['Foto-actor']['tmp_name'])); 



$consulta="SELECT ActorId FROM actores WHERE Descripcion='$actores'";


$result=mysqli_query($conn,$consulta);
if(mysqli_num_rows($result)!=0)
{
    echo "<script>alert('Ya esta dentro de la base de datos');
    window.location.href = 'cargar.php'</script>";
}else{
    
    $insertar= "INSERT INTO actores(Descripcion,Foto) VALUES
    ('$actores','$Foto')" ;




    $resultado = mysqli_query($conn,$insertar);
    echo "<script>alert('Actor cargado CORRECTAMENTE !');;
    window.location.href = 'cargar.php'</script>";
    
    

    
} 





?>