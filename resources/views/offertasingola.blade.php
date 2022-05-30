<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Visualizza singola offerta')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css')}}">
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
                        <ul>
                            @include('layouts/navpublic')
                        </ul>
                       
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
@isset ($alloggi)
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{ $alloggi->titolo }}</h2>
                        <span>{{ $alloggi->città }}, {{ $alloggi->cap }}, {{ $alloggi->provincia }}, {{ $alloggi->indirizzo}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
  
    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-images">
                        @include('helpers/singleproductimg', ['attrs' => 'imagefrm', 'imgFile' => $alloggi->immagine])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4 class="title">Alloggio: {{ $alloggi->titolo }}</h4>


                            <span>Prezzo:  {{ $alloggi->prezzo }} €</span>

                            <span>Descrizione:  {{ $alloggi->descrizione }} </span> 

                        @if($alloggi->tipologia == 'appartamento')         
                            <span>Numero di camere totali nell'appartamento:  {{ $alloggi->n_camere }} </span> 
                        @endif

                        @if($alloggi->tipologia == 'posto letto')  
                            <span>Numero di posti letto nella stanza:  {{ $alloggi->n_posti_letto_totali }} </span>
                        @endif

                            <span>Data di inserimento:  {{ $alloggi->data_inserimento }} </span> 

                        @if ($alloggi->data_min != null)
                            <span>Disponibile da:  {{ $alloggi->data_min }} </span> <
                        @endif

                        @if ($alloggi->data_max != null)
                            <span>Disponibile fino a:  {{ $alloggi->data_max }} </span> 
                        @endif

                            <span>Indirizzo: {{ $alloggi->città }}, {{ $alloggi->cap }}, {{ $alloggi->provincia }}, {{ $alloggi->indirizzo}}</span>

                        @if ($alloggi->genere != null)
                            <span>Si accettano solo @if ($alloggi->genere == 'F') ragazze @endif @if ($alloggi->genere == 'M') ragazzi @endif.</span>
                        @endif

                        @if ($alloggi->età_min != null)
                            <span>Età minima richiesta:  {{ $alloggi->età_min }} </span> 
                        @endif

                        @if ($alloggi->età_max != null)
                            <span>Età massima richiesta:  {{ $alloggi->età_max }} </span> 
                        @endif

                        @if($alloggi->tipologia == 'appartamento')   
                            <span>Superficie totale dell'appartamento:  {{ $alloggi->superficie }} mq</span> 
                        @endif

                        @if($alloggi->tipologia == 'posto letto')  
                            <span>Superficie della camera:  {{ $alloggi->superficie }} mq</span> 
                        @endif
                        
                        @if($alloggi->opzionato == 0)
                    <p>@include('helpers/buttonimg', ['attrs' => 'imagefrm', 'imgFile' => 'green_button.png']) </p>
                    <span>Alloggio libero: cosa aspetti?</span>
                    @endif
                    @if($alloggi->opzionato == 1)
                    <p>@include('helpers/buttonimg', ['attrs' => 'imagefrm', 'imgFile' => 'red_button.png']) </p>
                    <span>Alloggio già occupato...</span> 
                    @endif







                        </div>

                    </div>
                
                
            
            
        
        </div> 
    </section>
    <!-- ***** Product Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        @include('layouts/footer')
    </footer>
    
@endisset()


    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/popper.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/accordions.js')}}"></script>
    <script src="{{ asset('assets/js/datepicker.js')}}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js')}}"></script> 
    <script src="{{ asset('assets/js/slick.js')}}"></script> 
    <script src="{{ asset('assets/js/lightbox.js')}}"></script> 
    <script src="{{ asset('assets/js/isotope.js')}}"></script> 
    <script src="{{ asset('assets/js/quantity.js')}}"></script>
    
    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>

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