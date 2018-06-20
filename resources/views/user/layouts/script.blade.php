<!-- Propper Bootstrap Plugin -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Ajax script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
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

    //$(".dot").css( 'pointer-events', 'none' );

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    var nesto;

    var slideIndex = 0;
    showSlides(slideIndex);

    function showSlides(i) {
        clearTimeout(nesto);
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        nesto = setTimeout(showSlides, 4000); // Change image every 2 seconds
    }
</script>

<script>

    $(document).ready(function () {
        var d = new Date();
        var n = d.getDay();

        if (n == 7 || n == 1 || n == 2 || n == 3) {
            $("#hours_end").html('1');
        } else {
            $("#hours_end").html('3');
        }
    });
</script>
