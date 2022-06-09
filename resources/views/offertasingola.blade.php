<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
            $(document).ready(function(){
                $('.contact-form, #Toreform').hide();
                $('.contact-form, #Tarioform').hide();
                
                $('.btn btn-secondary btn-lg active, #Torebtn').click(function(){
                $('.contact-form, #Toreform').slideToggle();
              });
              
                $('.btn btn-secondary btn-lg active, #Tariobtn').click(function(){
                $('.contact-form, #Tarioform').slideToggle();
              });
            });

    </script>

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


                            

                        <span><b>Descrizione:</b>  {{ $alloggi->descrizione }} </span> 

                        @if($alloggi->tipologia == 'Appartamento')         
                            <span><b>Numero di camere totali nell'appartamento:</b>  {{ $alloggi->n_camere }} </span> 

                        @elseif($alloggi->tipologia == 'Posto letto singolo' || $alloggi->tipologia == 'Posto letto doppio')  
                            <span><b>Numero di posti letto nella stanza:</b>  {{ $alloggi->n_posti_letto_totali }} </span>
                        @endif

                            <span><b>Data di inserimento:</b>  {{ $alloggi->data_inserimento }} </span> 

                        @if ($alloggi->data_min != null)
                            <span><b>Disponibile da:</b>  {{ $alloggi->data_min }} </span> 
                        @endif

                        @if ($alloggi->data_max != null)
                            <span><b>Disponibile fino a:</b>  {{ $alloggi->data_max }} </span> 
                        @endif

                            <span><b>Indirizzo:</b> {{ $alloggi->città }}, {{ $alloggi->cap }}, {{ $alloggi->provincia }}, {{ $alloggi->indirizzo}}</span>

                        @if ($alloggi->genere != null)
                            <span><b>Si accettano solo @if ($alloggi->genere == 'F') ragazze @endif @if ($alloggi->genere == 'M') ragazzi @endif.</b></span>
                        @endif

                        @if ($alloggi->età_min != null)
                            <span><b>Età minima richiesta:  {{ $alloggi->età_min }} </b></span> 
                        @endif

                        @if ($alloggi->età_max != null)
                            <span><b>Età massima richiesta:  {{ $alloggi->età_max }} </b></span> 
                        @endif

                        @if($alloggi->tipologia == 'Appartamento')   
                            <span><b>Superficie totale dell'appartamento:</b>  {{ $alloggi->superficie }} mq</span> 
                       
                        @elseif($alloggi->tipologia == 'Posto letto singolo' || $alloggi->tipologia == 'Posto letto doppio')  
                            <span><b>Superficie della camera:</b>  {{ $alloggi->superficie }} mq</span> 
                        @endif
                        <span><b>Prezzo:</b>  {{ $alloggi->prezzo }} €</span>
                        
                        @can('isLocatario')
                        @if($alloggi->opzionato == 0)
                    
                    <span>Alloggio libero: cosa aspetti?</span>
                    @endif
                    @if($alloggi->opzionato == 1)
                    
                    <span>Alloggio già occupato...</span> 
                    @endif
                    @endcan


                </div><br>

                </div><br><br>
            
                <div class="col-lg-6">
                    <div class="left-content">
                        
                        <h4 class="title">Servizi Offerti:</h4><br>
                        
                        
                        @if($alloggi->servizi->isNotEmpty())
                        @foreach ($alloggi->servizi as $servizio)
                        <ul>
                            <li>
                                <a>{{ $servizio->nome }}</a>
                            </li>
                        </ul>
                            
                        @endforeach
                        @else 
                            <p>Nessun Servizio disponibile</p>
                        @endif
                        <br><br>
                    </div>
                </div>
                @can('isLocatario')
                @if($alloggi->opzionato == 0)
                    <div class="left-content">
                        <div class="col-lg-12"><br><br>
                            <a href="{{route('opzionato', [$alloggi->id])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Invia richiesta</a>
                            <a id="Tariobtn" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Messaggia il Locatore</a>

                                    {{ Form::open(array('route' => 'messaggialocatore', 'class' => 'contact-form', 'id' => 'Tarioform')) }}            
                                    {{ Form::token() }} 

                                    {{ Form::label('testo', 'Scrivi qui il tuo messaggio', ['class' => 'label']) }}
                                    {{ Form::textarea('testo', '', ['class' => 'input', 'id' => 'testo', 'placeholder' => 'Riuscirai a convincerlo?']) }}
                                   
                                    @if ($errors->first('testo'))
                                        <div class="errors" >
                                            @foreach ($errors->get('testo') as $message)
                                            <p>{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{ Form::hidden('destinatario', $alloggi->locatore_id, ['id' => 'destinatario']) }}

                                    {{ Form::submit('Invia', ['class' => 'button ourblue', 'id' => 'send']) }}
                                    {{ Form::close() }}
                    </div>
                </div>   
                @endif
                @endcan
                <br><br>
                @can('isLocatore')
                @if($alloggi->opzionato == 0)
                <div class="col-lg-6">
                    <div class="center">
                        
                        <h4 class="title">Richieste ricevute per questo alloggio:</h4><br>
 
                        @isset($richieste)
                        @if(!empty($richieste))
                        <a id="Torebtn" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Messaggia i locatari</a><br><br>
                        @foreach ($richieste as $richiesta) 
                            <ul>
                                <li>
                                    <p>Richiedente: <b>{{ $richiesta->username }}</b></p><br>
                                    <p>Anagrafica: {{ $richiesta->nome }} {{ $richiesta->cognome }}, genere: {{ $richiesta->genere }}, età: {{ $richiesta->età }}</p><br>
                                <div class="left-content">
                                <div class="col-lg-12">
                                    <a href="{{route('assegnato', ['locatario_id' => $richiesta->id, 'house_id' => $alloggi->id])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Assegna</a>
                                    
                                    {{ Form::open(array('route' => 'messaggialocatario', 'class' => 'contact-form', 'id' => 'Toreform')) }}            
                                    {{ Form::token() }} 

                                    {{ Form::label('testo', 'Scrivi qui il tuo messaggio', ['class' => 'label']) }}
                                    {{ Form::textarea('testo', '', ['class' => 'input', 'id' => 'testo', 'placeholder' => 'Cosa vuoi dirgli?']) }}
                                   
                                    @if ($errors->first('testo'))
                                        <div class="errors" >
                                            @foreach ($errors->get('testo') as $message)
                                            <p>{{ $message }}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{ Form::hidden('destinatario', $richiesta->id, ['id' => 'destinatario']) }}

                                    {{ Form::submit('Invia', ['class' => 'button ourblue', 'id' => 'send']) }}
                                    {{ Form::close() }}
                                </div>
                                </div>
                                </li>
                            </ul><br><br>
                        @endforeach
                        @else
                            <p>Ancora nessuna richiesta ricevuta per questo alloggio</p>
                        @endisset
                        @endif
                        <br><br>
                    </div>
                @else
                    <p><b>Alloggio già assegnato.</b></p><br>
                </div>
                
                @endif
                
                @endcan
@endisset()
                
    </section>
    <!-- ***** Product Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        @include('layouts/footer')
    </footer>
    



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
    
    
    
</html>
