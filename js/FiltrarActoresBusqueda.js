//La funciones de aca lo que hacen es primero, que me haga un "dropDown" al tocar boton
//y despues me haga un filtro a me dida que escriba las letras

function BajaBusqueda() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("actor1");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }
//ACTOR 2

  function BajaBusqueda2() {
    document.getElementById("myDropdown2").classList.toggle("show");
  }
  
  function filterFunction2() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("actor2");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown2");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }

//ACTOR 3
  
  function BajaBusqueda3() {
    document.getElementById("myDropdown3").classList.toggle("show");
  }
  
  function filterFunction3() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("actor3");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown3");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }

//ACTOR 4  
  function BajaBusqueda4() {
    document.getElementById("myDropdown4").classList.toggle("show");
  }
  
  function filterFunction4() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("actor4");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown4");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }

  //ACTOR 5  
  function BajaBusqueda5() {
    document.getElementById("myDropdown5").classList.toggle("show");
  }
  
  function filterFunction5() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("actor5");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown5");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }
 //DIRECTOR 
 function BajaBusqueda6() {
    document.getElementById("myDropdown6").classList.toggle("show");
  }
  
  function filterFunction6() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("direcPeli");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown6");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }
//PRODUCTOR 
function BajaBusqueda7() {
    document.getElementById("myDropdown7").classList.toggle("show");
  }
  
  function filterFunction7() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("producPeli");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown7");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    
  }
