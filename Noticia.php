<?php

include 'conexion.php';
session_start();


$NotiId = $_POST['NotiId'];

$consulta = "SELECT * FROM noticias where NotiId = '$NotiId'";
$resultado = mysqli_query($conn,$consulta);

if ($resultado){
  while($row = $resultado -> fetch_array()){
    $titulo = $row['Titulo'];
    $imagen = $row['Imagen'];
    $fecha = $row['Fecha'];
    $texto = $row['Texto'];
    $video = $row['Video'];
    $IdAutor = $row['IdUser'];
  }
}


$consulta_autor = "SELECT Usuario FROM usuarios where IdUser = '$IdAutor' ";
$result =  mysqli_query($conn,$consulta_autor);

if ($result){
  while($row = $result -> fetch_array()){
    $autor = $row['Usuario'];
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Spectators</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styleNoticias.css">
    <link rel="shortcut icon" href="carita1.png" />
    <script type="text/javascript" src='js/inicial.js'></script>
</head>

<body>
<header class="topnav">
    <div class="logo">
      <a href="index.php" onclick="myFunction()"><img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('logoSpectators'))?>' alt="logo"></a>
    </div>
    <div class="logo-menu" onclick="toggleMenu()"><img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('menu'))?>'></div>
    <ul class="nav-items main-nav mobile-hide" id='Menu'>
    <?php
      if ($_SESSION['Usuario']!=''  ){
        echo("<li class='list-items'><a href='cerrarSesion.php'>Cerrar Sesion</a></li>");
        echo("<li class='list-items'><a href='CriticasUsuario.php'>Mis Criticas</a></li>");
        
      }else{
        echo('<li class="list-items"><a href="registrarse.php">Inciar sesión</a></li>');
      }
    ?>  
      <li class="list-items"><a href="generos.php"> 🔍︎ Generos</a></li>
    <?php
      if($_SESSION['tipoUsuario']=='admin'){
        echo('<li class="list-items"><a href="borrar.php"> Borrar </a></li>');
      }
      
    ?>
    </ul>

  </header>
    <div class="main-wrapper">
        <div class="wrapper">
            <div class="contenido">
              <?php
                echo "<h1>$titulo</h1>"
              ?>
                <div class="autorFecha">
                  <?php
                    echo "<img src='data:image/jpg;base64,".base64_encode(buscarImagen('carita'))."'><p class='autor'>Por <span>$autor</span></p><p class='fecha'>$fecha</p>"
                  ?>              
                </div>
                <div class="img-noticia">
                    <img src='data:image/jpg;base64,<?php echo base64_encode($imagen)?>'>
                </div>
                <div class="texto">
                  <?php
                    echo "<p>$texto</p>";   
                  
                    echo $video;
                  ?> 
                </div>
            </div> 
        </div>
    </div>
</body>