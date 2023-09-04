<?php
include "conexion.php";
session_start();


  if (isset($_POST['eliminar-critica'])){
    borrarenBD('pelicomen','IdCritica',$_POST['eliminar-critica-id']);
    header("Location:CriticasUsuario.php");
}
  

?>

<script> 
function buscarenBD(tabla,destino,idTexto){
    var texto= document.getElementById(idTexto).value;
    const xhttp= new XMLHttpRequest();
    
    xhttp.onreadystatechange= function(){
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado-"+tabla).innerHTML = this.responseText;
          }
    }
    xhttp.open("GET","buscar.php?texto="+texto+"&&tabla="+tabla+"&&destino="+destino);
    xhttp.send();

}
</script>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Spectators</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/cargar.css">
  <link rel="shortcut icon" href='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>' >
  <script type="text/javascript" src="js/ValidacionCargar.js"></script>
  <script type="text/javascript" src="js/ValidacionCargarNoticia.js"></script>
  <script type="text/javascript" src="js/FiltrarActoresBusqueda.js"></script>
  <script src="js/inicial.js"></script>

  
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
        echo('<li class="list-items"><a href="cargar.php"> Cargar </a></li>');
      }
      
    ?>
    </ul>

</header>

<div class="main-wrapper">
  <h3>Peliculas</h3>
    <label for="">Nombre:</label>
      <input oninput="buscarenBD('peliculas','Nombre','busqueda-peliculas')"type=search id="busqueda-peliculas" autocomplete="off"><br><br>

    <?php
      if (isset($_POST['eliminar-peliculas'])){
        borrarenBD('peliactor','PeliId',$_POST['eliminar-id']);
        borrarenBD('pelicomen','PeliId',$_POST['eliminar-id']);
        borrarenBD('peliculas','PeliId',$_POST['eliminar-id']);
      }   
    ?>
    <div id='resultado-peliculas'></div>


  <h3>Noticias</h3>
    <label for="">Titulo:</label>
      <input oninput="buscarenBD('noticias','Titulo','busqueda-noticias')" type=search id="busqueda-noticias" autocomplete="off"><br><br>

    <?php
      if (isset($_POST['eliminar-noticias'])){
        borrarenBD('noticias','NotiId',$_POST['eliminar-id']);
      }   
    ?>

    <div id='resultado-noticias'></div>

    <h3>Actores</h3>
    <label for="">Nombre actor:</label>
      <input oninput="buscarenBD('actores','Descripcion','busqueda-actores')" type=search id="busqueda-actores" autocomplete="off"><br><br>

    <?php
      if (isset($_POST['eliminar-actores'])){
        borrarenBD('actores','ActorId',$_POST['eliminar-id']);
      }   
    ?>

    <div id='resultado-actores'></div>

    <h3>Productores</h3>
    <label for="">Nombre productor:</label>
      <input oninput="buscarenBD('productores','Descripcion','busqueda-productores')" type=search id="busqueda-productores" autocomplete="off"><br><br>

    <?php
      if (isset($_POST['eliminar-productores'])){
        borrarenBD('productores','ProduId',$_POST['eliminar-id']);
      }   
    ?>

    <div id='resultado-productores'></div>

    <h3>Directores</h3>
    <label for="">Nombre director:</label>
      <input oninput="buscarenBD('directores','Descripcion','busqueda-directores')" type=search id="busqueda-directores" autocomplete="off"><br><br>

    <?php
      if (isset($_POST['eliminar-directores'])){
        borrarenBD('directores','DirecId',$_POST['eliminar-id']);
      }   
    ?>

    <div id='resultado-directores'></div>

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
</html>