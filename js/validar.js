function esValida(){
    var texto = document.getElementById('critica').value;
    var radios = document.getElementsByName("estrellas");
    var warnings = document.getElementById("warnings");
    var estrellas= false;

    console.log(texto.length)
    var i = 0;
    while (!estrellas && i < radios.length) {
        if (radios[i].checked) estrellas = true;
        i++;        
    }

    
    if (texto.length>2000) {
        critica = false;
        alert("Debe tener un maximo de 2000 caracteres");
    }else if(texto.length<200){
        critica = false;
        alert("Debe tener al menos 200 caracteres");
    }else{
        critica = true;
    }

    if (!estrellas){
        alert("Debe seleccionar una cantidad de estrellas")
    }
    return critica && estrellas

  
  }

