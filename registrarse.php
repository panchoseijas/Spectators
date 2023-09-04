<!DOCTYPE html>
<html>

<head>
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="shortcut icon" href="carita1.png" />
    <script type="text/javascript" src="js/validacionRegistrar.js"></script>
</head>

<body>
    
    <div class="cajaLogin"> 
        <div class='registrar'>
            <a href="incialResponsive.html"><img src="carita1.png" alt="logo" ></a>
        </div>
        <div>

        <form name="myForm" action="corroborarRegistro.php" method="post" > 
            
            <label for="noNombre">Email </label> <input type="text" name="mail" placeholder="Ingrese su Email" >
            <label for="noNombre">Contraseña </label> <input type="password" name="password" placeholder="Ingrese su contraseña" >
            <input class="enviarButton"  value="Iniciar Sesion"type="submit" >
          

        </form>

        


        <div class='lineaHoriz'></div>
        <a href='' class="linkcontraseña">¿Olvidaste tu constraseña?</a>
        

        <button class="cancelButton"><a href="crearCuenta.php">Crear Cuenta</a></button>
        <div class='lineaHoriz'></div>
        </div>
    </div>



</body>

</html>