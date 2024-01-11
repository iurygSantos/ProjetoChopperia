
//demora um tempo(que coloquei) para aparecer a pagina  
var intervalo = setInterval(function (){
  clearInterval(intervalo);
  
  document.getElementById('carregando').style.display = 'none'
  document.getElementById('corpo').style.display      = 'block'
},2000 );


var slideIndex = 1
showSlides(slideIndex)

function showSlides(n) {
  var slides = document.getElementsByClassName('mySlides')
  
  // console.log(slides)
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) { 
    slideIndex = slides.length
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none'
    
  }
  slides[slideIndex - 1].style.display = 'block'
}

// Thumbnail image controls
function showSlidePrev(n) {
  showSlides(slideIndex += n)
}
// Next/previous controls
function showSlideNext(n) {
  showSlides(slideIndex += n)
}

