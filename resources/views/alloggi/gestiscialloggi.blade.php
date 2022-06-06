<!DOCTYPE html>
<html lang="en">

  <head>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
        #Myform{
            display: none;
            width: 600px;
            border: 1px solid #ccc;
            padding: 14px;
            
        }	
       </style>

        <script>
            $(document).ready(function(){
              $('#Mybtn').click(function(){
                $('.contact-form, #Myform').slideToggle();
              });
            });
        </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Le tue offerte')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

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
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Le tue Offerte</h2>
                        <span>Qui puoi vedere gli alloggi che hai messo a disposizione</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
    



    <!-- ***** Products Area Starts ***** -->
    
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Le tue offerte</h2><br>
                        <span>Clicca su un'immagine per visualizzare le richieste ricevute</span><br>
                             <a id="Mybtn"><i class="fa fa-edit fa-2x text-info"></i></a>
                            <span>Clicca qui per modificare gli alloggi, oppure clicca sul tasto apposito per eliminarne uno.</span><br>

                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="container">
          
          @isset($houses)
            @foreach ($houses as $house)
            @php
                $id = urlencode($house->id);
            @endphp
            <div class="row">
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            @can('isLocatore') <!--OCCHIELLO: visualizza richieste?-->
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{url('offertasingola/'.$house->id)}}"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            
                            <div class="image">
                                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $house->immagine]) 
                            </div>
                        </div>
                        <div class="down-content">
                            <h4 class="title">Alloggio: {{ $house->titolo }}</h4>
                            <span>Indirizzo: {{ $house->città }}, {{ $house->cap }}, {{ $house->provincia }}, {{ $house->indirizzo}}</span> 
                            <span>Prezzo:  {{ $house->prezzo }} €</span>
                            <div class =" right-content">
                            

                                <a onclick="if (confirm('Vuoi eliminarlo definitivamente?')) {
                                    location.href = '{{route('eliminaalloggio', [$id])}}'; }"><i class="fa fa-times fa-2x text-danger"></i></a>                            
                            
                            </div>
                        </div>
                    </div>
                </div>    
                        
                        
            <div class=" lg-col-8">  
                            {{ Form::model($house, array('route' => 'modificaalloggio', 'class' => 'contact-form', 'id' => 'Myform')) }}
                                {{Form::hidden('id', $house->id)}}
                                <p id="pencil_text"><b>Modifica i dati del tuo alloggio</b></p><br>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nome:</label>
                                        <br> {{ Form::text('titolo', $house->titolo, ['class' => 'input','id' => 'titolo', 'style'=>'width:30em', 'required' => '']) }} 
                                        </div>
                                        <br>
                                    </div>
                                <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Descrizione:</label>
                                        <br>{{ Form::textarea('descrizione', $house->descrizione, ['class' => 'input','id' => 'descrizione', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>
                                 <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Prezzo:</label>
                                        <br>{{ Form::text('prezzo', $house->prezzo, ['class' => 'input','id' => 'prezzo', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                </div>
                                
                                <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Numero di Camere:</label>
                                        <br>{{ Form::text('n_camere', $house->n_camere, ['class' => 'input','id' => 'n_camere', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div><!-- comment -->
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Posti Letto Totali:</label>
                                        <br>{{ Form::text('n_posti_letto_totali', $house->n_posti_letto_totali, ['class' => 'input','id' => 'n_posti_letto_totali', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Indirizzo:</label>
                                        <br>{{ Form::text('indirizzo', $house->indirizzo, ['class' => 'input','id' => 'indirizzo', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>CAP:</label>
                                        <br>{{ Form::text('cap', $house->cap, ['class' => 'input','id' => 'cap', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Città:</label>
                                        <br>{{ Form::text('città', $house->città, ['class' => 'input','id' => 'città', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Provincia:</label>
                                        <br>{{ Form::text('provincia', $house->provincia, ['class' => 'input','id' => 'provincia', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div><!-- comment -->
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Metri Quadri:</label>
                                        <br>{{ Form::text('superficie', $house->superficie, ['class' => 'input','id' => 'superficie', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Modifica Immagine:</label>
                                        <br>{{ Form::image('immagine', $house->immagine, ['class' => 'input','id' => 'immagine', 'style'=>'width:30em', 'required' => '']) }}
                                        </div>
                                        <br>
                                    </div>        
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Servizi:</label>
                                        <br>{{ Form::text('servizi', $house->servizi, ['class' => 'input','id' => 'servizi', 'style'=>'width:30em', 'required' => '']) }}
                                        
                                                <input type="checkbox" name="servizi[]" value="Lavatrice"> Lavatrice<br/>
                                                <input type="checkbox" name="servizi[]" value="Asciugatrice"> Asciugatrice <br/>
                                                <input type="checkbox" name="servizi[]" value="Wifi"> Wifi <br/>
                                                <input type="checkbox" name="servizi[]" value="Posto Auto"> Posto Auto <br/>
                                                <input type="checkbox" name="servizi[]" value="Locale Ricreativo"> Locale Ricreativo <br/><br/>
                                        </div>
                                        <br>
                                    </div> 
                                    
                                    
                                {{ Form::submit('Modifica', ['id' => 'adduser']) }}
                                {{ Form::close() }}
                                
                                <br><br><br>
                    </div>
                </div>    
                   
                        
                    @endcan
                            
                            
            
            @endforeach
            
                @include('pagination.paginator', ['paginator' => $houses])
            

        @endisset()
        
        
            
            </div>
              
  
           
              
            
    </section>
    <!-- ***** Products Area Ends ***** -->
    
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



