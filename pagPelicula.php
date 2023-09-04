
<?php
include 'conexion.php';

session_start();

$PeliId = $_POST['PeliId'];

$conn=conectarBD();
$consulta = "SELECT * FROM peliculas WHERE PeliId='$PeliId'";
$resultado = mysqli_query($conn,$consulta);
if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $Nombre = $row['Nombre'];
        $idioma = buscarPorId('idiomas','IdioId',$row['IdioId']);
        $trailer=$row['trailer'];
        $poster=$row['poster'];
        $Director=buscarPorId('directores','DirecId',$row['Director']);
        $Productor=buscarPorId('productores','ProduId',$row['Productor']);
        $Descripcion=$row['Descripcion'];
        $estrellas=$row['estrellas'];
        $año=$row['año'];
        $duracion=$row['duracion'];
        $clasificacion =buscarPorId('clasificacion','ClasiId',$row['ClasiId']);
        $Genero = buscarPorId('generos','IdGenero',$row['IdGenero']);
    }
}

function imprimirActor($PeliId,$orden){
    $conn = conectarBD();
    $consulta = "SELECT * FROM peliactor WHERE PeliId='$PeliId' ORDER BY ActorId $orden Limit 2";
    $resultado = mysqli_query($conn,$consulta); 
    if ($resultado){
        while($row = $resultado -> fetch_Array()){
            $ActorId = $row['ActorId'];
            $consultaActor = "SELECT * FROM actores WHERE ActorId='$ActorId'";
            $res = mysqli_query($conn,$consultaActor);
            if($res){
                while($row_actor = $res -> fetch_Array()){
                echo("<li><img src='data:image/jpg;base64,".base64_encode($row_actor['Foto'])."'><p class='nomAct'>".$row_actor['Descripcion']."</p></li>");
                }
            };
        }
    }
    
    desconectarBD($conn);
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Spectators</title>
    <link rel="shortcut icon" href='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>' >
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylePelicula.css">
    <link rel="stylesheet" href="css/styleFooter.css">
     <script src="js/validar.js"></script>

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

   
    
    <div class='main-wrapper'>
        <div class='wrapper'>
            <div class='trailer'>
                <?php echo $trailer;?>  
            </div>
            <div class='poster_Puntaje'>
                <div class='poster'>
                    <img src='data:image/jpg;base64,<?php echo base64_encode($poster)?>'alt='poster'>
                </div>
                <div class='puntaje'>
                    <h2><?php echo $Nombre;?></h2>
                    <p class='genero'><?php echo ($año.', '.$Genero.', '. $duracion.', '. $clasificacion);?></p>
                    <p class="estrellas"><?php echo(str_repeat('★',$estrellas));?></p>
                </div>
            </div>
        </div>
        <div class='content'>
            <div class='movie-info'>
                <h3>INFORMACION</h3>
                <p><?php echo $Descripcion;?></p>
                <div class='datos'>
                    <div class='izq'>
                        <p>Clasificación:</p>
                        <p>Género:</p>
                        <p>Idioma original:</p>
                        <p>Director:</p>
                        <p>Productor:</p>
                        
                    </div>
                    <div class='der'>
                        <p><?php echo $clasificacion;?></p>
                        <p><?php echo $Genero;?></p>
                        <p><?php echo $idioma;?></p>
                        <p><?php echo $Director;?></p>
                        <p><?php echo $Productor;?></p>
                        
                    </div>  
                </div>
            </div>
            <div class='reparto'>
                <h3>Reparto</h3>
                
                <div class='wrapper-reparto'>
                <ul class='actores-izq'>
                        <?php
                        imprimirActor($PeliId,'ASC');

                        ?>
                    </ul>
                    <ul class='actores-der'>
                        <?php
                        imprimirActor($PeliId,'DESC');
                        ?>
                    </ul>             
                </div>
            </div>
            <div class='escribir-resena'>
                <h3>Escribir reseña</h3>
                <form onsubmit="return esValida()" action="" class='caja-resena'  method="post" id='escribir-resena'>
                    <div class='perfil-estrellas'>
                    <img src='data:image/jpg;base64,<?php echo base64_encode(buscarImagen('carita'))?>'><p><?php echo $_SESSION['Usuario']?></p>
                        <p class="calificacion">
                            <input id="radio1" type="radio" name="estrellas" value="5"><label for="radio1">★</label>
                            <input id="radio2" type="radio" name="estrellas" value="4"><label for="radio2">★</label>
                            <input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">★</label>
                            <input id="radio4" type="radio" name="estrellas" value="2"><label for="radio4">★</label>
                            <input id="radio5" type="radio" name="estrellas" value="1"><label for="radio5">★</label>
                        </p>
                    </div>
                    <div class='caja-texto'>
                        <textarea  id='critica' name="critica" rows="9" cols="75" placeholder="Escribe aquí tu reseña" ></textarea>
                    </div>
                    <input type='submit' value="Enviar" name="enviar-critica" class='boton' onclick = 'return esValida()'></input>
                    <input type="hidden" name="PeliId" value="<?php echo $PeliId; ?>">
                </form>

            </div>
            <?php
                if (isset($_POST['enviar-critica'])){
                    insertar_critica($_POST['PeliId'],$_SESSION['IdUser'],$_POST['estrellas'],$_POST['critica']);
                }
            ?>
            <div class='criticas'>
                <h3>Criticas</h3>
                <ul>
                <?php
                imprimir_criticas($PeliId);                                               
                ?>   
                </ul>               
            </div>
        </div>
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

