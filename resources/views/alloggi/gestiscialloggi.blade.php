<!DOCTYPE html>
<html lang="en">

  <head>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
        #form{
            display: none;
            width: 1000px;
            border: 1px solid #ccc;
            padding: 14px;
            background: #ececec;
        }	
       </style>

        <script>
            $(document).ready(function(){
              $('#Mybtn').click(function(){
                $('#form').toggle();
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
                        <h2>Le tue offerte</h2>
                        <span>Clicca su un'immagine per visualizzare le richieste ricevute</span>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="container">
          <div class="row">
          @isset($houses)
            @foreach ($houses as $house)
            
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            @can('isLocatore') <!--OCCHIELLO: modificaAlloggio?-->
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
                            
                            @php
                            $id = urlencode($house->id);
                            @endphp
                            
                            <a id="Mybtn"><i class="fa fa-edit fa-2x text-info"></i></a>

                            <a onclick="if (confirm('Vuoi eliminarlo definitivamente?')) {
                                location.href = '{{route('eliminaalloggio', [$id])}}'; }"><i class="fa fa-times fa-2x text-danger"></i></a>                            
                            
                            
                            {{ Form::model($house, array('route' => 'modificaalloggio', 'class' => 'contact-form', 'id' => 'form')) }}
                                {{Form::hidden('id', $house->id)}}
                                <p id="pencil_text"><b>Modifica i dati del tuo alloggio</b></p>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuovo titolo:</label>
                                        {{ Form::text('titolo', $house->titolo, ['class' => 'input','id' => 'titolo', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova descrizione:</label>
                                        {{ Form::text('descrizione', $house->descrizione, ['class' => 'input','id' => 'descrizione', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                 <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuovo prezzo:</label>
                                        {{ Form::text('prezzo', $house->prezzo, ['class' => 'input','id' => 'prezzo', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                 </div><!-- comment -->
                                  <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova tipologia:</label>
                                        {{ Form::text('tipologia', $house->tipologia, ['class' => 'input','id' => 'tipologia', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                 <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova n_camere:</label>
                                        {{ Form::text('n_camere', $house->n_camere, ['class' => 'input','id' => 'n_camere', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div><!-- comment -->
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova n_posti_letto_totali:</label>
                                        {{ Form::text('n_posti_letto_totali', $house->n_posti_letto_totali, ['class' => 'input','id' => 'n_posti_letto_totali', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova indirizzo:</label>
                                        {{ Form::text('indirizzo', $house->indirizzo, ['class' => 'input','id' => 'indirizzo', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova cap:</label>
                                        {{ Form::text('cap', $house->cap, ['class' => 'input','id' => 'cap', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova città:</label>
                                        {{ Form::text('città', $house->città, ['class' => 'input','id' => 'città', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova provincia:</label>
                                        {{ Form::text('provincia', $house->provincia, ['class' => 'input','id' => 'provincia', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div><!-- comment -->
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova superficie:</label>
                                        {{ Form::text('superficie', $house->superficie, ['class' => 'input','id' => 'superficie', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova immagine:</label>
                                        {{ Form::image('immagine', $house->immagine, ['class' => 'input','id' => 'immagine', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>        
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova servizi:</label>
                                        {{ Form::text('servizi', $house->servizi, ['class' => 'input','id' => 'servizi', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div> 
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova tipologia:</label>
                                        {{ Form::text('tipologia', $house->tipologia, ['class' => 'input','id' => 'tipologia', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                    
                                            {{ Form::submit('Modifica', ['id' => 'adduser']) }}
                                    
                    </div>
                                                        </div>

                                {{ Form::close() }}
                        </div>
                    @endcan
            
            @endforeach
            
                @include('pagination.paginator', ['paginator' => $houses])
            

        @endisset()
            
            </div>
                </div>
  
           
              
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



