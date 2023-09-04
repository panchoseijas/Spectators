

function Funcion1(){
    var titulo = document.getElementById("titulo").value;
    var autor = document.getElementById("autor").value;
    var pieDeFoto = document.getElementById("pieDeFoto").value;
    var infoPrinci = document.getElementById("infoPrinci").value;
    var trailer = document.getElementById("trailer").value;
    var infoAdicional = document.getElementById("infoAdicional").value;
    var imagenNoticia = document.getElementById("imagenNoticia").value;
    


    

    var extPermitidas = /(.jpg)$/i;
    var Aviso=["\n"]
    var i =0
    if(titulo == null || titulo == ""){
        Aviso.push("❌Titulo\n")
        i=i+1

    }
    if(autor == null || autor == ""){
        Aviso.push("❌Autor\n")
        i=i+1

    }
    if(pieDeFoto == null || pieDeFoto == ""){
        Aviso.push("❌Pie de Foto\n")
        i=i+1

    }
    if(infoPrinci == null || infoPrinci == ""){
        Aviso.push("❌Informacioin Principal\n")
        i=i+1

    }
    if(trailer == null || trailer == ""){
        Aviso.push("❌Trailer\n")
        i=i+1

    }
    if(infoAdicional == null || infoAdicional == ""){
        Aviso.push("❌Informacion Adicional\n")
        i=i+1

    }
    if((!extPermitidas.exec(imagenNoticia)||(imagenNoticia == null || imagenNoticia == ""))){
        Aviso.push("❌Imagen\n")
        i=i+1


    }
  
 
    

   

    
 


     
      document.getElementById("CartelCarga").innerHTML = "Verificar "+ i +" Campos Vacios: "+Aviso;

    
    
    
    
    


}