<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Home')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <style>
    
 
    .fadein { 
        position:relative; height:700px; width:700px; margin:0 auto;
        background: #ebebeb;
        padding: 10px;
    }
    
    .fadein img{
        position:absolute;
        width: calc(96%);
        height: calc(94%);
        object-fit: scale-down;
    }

    </style>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        $(function(){
                $('.fadein img:gt(0)').hide();
                setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 5000);
        });
    </script>
    
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        
                        <ul>
                            @include('layouts/navpublic')
                        </ul>        
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

        <!-- ***** Main Banner Area Start ***** -->
    
        
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left-content">
                        <div class="thumb">
                            
                            <div class="fadein">
                            <?php 
                            // display images from directory
                            // directory path
                                $dir = "../public/images/slideshow/";

                                $scan_dir = scandir($dir);
                                foreach($scan_dir as $img):
                                        if(in_array($img,array('.','..')))
                                        continue;
                            ?>
                            <img src="<?php echo $dir.$img ?>" alt=" <?php echo $img ?> ">
                            <?php endforeach; ?>
                            </div> 
                            
                        </div>
                    </div>
                </div>
                
        <!-- FINISCE LA FOTO GIGANTE -->
        
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                        <h3>Sei un?</h3>
                        <span> Il nostro sito ha lo scopo di soddisfare studenti che hanno bisogno di trovare casa e i proprietari che hanno bisogno di pubblicizzare e mettere in vendita i propri immobili e di trovare potenziali locatari.</span>
                        <div class="quote">
                           
                           <h3> "Sto da Dio, ma l' affitto è altino." </h3>
                            <p>- Luca, 21 anni, che si è affidato a Booking piuttosto che a noi. </p>
                        </div>
                        <p>Il nostro sito garantisce le migliori inserzioni per studenti ai prezzi più bassi dell' intera penisola. I contratti sono stipulati in modo rapido ed efficiente. Soddisfatti o rimborsati? Macchè, solo soddisfatti. </p>
                        
                                    
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        @include('layouts/footer')
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>

