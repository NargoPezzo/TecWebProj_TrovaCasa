<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Modifica Dati')</title>

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
 @section('content')
                <div class="account_box">
    <h2> Modifica </h2>
    {{ Form::model($user, array('route' => 'editaccount.save', 'id' => 'editform')) }}
    @csrf
    {{ Form::text('email', null, ['placeholder' => 'Email', 'id' => 'email']) }}
    <div id='error_email' class="errormsg"></div>
    <br>
    {{ Form::password('oldpassword', ['placeholder' => 'Vecchia password', 'id' => 'oldpassword']) }}
    <div id='error_oldpassword' class="errormsg"></div>
    <br>
    {{ Form::password('password', ['placeholder' => 'Nuova password', 'id' => 'password']) }}
    <div id='error_password' class="errormsg"></div>
    <br>
    {{ Form::password('password_confirmation', ['placeholder' => 'Conferma Password', 'id' => 'password_confirmation']) }}
    <br>
    {{ Form::text('nome', null, ['placeholder' => 'Nome', 'id' => 'nome']) }}
    <div id='error_nome' class="errormsg"></div>
    <br>
    {{ Form::text('cognome', null, ['placeholder' => 'Cognome', 'id' => 'cognome']) }}
    <div id='error_cognome' class="errormsg"></div>
    <br>
    {{ Form::text('residenza', null, ['placeholder' => 'Indirizzo di residenza', 'id' => 'residenza']) }}
    <div id='error_residenza' class="errormsg"></div>
    <br>
    <div id='error_msg' class="errormsg"></div>
    <div class="date_job">
        {{ Form::date('data_nasc', null, ['placeholder' => 'Data di nascita', 'id' => 'data_nasc']) }}
        {{ Form::select('occupazione', ['Studente' => 'Studente', 'Operaio' => 'Operaio', 'Libero professionista' => 'Libero professionista', 
										'Pubblica sicurezza' => 'Pubblica Sicurezza', 'Medico' => 'Medico', 'Impiegato' => 'Impiegato',
										'Insegnante' => 'Insegnante'], null, ['placeholder' => 'Professione','id' => 'occupazione']) }}
        <div id='error_data_nasc' class="errormsg"></div>
        <br>
        <div id='error_occupazione' class="errormsg"></div>
    </div>

    <br>
    {{ Form::submit('Modifica', ['id' => 'adduser']) }}
    <br>
    {{ Form::close() }}
</div>
@endsection
                      
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
