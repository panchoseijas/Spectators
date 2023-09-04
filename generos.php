<?php
include 'conexion.php';

session_start();

function generoPorId($IdGenero){
    $conn = conectarBD();
    $consultaGenero = "SELECT * FROM generos where IdGenero = '$IdGenero' ";
    $resultadoGenero =  mysqli_query($conn,$consultaGenero);
    if ($resultadoGenero){
        while ($rowGenero = $resultadoGenero -> fetch_array()){
            $Genero = $rowGenero['Descripcion'];
        }
}
    return $Genero;
    desconectarBD($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Spectators</title>
    <link rel="shortcut icon" href='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>' >
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styleFooter.css">
    <link rel="stylesheet" href="styleResponsive.css">
    <script type="text/javascript" src='js\generosFiltrar.js'></script>


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
    <div class="wrapper-generos">
            
            <div id="myBtnContainer">
                <h2>► Generos</h2>
                <button class="btn active" onclick="filterSelection('all')"> Todos</button>
                <?php
                $consultaG = "SELECT * from generos";
                $resultadoG =  mysqli_query($conn,$consultaG);

                if ($resultadoG){
                    while ($rowG = $resultadoG -> fetch_array()){
                        $genero = $rowG['Descripcion'];
                
                ?> 
                <button class="btn" onclick="filterSelection('<?php echo $genero?>')"><?php echo $genero?> </button>

                <?php
                    }
                }
                ?>
            </div>

        <div class="conteiner" id="cartelera">
          <?php
            $consulta = "SELECT * FROM peliculas ORDER BY PeliId DESC";
            $resultado = mysqli_query($conn,$consulta);   
            if ($resultado) {
                while ($row = $resultado->fetch_array()) {
                  $PeliId = $row['PeliId'];
                  $titulo = $row['Nombre'];
                  $poster=$row['poster'];
                  $estrellas = $row['estrellas'];
                  $genero =buscarPorId('generos','IdGenero',$row['IdGenero']) ;
          ?>
          <div class="filterDiv <?php echo ($genero)?>  show" id="gallery">
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
          </div>
            <?php                
                } 
            }
            ?>
                
                
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