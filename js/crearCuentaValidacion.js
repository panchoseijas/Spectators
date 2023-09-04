




function myFunction() {
    //valida que no vacio usuario
    var x = document.getElementById("numb").value;
    
    if ((x == null || x == "")||(x.length<4 || x.length>10)&(x.length>0)){
      text = " ❌";
      
    } else {
      text="✔️";

    }
    if((x.length<4 || x.length>10)&(x.length>0)){
      text=" debe tener mas de 4 y menos de 10 caracteres";
      
      



    }
    
    document.getElementById("demo").innerHTML = text;
    document.getElementById("demo3").innerHTML = text;
    //valida que formato de mail
    
    var y = document.getElementById("Mail").value;
    if (!(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(y))){
        text="❌";   
        
        
    }else{
        text="✔️"
    }
   

    document.getElementById("demo2").innerHTML = text;
    //valida que ambas claves sean iguales
    
    var a = document.getElementById("Clave").value;
    var b = document.getElementById("Clave2").value;
    
   
    if ((a == null || a == "")){
        text_A="❌"

        
        

    
    }else{
      text_A="✔️"
          
    }
    if(b == null || b == "") {
      text_B="❌"


    }else{
      text_B="✔️"
          
    }

    if ((a==b) && (a!="")&& (b!="")){
      text_B="✔️"
      text_A="✔️"


    }else{
      text_B="❌"
      text_A="❌"
      
    }


    


  
  
    document.getElementById("demo3").innerHTML = text_A;
    document.getElementById("demo4").innerHTML = text_B;
   


  }
