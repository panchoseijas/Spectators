//Validacion de que si esta vacio me avise que debo revisar
function valida() {
    var x = document.forms["myForm"]["fname"].value;
    var y = document.forms["myForm"]["fname2"].value;

    
    if ((x == null || x == "")&& (y == null || y == "")){
        alert("Revisar - Campos vacios");
        
        return false;
    }

    if(!(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(x))){
        
        alert("Revisar - No ha ingresado su MAIL correctamente");
        return false

    }
    if(x == null || x == ""){
        alert("Revisar - Campo MAIL vacio")
        return false;
    }
    if(y == null || y == ""){
        alert("Revisar - Campo CONTRASEÑA vacio")
        return false;
    }

    return true;
}

