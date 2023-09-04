<?php
include 'conexion.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Spectators</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styleResponsive.css">
  <link rel="stylesheet" href="css/styleFiltroActores.css">
  <link rel="shortcut icon" href='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>' >
  <script type="text/javascript" src="js/ValidacionCargar.js"></script>
  <script type="text/javascript" src="js/ValidacionCargarNoticia.js"></script>
  <script type="text/javascript" src="js/FiltrarActoresBusqueda.js"></script>

  
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
        echo('<li class="list-items"><a href="cargar.php"> Cargar </a></li>');
      }
      
    ?>
    </ul>

  </header>


  <div class="main-wrapper">
    <div class="wrapper">
    <div class="carrusel">

      <?php

        $consulta = "SELECT * FROM peliculas ORDER BY RAND() LIMIT 3;";
        $resultado = mysqli_query($conn,$consulta);
        if ($resultado){
          while ($row = $resultado->fetch_array()) {
            $PeliId = $row['PeliId'];
            $cartelera=$row['cartelera'];
            $nombre = $row['Nombre'];
            $estrellas = $row['estrellas'];
            $titulo = $row['Nombre'];

      ?>
      <form  action="pagPelicula.php" class='caja-resena'  method="post">
        <div class="mySlides fade">
        <input type='image' class='carrusel__imagen' src='data:image/jpg;base64,<?php echo base64_encode($cartelera)?>' alt="<?php echo $titulo ?>">
          <div class="text"><?php echo ($nombre.'<br>'. '★' . $estrellas); ?> </div>
        </div>
        <input type="hidden" name="PeliId" value="<?php echo $PeliId ?>">
      </form> 
      <?php
          }
        }
      ?>
        <a class="prev-carrusel" onclick="plusSlides(-1)">❮</a>
        <a class="next-carrusel" onclick="plusSlides(1)">❯</a>

    </div>

    <div class="right-column">
      <?php
        $consulta = "SELECT * FROM noticias ORDER BY NotiId DESC LIMIT 4";
        $resultado = mysqli_query($conn,$consulta);
        
        if ($resultado){
          while ($row = $resultado->fetch_array()) {
            $NotiId = $row['NotiId'];
            $titulo=$row['Titulo'];
            $imagen_noticia = $row['Imagen'];   
      ?>
      <form  action="noticia.php" class='caja-resena'  method="post">
        <div class="not">
          <div class="links">
            <button name="action" value="blue"><?php echo $titulo ?></button>
          </div>
          <div class="imgnot">
            <img src='data:image/jpg;base64,<?php echo base64_encode($imagen_noticia)?>'>
          </div>
        <input type="hidden" name="NotiId" value="<?php echo $NotiId ?>">
        </div>
      </form>
      <?php
            }
          }
      ?>
      </div>
    </div>


    <div id="wrapper-pelis">
      <div id="carousel-pelis">
        <div id="content-pelis">
        <?php
          $consulta = "SELECT * FROM peliculas ORDER BY PeliId DESC";
          $resultado = mysqli_query($conn,$consulta);   
          if ($resultado) {
            while ($row = $resultado->fetch_array()) {
              $PeliId = $row['PeliId'];
              $titulo = $row['Nombre'];
              $poster=$row['poster'];
              $estrellas = $row['estrellas'];
        ?>
          <form  action="pagPelicula.php" class='caja-resena'  method="post">
            <li class='gallery'>
              <input type='image' class='imgsCartelera' src='data:image/jpg;base64,<?php echo base64_encode($poster)?>' alt="<?php echo $titulo ?>">    
            </input>
              <div class='overlay'>
                <div class='desc'><br><?php echo ('★ '.$estrellas) ?></div>
              </div>
            <input type="hidden" name="PeliId" value="<?php echo $PeliId ?>">
            </li>  
          </form> 
          <?php                
            } 
          }
          ?>
        </div>
      </div>
      <button id="prev-pelis" class="displayNone">❮</button>
      <button id="next-pelis" class="displayFlex">❯</button>
    </div>   

    <footer class="footer">
      <div class="foot">
        <img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('logoInstagram'))?>'>
        <p>Spectators</p>
      </div>
      <div class="foot">
      <img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('logoFacebook'))?>'>
        <p>Spectators Community</p>
      </div>
      <div class="foot">
      <img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('logoTwitter'))?>'>
        <p>TheSpectators</p>
      </div>
      <div class="foot">
      <img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('logoYT'))?>'>
        <p>SpectatorsTV</p>
      </div>
    </footer>

    <script src="js/inicial.js"></script>
</body>