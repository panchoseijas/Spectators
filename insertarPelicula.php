<?php 
include("conexion.php");
$conn=conectarBD();

$nombre=$_POST['nombre'];
$triler=$_POST['triler'];
$poster=addslashes(file_get_contents($_FILES['Poster']['tmp_name']));
$idioma=$_POST['idioma'];
$genero=$_POST['genero'];
$descripcion=$_POST['descripcion'];
$clasificacion=$_POST['clasificacion'];
$estrellas=$_POST['estrellas'];
$actor1=$_POST['actor1'];
$actor2=$_POST['actor2'];
$actor3=$_POST['actor3'];
$actor4=$_POST['actor4'];
$director=$_POST['director'];
$productor=$_POST['productor'];
$año=$_POST['año'];
$Cartelera=addslashes(file_get_contents($_FILES['cartelera']['tmp_name']));

$duracion=$_POST['duracion'];


$insertar= "INSERT INTO peliculas(Nombre,Descripcion,IdioId,ClasiId,trailer,estrellas,poster,Director,Productor,duracion,año,IdGenero,cartelera) VALUES
('$nombre','$descripcion','$idioma','$clasificacion','$triler','$estrellas','$poster','$director','$productor','$duracion','$año','$genero','$Cartelera')" ;

$resultado = mysqli_query($conn,$insertar);
echo "<script>alert('Pelicula Cargada CORRECTAMENTE !')</script>";



$consulta_Id = "SELECT * FROM peliculas WHERE Nombre = '$nombre' ";
$resultado_Id = mysqli_query($conn,$consulta_Id);

if ($resultado_Id){
    while ($row = $resultado_Id -> fetch_array()){
        $PeliId = $row['PeliId'];
    }
}

insertarEnTabla('peliactor',$actor1,$PeliId);
insertarEnTabla('peliactor',$actor2,$PeliId);
insertarEnTabla('peliactor',$actor3,$PeliId);
insertarEnTabla('peliactor',$actor4,$PeliId);

echo "<script>window.location.href = 'cargar.php'</script>";
?>