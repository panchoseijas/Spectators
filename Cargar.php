<?php
include 'conexion.php';
session_start();

$usuario = $_SESSION['Usuario'];
$IdUser = $_SESSION['IdUser'];

function imprimirOpciones($tabla){
  $conn= conectarBD();
  $consulta = "SELECT * FROM $tabla ORDER BY Descripcion ASC";
  
  $resultado = mysqli_query($conn,$consulta);
  echo("<option value=#>Seleccionar...</option>");
  while ($row = $resultado -> fetch_array()){
    $id = $row[0];  
    $opcion = $row["Descripcion"];
    echo("<option value=$id>$opcion</option>");
  }
  
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cargar.css" >
    <link rel="shortcut icon" href='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>' >
    <script type="text/javascript" src="ValidacionCargar.js"></script>
    <title>Cargar</title>
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
  <h3> Registrar Directores</h3>
      
    <form action="insertarDirec.php" method="post" class="conteiner-formulario">
        <div class='izq'>    
          <label for="" >Director:</label>
          <input name="director" id = "director" type="text" class="conteiner-input">
        </div>
          <input class="conteiner-enviar" onclick="return validarDirector()" type="submit" value="Registrar" >
    </form>
    
    
  <h3> Registrar Productores</h3>
      
    <form action="insertarProduc.php" method="post" class="conteiner-formulario">
      <div class='izq'>
        <label for="" >Productor:</label>
        <input name="productor" id="productor" type="text" class="conteiner-input" >
      </div>
        <input class="conteiner-enviar"type="submit" onclick="return validarProductor()" value="Registrar">
    </form>
      

  <h3> Registrar Actores</h3>
      
      <form action="insertarActor.php" method="POST" class="conteiner-formulario" enctype='multipart/form-data'>
        <div class='izq'>
          <label for="" >Actor:</label>
          <input name="nombre_actor" type="text" id="nombreActor"class="conteiner-input">
        </div>
        <div class='der'> 
          <label for="" >Imagen Actor:</label>
          <input name="Foto-actor" id="fotoActor"type="file" >
        </div>  
        <input class="conteiner-enviar"type="submit" onclick="return validarActor()" value="Registrar">
      </form>
     
      

  <h3> Registrar Pelicula</h3>
      
    <form action="insertarPelicula.php" method="POST" class="conteiner-formulario" enctype='multipart/form-data'>
      <div class=izq>    
        <label for="" >Nombre:</label>
        <input name="nombre" id="nombre" type="text" class="conteiner-input">

        <label for="" >Año:</label>
        <input name="año" id="año" type="number" class="conteiner-input">

        <label for="" >Duracion:</label>
        <input name="duracion" id="duracion" type="text" class="conteiner-input">


        <label for="" >Trailer:</label>
        <input name="triler" id="trailer" type="text" class="conteiner-input">

        <label for="" >Director:</label>
        <select name="director" id="director-peli" class="conteiner-input">
          <?php imprimirOpciones('directores') ?>
        </select>

        <label for="" >Productor:</label>
        <select name="productor" id="productor-peli" class="conteiner-input">
          <?php imprimirOpciones('productores') ?>
        </select>

        <label for="" >Descripcion:</label>
        <input name="descripcion" id="descripcion" type="text" class="conteiner-input">
        
        <label for="" >Poster:</label>
        <input name="Poster" id="Poster" type="file" class="conteiner-input">
        
        <label for="" >Cartelera:</label>
        <input name="cartelera" id="cartelera" type="file" class="conteiner-input">
      </div>
      <div class='der'>
        <label for="" >Idioma:</label>  
        <select name="idioma" id="idioma" class="conteiner-input">
          <?php imprimirOpciones('idiomas') ?>
        </select>
        <label for="" >Genero:</label>
        <select name="genero" id="genero" class="conteiner-input">
          <?php imprimirOpciones('generos') ?>
        </select>
        
        <label for="" >Clasificacion:</label>
        <select name="clasificacion" id="clasificacion" class="conteiner-input">
          <?php imprimirOpciones('clasificacion') ?>
        </select>
        

        <label for="" >Estrellas:</label>
        <select name="estrellas" id="estrellas" class="conteiner-input">
          <option value=#>Seleccionar...</option>
          <option value="1">★</option>
          <option value="2">★★</option>
          <option value="3">★★★</option>
          <option value="4">★★★★</option>
          <option value="5">★★★★★</option>
        </select>
        
        
        <label for="" >Actor 1:</label>
        <select name="actor1" id="actor1" class="conteiner-input">
          <?php imprimirOpciones('actores') ?>
        </select>

        <label for="" >Actor 2:</label>
        <select name="actor2" id="actor2" class="conteiner-input">
          <?php imprimirOpciones('actores') ?>
        </select>

        <label for="" >Actor 3:</label>
        <select name="actor3" id="actor3" class="conteiner-input">
          <?php imprimirOpciones('actores') ?>
        </select>

        <label for="" >Actor 4:</label>
        <select name="actor4" id="actor4" class="conteiner-input">
          <?php imprimirOpciones('actores') ?>
        </select>
      </div>
        
      <input class="conteiner-enviar"type="submit" value="Registrar" onclick = 'return validarPelicula()'>
        
      
    </form>

  <h3> Registrar Noticias</h3>
      
    <form action="insertarNoticia.php" method="POST" class="conteiner-formulario" enctype='multipart/form-data'>
        <div class='izq'>
          <label for="" >Titulo:</label>
          <input name="titulo_noticia" id="titulo" type="text" class="conteiner-input">
          <label for="" >Fecha</label>
          <input name="fecha_noticia" id="fecha" type="date" class="conteiner-input">
          <label for="" >Imagen:</label>
          <input name="imagen-noticia" id="imagen" type="file" >
          <label for="" >Video</label>
          <input name="video_noticia" type="text" id="video" class="conteiner-input">
        </div>
        <div class='der'> 
          
          
          <label for="" >Texto</label>
          <textarea name="texto_noticia" id="texto"></textarea>
          <input type='hidden' name='usuario'  value="<?php echo $IdUser ?>">
        </div>  
        <input class="conteiner-enviar"type="submit" onclick="return validarNoticia()" value="Registrar">
    </form>
      
    
    
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
  </div>
</body>
</html>