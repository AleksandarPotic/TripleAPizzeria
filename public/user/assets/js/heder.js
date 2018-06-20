	/** 
	*	Script for header.php file
	**/

	var counter=0;
	var counter1=0;

	$(".dropdown").css('cursor', 'pointer');

	function openMobileMenu(){
		if(counter%2==0){
	   	$(".dropdown-menu").css("display","block");
	   }
	   else{
	   	$(".dropdown-menu").css("display","none");
	   }
	   counter++;
	}

	function openDesktopMenu(){
		if(counter1%2==0){
	   	$(".dropdown-menu").css("display","block");
	   }
	   else{
	   	$(".dropdown-menu").css("display","none");
	   }
	   counter1++;
	}
	


	


	$(".dot").css( 'pointer-events', 'none' );

	var slideIndex = 3;
	showSlides(slideIndex);

	(function myLoop (i) {          
	   setTimeout(function () {   
	      $(".dot")[i%3].click();       //  your code here                
	      if (--i) myLoop(i);      //  decrement i and call myLoop again if i > 0
	   }, 4500)
	})(598);

	// Next/previous controls
	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1} 
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none"; 
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block"; 
	  dots[slideIndex-1].className += " active";
	}