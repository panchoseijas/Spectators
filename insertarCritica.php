<?php

include("conexion.php");
session_start();

if (isset($_POST['enviar-critica'])){

    $IdUser = $_SESSION['IdUser'];
    $PeliId = $_POST['PeliId'];
    $estrellas=$_POST['estrellas'];
    $critica=$_POST['critica'];


    $consulta="SELECT * FROM pelicomen WHERE PeliId='$PeliId' AND IdUser='$IdUser'";


    $result=mysqli_query($conn,$consulta);
    if(mysqli_num_rows($result)!=0)
    {
        echo "<script>alert('Usted ya ha realizado una critica a este pelicula')</script>";
    }else{
        $insertar= "INSERT INTO pelicomen(PeliId,IdUser,Critica,Puntuacion) VALUES
        ('$PeliId','$IdUser','$critica','$estrellas')" ;

        $resultado = mysqli_query($conn,$insertar);
        
        if ($resultado){
            echo "<script>alert('Reseña enviada correctamente')</script>";
            header("Refresh:0");
        }
    } }




?>