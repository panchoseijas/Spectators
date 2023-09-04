<?php

include 'conexion.php';

$Titulo = $_POST['titulo_noticia'];
$Fecha = $_POST['fecha_noticia'];
$IdAutor = $_POST['usuario'];

$Imagen = addslashes(file_get_contents($_FILES['imagen-noticia']['tmp_name']));
$Video = $_POST['video_noticia'];
$texto = $_POST['texto_noticia'];



$insertar = "INSERT INTO noticias(Titulo,IdUser,Fecha,Imagen,Texto,Video) 
VALUES ('$Titulo','$IdAutor','$Fecha','$Imagen','$texto','$Video')";

$resultado = mysqli_query($conn, $insertar);

echo "<script>alert('Noticia cargada CORRECTAMENTE !');;
    window.location.href = 'cargar.php'</script>";





?>