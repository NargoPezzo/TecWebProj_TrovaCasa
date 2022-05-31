<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Modifica Dati Utente')</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
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
                        
                        @include('layouts/navpublic')
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Dove Siamo</h2>
                        <span>Nel cuore degli studenti</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    
    <div class="about-us">
        <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                <div class="wrap-input">
    <h2> Modifica qui i tuoi dati:</h2>
    @if ($user->livello == 'locatario')
        {{ Form::model($user, array('route' => 'modificalocatario.save', 'id' => 'editform')) }}
    @else{
        {{ Form::model($user, array('route' => 'modificalocatore.save', 'id' => 'editform')) }}
           }
    @endif
    @csrf 
    <br>
    <br>
    <p>Nome:</p><br>
    {{ Form::text('nome', null, ['placeholder' => 'Nome', 'id' => 'nome']) }}
    <div id='error_nome' class="errormsg"></div>
    <br>
    <p>Cognome:</p><br>
    {{ Form::text('cognome', null, ['placeholder' => 'Cognome', 'id' => 'cognome']) }}
    <div id='error_cognome' class="errormsg"></div>
    <br>
    <p>Età:</p><br>
    {{ Form::text('età', null, ['placeholder' => 'età', 'id' => 'età']) }}
    <div id='error_età' class="errormsg"></div>
    <br>

    <p>Modifica password:</p><br>
    {{ Form::password('oldpassword', ['placeholder' => 'Vecchia password', 'id' => 'oldpassword']) }}
    <div id='error_oldpassword' class="errormsg"></div>
    <br>
    {{ Form::password('password', ['placeholder' => 'Nuova password', 'id' => 'password']) }}
    <div id='error_password' class="errormsg"></div>
    <br>
    {{ Form::password('password_confirmation', ['placeholder' => 'Conferma Password', 'id' => 'password_confirmation']) }}
    <br>
    <div id='error_msg' class="errormsg"></div>
    <br>
    {{ Form::submit('Modifica', ['id' => 'adduser']) }}
    <br>
    {{ Form::close() }}
</div>

                      
                    </div>
                </div>
                 
                </div>
            </div>
        </div>

 
    <!-- ***** About Area Ends ***** -->

    

    

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
