<?php

include "conexion.php";


$texto =  mysqli_real_escape_string($conn,$_GET['texto']);
$tabla = $_GET['tabla'];
$destino = $_GET['destino'];



$consulta = "SELECT * FROM $tabla WHERE $destino LIKE '%$texto%'";
$resultado = mysqli_query($conn,$consulta);  



if($texto!=''){
    if (mysqli_num_rows($resultado)!=0) {
        echo("<table><thead><tr>
        <th>Id</th>
        <th>$destino</th>
        <th>Borrar</th></tr></thead>
        <tbody>
        ");

        while ($row = $resultado->fetch_array()) {
            $Id = $row[0];
            $Descripcion = $row[$destino];
    
            echo(      
                "<tr> 
                    <td>$Id</td>
                    <td>$Descripcion</td>
                    <td>
                    <form onsubmit='return borrarConfirmacion()'  method='POST' action='borrar.php'> 
                        <input type='submit' class='boton' name='eliminar-$tabla' value='Borrar' >
                        <input type='hidden' name='eliminar-id' value='$Id'>
                        </form>
                    </td>
                    
                </tr>"
            );

        } 
    }else{
        echo("<h2 style=margin:0>No hay resultados </h2>");
    }
}
    ?>

        </tbody >
    </table>


