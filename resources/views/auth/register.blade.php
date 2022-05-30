<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Registrati')</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

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
                        <!-- ***** Menu End ***** -->
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
                        <h2>Registrati</h2>
                            <span>Non sarai più uno dei tanti</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="static">
    

    <div class="container-contact">
        <p> Possiedi già un account? <a href="{{ route('login') }}"> Accedi </a> </p>
        <center><div class="wrap-contact1">
            {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}

            <div  class="wrap-input">
                {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}<br>
                {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
                @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>

            <div  class="wrap-input">
                {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}<br>
                {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome']) }}
                @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>
            
             <div  class="wrap-input">
                {{ Form::label('email', 'Email', ['class' => 'label-input']) }}<br>
                {{ Form::text('email', '', ['class' => 'input','id' => 'email']) }}
                @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>
            
             <div  class="wrap-input">
                {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}<br>
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>
            
             <div  class="wrap-input">
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}<br>
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>

            <div  class="wrap-input">
                {{ Form::label('conferma password', 'Conferma password', ['class' => 'label-input']) }}<br>
                {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'conferma password']) }}
            </div><br><br>
            
            <label for="gender">
                <div class="label-input">
                    Seleziona sesso: <br>
                </div>
            </label>
            
             <div class="wrap-input">
                <input class="wrap-input-input" type="radio" name="genere" id="genereU1" value="M">
                     <label class="wrap-input-label" for="genereU1">
                         <div class="label-input">
                            Uomo 
                         </div>
                        </label>
              </div>
                    <div class="wrap-input">
                        <input class="wrap-input-input" type="radio" name="genere" id="genereD1" value="F">
                            <label class="wrap-input-label" for="genereD1">
                                <div class="label-input">
                              Donna
                                </div>
                            </label>
                @if ($errors->first('genere'))
                <ul class="errors">
                    @foreach ($errors->get('genere') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
             </div><br><br>
            
             <div class="wrap-input">
                {{ Form::label('età', 'Età', ['class' => 'label-input']) }}<br>
                {{ Form::text('età', '', ['class' => 'input', 'id' => 'età']) }}
                @if ($errors->first('età'))
                <ul class="errors">
                    @foreach ($errors->get('età') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
            </div><br><br>
            
                         <div class="wrap-input">
                {{ Form::label('cellulare', 'Cellulare', ['class' => 'label-input']) }}<br>
                {{ Form::text('cellulare', '', ['class' => 'input', 'id' => 'cellulare']) }}
                @if ($errors->first('cellulare'))
                <ul class="errors">
                    @foreach ($errors->get('cellulare') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
            </div><br><br>
            
            <label for="livello">
                <div class="label-input">
                    Registrati come:<br>
                </div>
            </label>
            
            <div class="wrap-input">
                <input class="wrap-input-input" type="radio" name="livello" id="livelloLocatore1" value="locatore">
                     <label class="wrap-input-label" for="livelloLocatore1">
                         <div class="label-input">
                            Locatore 
                         </div>
                        </label>
             </div>
                    <div class="wrap-input">
                        <input class="wrap-input-input" type="radio" name="livello" id="livelloLocatario1" value="locatario">
                            <label class="wrap-input-label" for="livelloLocatario1">
                                <div class="label-input">
                             Locatario
                                </div>
                            </label>
                @if ($errors->first('genere'))
                <ul class="errors">
                    @foreach ($errors->get('genere') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
             </div><br><br>
            
            <div class="container-form-btn">                
                {{ Form::submit('Registrati', ['class' => 'form-btn1']) }}
            </div><br><br>
             
             <div class="container-form-btn">
           
            <button type="reset">PULISCI TUTTO</button>
            </div>
            
            {{ Form::close() }}
            </div></center>
    </div>
 
</div>
        </div>
        </div>



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

