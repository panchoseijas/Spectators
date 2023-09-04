<?php 
include("conexion.php");
$conn=conectarBD();




$productor=$_POST['productor'];




$consulta="SELECT `ProduId` FROM `productores` WHERE `Descripcion`='$productor'";
$result=mysqli_query($conn,$consulta);



if(mysqli_num_rows($result)!=0){   
    echo "<script>alert('Ya esta dentro de la base de datos');
    window.location.href = 'cargar.php'</script>";
    
    
}else{
    $insertar= "INSERT INTO productores(Descripcion ) VALUES
    ('$productor')" ;

    $resultado = mysqli_query($conn,$insertar);
       
    echo "<script>alert('Productor cargado CORRECTAMENTE')
    window.location.href = 'cargar.php'</script>";

} 



?>