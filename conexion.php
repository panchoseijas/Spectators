<?php

// https://www.w3schools.com/php/php_ref_mysqli.asp

function conectarBD() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spectators";
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Checkear conexión
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    } 
    //echo "Conexion EXISTOSA";
    return $conn;
}

function desconectarBD($conn) 
{
    // cerrar conexión
    $conn->close();
}

$conn=conectarBD();

function buscarImagen($nombreImagen){
    $conn=conectarBD();
    $consultaImagenes = "SELECT * FROM imagenesExtra WHERE Descripcion = '$nombreImagen'";
    $resultadoImagenes = mysqli_query($conn,$consultaImagenes);

    if ($resultadoImagenes){
        while($row = $resultadoImagenes -> fetch_array()){
            $Imagen = $row['Imagen'];
        }
    }
    return $Imagen;
    desconectarBD($conn);
}

function borrarenBD($tabla,$destino,$busqueda){
    $conn= conectarBD();
    $consulta = "DELETE FROM $tabla WHERE $destino='$busqueda'";
    $resultado = mysqli_query($conn,$consulta);
    desconectarBD($conn);
    

  }

function buscarPorId($tabla,$destino,$busqueda){
    $conn= conectarBD();
    $consulta = "SELECT * FROM $tabla WHERE $destino='$busqueda'";
    $resultado = mysqli_query($conn,$consulta);
    if($resultado){
        while ($row = $resultado -> fetch_array()){
            $res = $row["Descripcion"];
        }
        return $res;
    }else{
        return 'Nada';
    }


    desconectarBD($conn);
    


}




//Usuario
function usuario_critica($IdUser){
    $conn = conectarBD();
    $consulta= "SELECT * FROM usuarios WHERE IdUser='$IdUser'";
    $resultado = mysqli_query($conn,$consulta);   
  

    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $usuario_critica = $row['Usuario'];
        }
    }
    return $usuario_critica;
    desconectarBD($conn);
}

function insertar_critica($PeliId,$IdUser,$estrellas,$critica){
    $conn= conectarBD();
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
        }
    }
    desconectarBD($conn);
}

function consulta_critica($PeliId){
    $conn = conectarBD();
    $consulta = "SELECT * FROM pelicomen WHERE PeliId='$PeliId'";
    $resultado = mysqli_query($conn,$consulta);   
    desconectarBD($conn);
    
    return $resultado;
}


function imprimir_criticas($PeliId){
    $conn = conectarBD();
    $resultado_criticas = consulta_critica($PeliId);
    if ($resultado_criticas) {
        while ($row_criticas = $resultado_criticas->fetch_array()) {
            $critica = $row_criticas['Critica'];
            $estrellas = $row_criticas['Puntuacion'];
            $usuario_critica = usuario_critica($row_criticas['IdUser']);                                 

            echo("<li class='caja-critica'>
                    <div class='perfil-estrellas'>
                    <img src='data:image/jpg;base64,".base64_encode(buscarImagen('carita'))."'><p>$usuario_critica</p>
                        <p class='estrellas'>".str_repeat("★", $estrellas)." </p>
                    </div>
                    <p>$critica</p>
                </li><br>");
            }
        }
    desconectarBD($conn);
}

function buscarEnPeli($PeliId,$busqueda){
    $conn = conectarBD();
    $consulta = "SELECT * FROM peliculas WHERE PeliId='$PeliId'";
    $resultado = mysqli_query($conn,$consulta);
    if ($resultado){
        while( $row = $resultado -> fetch_array()){
        $res = $row[$busqueda];
        }
        return $res;
    }
    desconectarBD($conn);
    
    
}
      
function consulta_criticas_usuario(){
    $conn = conectarBD();
    $IdUsuario = $_SESSION['IdUser'];
    $consulta = "SELECT * FROM pelicomen WHERE IdUser='$IdUsuario'";
    $resultado = mysqli_query($conn,$consulta);   
    desconectarBD($conn);
    
    return $resultado;
}


function insertarEnTabla($tabla,$Id1,$Id2){
    $conn= conectarBD();
    $insertar="INSERT INTO peliactor VALUES ($Id2,$Id1)";
    $resultado = mysqli_query($conn,$insertar);
    desconectarBD($conn);
}


?>




