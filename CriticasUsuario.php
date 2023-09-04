<?php
include 'conexion.php';

session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Spectators</title>
    <link rel="shortcut icon" href='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>' >
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styleFooter.css">
    <link rel="stylesheet" href="css/stylePelicula.css">
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

<div class='main-wrapper'>   
    <div class='content'>      
        <div class='criticas'>
        <?php
          $resultado_criticas = consulta_criticas_usuario();
          if (mysqli_num_rows($resultado_criticas)!=0) {
              while ($row_criticas = $resultado_criticas->fetch_array()) {
                $IdCritica = $row_criticas['IdCritica'];
                $critica = $row_criticas['Critica'];
                $estrellas = $row_criticas['Puntuacion'];
                $Idpeli = $row_criticas['PeliId'];
                $titulo = buscarEnPeli($Idpeli,'Nombre');
                $poster = buscarEnPeli($Idpeli,'poster'); 
        ?>
        <ul>
        <div class='poster-critica'>
          <div class = 'Poster'>
            <img src='data:image/jpg;base64,<?php echo base64_encode($poster)?>' alt=poster>
          </div>
          <li class='caja-critica'>
              <div class='titulo-estrellas'>
                <h5><?php echo $titulo; ?></h5>
                <p class="estrellas"><?php echo str_repeat("★", $estrellas) ?></p>
              </div>
              <p><?php echo $critica; ?></p>
              <form onsubmit="return borrarConfirmacion()"  method="post" action="borrar.php">
                <input type="submit" class="boton" name="eliminar-critica" value="Borrar critica" >
                <input type="hidden" name="eliminar-critica-id" value="<?php echo $IdCritica; ?>">
              </form>
          </li>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <?php
          }}else{
            echo("<h2>No has realizado ninguna critica</h2>");
          }
        ?>
        </ul>               
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
</div>


    
<script src="js/inicial.js"></script>
</body>

</html>


