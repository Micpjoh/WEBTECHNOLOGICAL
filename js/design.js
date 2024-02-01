let slideIndex = 0;
//start the slideshow
showSlides();

function showSlides() {
  //the i variable is used for the loop as a loop counter
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  //Hide all slides
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  //Reset slideshow if all pictures have been displayed
  if (slideIndex > slides.length) {slideIndex = 1}    

  //Remove the active class from all dots
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  // Display the current slide and mark the dot as active
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";

  //Sets timer of 2 seconds between every slide  
  setTimeout(showSlides, 2000); 
}
// Slideshow code from W3School and modified to use