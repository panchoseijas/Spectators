<?php 

include("conexion.php");

$director=$_POST['director'];



$consulta="SELECT `DirecId` FROM `directores` WHERE `Descripcion`='$director'";
$result=mysqli_query($conn,$consulta);
if(mysqli_num_rows($result)!=0)
{
    echo "<script>alert('Ya esta dentro de la base de datos');
    window.location.href = 'cargar.php'</script>";
}else{
    
    $insertar= "INSERT INTO directores(Descripcion ) VALUES
    ('$director')" ;

    $resultado = mysqli_query($conn,$insertar);
    echo "<script>alert('Director cargado')
    window.location.href = 'cargar.php'</script>";

} 
