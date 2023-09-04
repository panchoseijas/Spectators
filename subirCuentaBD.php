<?php 

include("conexion.php");

$director=$_POST['director'];


$consulta="SELECT `DirecId` FROM `directores` WHERE `Descripcion`='$director'";
$result=mysqli_query($conn,$consulta);
if(mysqli_num_rows($result)!=0)
{
    echo "<script>alert('Ya esta dentro de la Base de Datos')
    window.location.href = 'http://localhost/Programaci%c3%b3n_Web/Web/Cargar.php';</script>";
}else{
    if (($director!= null) or ($director!="")) {
        $insertar= "INSERT INTO directores(Descripcion ) VALUES
        ('$director')" ;
    
    
    
    
        $resultado = mysqli_query($conn,$insertar);
        echo "<script>alert('Director cargado')
        window.location.href = 'http://localhost/Programaci%c3%b3n_Web/Web/Cargar.php';</script>";
        
    
    
    }else{
        echo "<script>alert('Debe completar el campo Director')
        window.location.href = 'http://localhost/Programaci%c3%b3n_Web/Web/Cargar.php';</script>";

    }
    
} 
