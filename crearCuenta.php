

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Crear Cuenta</title>
  <link rel="stylesheet" href="css/estilos2.css">
  <link rel="shortcut icon" href="carita1.png" />
  <script type="text/javascript" src="js/crearCuentaValidacion.js"></script>

</head>

<body>


  <div class='cajaRegistrarse'>

    <div class='registrar'>
      <a href=""><img src="carita1.png" alt="logo"></a>
    </div>
    <h1>Crear cuenta</h1>

    <form name="myForm" action="cargarUsuario.php"   method="POST" > 
      
      <label >Usuario <span id='demo'></span> </label> <input onfocus="return myFunction()" id="numb" type="text" name="Usuario" placeholder="Ingrese nombre de Usuario" >
      
      
      <label >Email  <span id='demo2'></span></label> <input onfocus="return myFunction()" type="text" id='Mail' name='Mail' placeholder="Ingrese su Email" >
      <label >Contraseña <span  id='demo3'></span> </label> <input onfocus="return myFunction()"type="password" id="Clave"  name="Contraseña" placeholder="Ingrese su contraseña" >
      <label >Repetir Contraseña  <span id='demo4'></span> </label> <input onfocus="return myFunction()"type="password" id="Clave2" name="Contraseña2" placeholder="Vuelva a ingresar su contraseña" >
      
     
      <input  class="enviarButton" type="submit" Value="Crear Cuenta"></button>  
      
      
      
    </form>

    <div class='lineaHoriz'></div>
   <a href="registrarse.php" ><button class="cancelButton">Iniciar sesion</button></a>



 
  </div>


</body>

</html>