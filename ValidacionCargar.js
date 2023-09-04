
function validarActor(){
    var nombre = document.getElementById('nombreActor').value;
    var foto = document.getElementById('fotoActor').value;

    esValida = true;

    if (nombre == null || nombre == ""){
        vacio = 'Actor'
        esValida = false;
    }
    else if (foto == null || foto == ""){
        vacio = 'Imagen Actor'
        esValida = false;
    }


    if (!esValida){
        alert("Debe completar el campo: "+vacio)
    }

    return esValida;
}



function validarDirector(){
    var nombreDirector= document.getElementById("director").value;   

    esValida = true;

    if((nombreDirector == null || nombreDirector == "")){
        vacio = 'Director'
        esValida = false;
    }

    if (!esValida){
        alert("Debe completar el campo: "+vacio)
    }

    return esValida;

}




function validarProductor(){
    var productor= document.getElementById("productor").value;   

    esValida = true;

    if((productor == null || productor == "")){
        vacio = 'Productor'
        esValida = false;
    }

    if (!esValida){
        alert("Debe completar el campo: "+vacio)
    }

    return esValida;

}



function validarPelicula(){
    var nombre = document.getElementById('nombre').value;
    var año = document.getElementById('año').value;
    var duracion = document.getElementById('duracion').value;
    var trailer = document.getElementById('trailer').value;
    var director = document.getElementById('director-peli').value;
    var productor = document.getElementById('productor-peli').value;
    var descripcion = document.getElementById('descripcion').value;
    var poster = document.getElementById('Poster').value;
    var cartelera = document.getElementById('cartelera').value;
    var idioma = document.getElementById('idioma').value;
    var genero = document.getElementById('genero').value;
    var clasificacion = document.getElementById('clasificacion').value;
    var estrellas = document.getElementById('estrellas').value;
    var actor1 = document.getElementById('actor1').value;
    var actor2 = document.getElementById('actor2').value;
    var actor3 = document.getElementById('actor3').value;
    var actor4 = document.getElementById('actor4').value;

    var esValida = true;

    console.log(poster);
    
    if (nombre == null || nombre == ""){
        vacio = 'Nombre'
        esValida = false;
    }
    else if (año == null || año == ""){
        vacio = 'Año'
        esValida = false;
    }
    
    else if (duracion == null || duracion == ""){
        vacio = 'Duracion'
        esValida = false;
    }
    
    else if (trailer == null || trailer == ""){
        vacio = 'Trailer'
        esValida = false;
    }
    
    else if (director == null || director == "#"){
        vacio = 'Director'
        esValida = false;
    }
    

    else if (productor == null || productor == "#"){
        vacio = 'Productor'
        esValida = false;
    }

    else if (descripcion == null || descripcion == ""){
        vacio = 'Descripcion'
        esValida = false;
    }
    
    else if (poster == null || poster == ""){
        vacio = 'Poster'
        esValida = false;
    }
    
    else if (cartelera == null || cartelera == ""){
        vacio = 'Cartelera'
        esValida = false;
    }
    
    else if (idioma == null || idioma == "#"){
        vacio = 'Idioma'
        esValida = false;
    }

    else if (genero == null || genero == "#"){
        vacio = 'genero'
        esValida = false;
    }

    else if (clasificacion == null || clasificacion == "#"){
        vacio = 'Clasificacion'
        esValida = false;
    }

    else if (estrellas == null || estrellas == "#"){
        vacio = 'Estrellas'
        esValida = false;
    }

    else if (actor1 == null || actor1 == "#"){
        vacio = 'Actor 1'
        esValida = false;
    }

    else if (actor2 == null || actor2 == "#"){
        vacio = 'Actor 2'
        esValida = false;
    }

    else if (actor3 == null || actor3 == "#"){
        vacio = 'Actor 3'
        esValida = false;
    }

    else if (actor4 == null || actor4 == "#"){
        vacio = 'Actor 4'
        esValida = false;
    }


    if (!esValida){
        alert("Debe completar el campo: "+vacio)
    }
    return esValida;
}

function validarNoticia(){
    var titulo = document.getElementById("titulo").value;   
    var fecha = document.getElementById("fecha").value;   
    var imagen = document.getElementById("imagen").value;   
    var video = document.getElementById("video").value;   
    var texto = document.getElementById("texto").value;   

    esValida = true;

    if((titulo == null || titulo == "")){
        vacio = 'Titulo'
        esValida = false;
    }
    else if((fecha == null || fecha == "")){
        vacio = 'Fecha'
        esValida = false;
    }
    else if((imagen == null || imagen == "")){
        vacio = 'Imagen'
        esValida = false;
    }
    else if((video == null || video == "")){
        vacio = 'Video'
        esValida = false;
    }
    else if((texto == null || texto == "")){
        vacio = 'Texto'
        esValida = false;
    }


    if (!esValida){
        alert("Debe completar el campo: "+vacio)
    }

    return esValida;

}