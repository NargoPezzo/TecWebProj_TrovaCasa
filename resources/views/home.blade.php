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
    body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
    
            
    .fadein { 
        position:relative; height:600px; width:450px; margin:0 auto;
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
            setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
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
                <div class="col-lg-4">
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
                <!-- Finisce Lo Slideshow con le foto -->
                
@guest                
        
                
                    
                <div class="about-us">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class=" right-content">
                                <img src="assets/images/LogoBigBlack.png" alt="">
                                <h4>Benvenuto, giovane avventuriero!</h4>
                                <span> Sei uno studente in cerca di un tranquillo alloggio per conseguire la tua carriera universitaria?
                                    <br> Great!
                                    <br> Hai uno o più appartamenti da affittare di fretta e furia?
                                    <br> Giusto così, il tempo è denaro!</span>
                                <span> Allora ti trovi nel posto giusto! Sfoglia pure il nostro catalogo con oltre migliaia di inserzioni da tutta Italia. 
                                    <br> E quando sei pronto per lo step successivo, crea pure un account gratuito con cui poter filtrare, prenotare un affitto o metterne in vendita uno.</span>
                                <span> Ti auguriamo un accogliente soggiorno nel nostro portale. <br></span>
                                <span><i> -il team di TrovaCasa.it</i></span>
                            </div>
                        </div>   
                    </div>    
                    </div>                
                
@endguest

@can('isLocatore')
                <div class="about-us">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class=" right-content">
                                <img src="assets/images/LogoBigBlack.png" alt="">
                                <h4>Benvenuto, Locatore.</h4>
                                <span> L' account di <b> Locatore </b> ti permette di raggiungere in modo facile migliaia di studenti potenziali locatari.
                                    <br> Puoi recarti sotto la sezione <b>"Alloggio"</b> e inserire il tuo primo annuncio.
                                    <br> Assicurati di dare uno sguardo prima alla nostra sezione <b>"Condizioni"</b>, al fine di rispettare tutte le linee
                                    <br> guida e le regole indicate.</span>
                                <span> Dopo che avrai inserito i tuoi annunci, puoi controllare le richieste e i messaggi ricevuti direttamente dalla sezione <b>"Account"</b> 
                                    
                                <span> Ti auguriamo un accogliente soggiorno nel nostro portale. <br></span>
                                <span><i> -il team di TrovaCasa.it</i></span>
                            </div>
                        </div>   
                    </div>    
                    </div> 
@endcan

@can('isLocatario')
                <div class="about-us">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class=" right-content">
                                <img src="assets/images/LogoBigBlack.png" alt="">
                                <h4>Benvenuto, Locatario.</h4>
                                <span> L' account da <b>Locatario</b> ti permette di filtrare tutti gli alloggi, in modo da trovare quelli più vicini alle tue esigenze.
                                    <br> Puoi anche visualizzare nel dettaglio tutti gli alloggi e, se ne trovi uno adatto alle tue esigenze, 
                                    <br> puoi direttamente fare una proposta e contattare il proprietario.
                                    <br> Che aspetti? Migliaia di annunci ti aspettano! 
                                    
                                    <span> Sfoglia pure il nostro catalogo, accedendovi tramite il tab <b>"Offerte"</b> che trovi in alto. 
                                    
                                <span> Ti auguriamo un accogliente soggiorno nel nostro portale. <br></span>
                                <span><i> -il team di TrovaCasa.it</i></span>
                            </div>
                        </div>   
                    </div>    
                    </div> 
@endcan

@can('isAdmin')
                <div class="about-us">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class=" right-content">
                                <img src="assets/images/LogoBigBlack.png" alt="">
                                <h4>Benvenuto, Admin Supremo.</h4>
                                <span> Non hai bisogno di nessuna presentazione.
                                    <br> 
                                    <br> Hai uno o più appartamenti da affittare di fretta e furia?
                                    <br> Giusto così, il tempo è denaro!</span>
                                <span> Allora ti trovi nel posto giusto! Sfoglia pure il nostro catalogo con oltre migliaia di inserzioni da tutta Italia. 
                                    <br> E quando sei pronto per lo step successivo, crea pure un account gratuito con cui poter filtrare, prenotare un affitto o metterne in vendita uno.</span>
                                <span> Ti auguriamo un accogliente soggiorno nel nostro portale. <br></span>
                                <span><i> -il team di TrovaCasa.it</i></span>
                            </div>
                        </div>   
                    </div>    
                    </div> 
@endcan


            
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

