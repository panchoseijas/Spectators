var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].className += " displayNone";
    slides[i].className = slides[i].className.replace( 'displayBlock' , '' ); 
  }
  slides[slideIndex-1].className = slides[slideIndex-1].className.replace( 'displayNone' , 'displayBlock' );  

}

function toggleMenu() {
  var x = document.getElementById("Menu");
  if (x.classList.contains('mobile-hide')) {
    x.className = x.className.replace('mobile-hide', 'mobile-shown');
  } else {
    x.className = x.className.replace('mobile-shown', 'mobile-hide');
  }
}


const gap = 16;

const carousel = document.getElementById("carousel-pelis"),
  content = document.getElementById("content-pelis"),
  next = document.getElementById("next-pelis"),
  prev = document.getElementById("prev-pelis");



next.addEventListener("click", e => {
  carousel.scrollBy(width + gap, 0);
  if (carousel.scrollWidth !== 0) {
    prev.classList.remove("displayNone");
    prev.classList.add("displayFlex");
  }
  if (content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
    next.classList.remove("displayFlex");
    next.classList.add("displayNone");
  }
});
prev.addEventListener("click", e => {
  carousel.scrollBy(-(width + gap), 0);
  if (carousel.scrollLeft - width - gap <= 0) {
    prev.classList.remove("displayFlex");
    prev.classList.add("displayNone");
  }
  if (!content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
    next.classList.remove("displayNone");
    next.classList.add("displayFlex");
  }
});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => (width = carousel.offsetWidth));


function borrarConfirmacion(){
  if (confirm("Estas seguro que querés borrar la publicación?") == true) {
      ret = true
  } else {
      ret = false
  }
  return ret
}



