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
                        
                        
              
                {{ Form::model($house, array('route' => 'modificaalloggio', 'class' => 'contact-form', 'id' => 'Myform')) }}
                {{Form::hidden('id', $house->id)}}
                    <Center><p id="pencil_text"><b>Modifica i dati del tuo alloggio</b></p><br></center>
                        <div class=" row">
                            
                            <div class ="col-lg-5">            
                                <label><b>Nome</b></label>
                                <br> {{ Form::text('titolo', $house->titolo, ['class' => 'input','id' => 'titolo', 'style'=>'width:13em', 'required' => '']) }} 
                            </div>
                            
                            <div class ="col-lg-5">   
                                        
                                <label><b>Tipologia</b></label>
                                <br> {{ Form::select('tipologia', ['appartamento' => 'Appartamento', 'posto_letto_singolo' => 'Posto letto (singolo)', 'posto_letto_doppio' => 'Posto letto (doppio)'], ['class' => 'input','id' => 'tipologia']) }} 
                            </div>
                            <br>
                        </div>
                        <br>
                                
                        <label><b>Descrizione:</b></label>
                        <br>{{ Form::textarea('descrizione', $house->descrizione, ['class' => 'input','id' => 'descrizione', 'style'=>'width:29em;height:7em', 'required' => '']) }}
                        <br>
                        <br>            
                                
                            <div class=" row">  
                                <div class="col-lg-3">
                                        <label><b>Prezzo:</b></label>
                                        <br> {{ Form::number('prezzo', $house->prezzo, ['class' => 'input','id' => 'prezzo', 'style'=>'width:5em', 'required' => '']) }}
                                </div>
                                        
                                     
                                <div class ="col-lg-4">
                                
                                        <label><b>Numero di Camere:</b></label>
                                        <br>{{ Form::number('n_camere', $house->n_camere, ['class' => 'input','id' => 'n_camere', 'style'=>'width:5em', 'required' => '']) }}
                                </div>
                                        <br>
                                        
                                
                                
                                <div class ="col-lg-4">
                                      <label><b>Posti Letto Totali:</b></label>
                                      <br>{{ Form::number('n_posti_letto_totali', $house->n_posti_letto_totali, ['class' => 'input','id' => 'n_posti_letto_totali', 'style'=>'width:5em', 'required' => '']) }}
                                      <br>
                                    
                                </div>
                            </div>
                        <br>
                            
                        
                        <label><b>Limiti di Età (facoltativi):</b></label><br>
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Da:</label>
                                {{ Form::number('età_min', $house->età_min, ['class' => 'input','id' => 'età_min', 'min' => '18',  'style'=>'width:5em']) }}
                            </div>
                            <div class="col-lg-3">
                                <label>A:</label>
                                {{ Form::number('età_max', $house->età_max, ['class' => 'input','id' => 'età_max', 'min' => '18', 'style'=>'width:5em']) }}
                            </div>
                        </div>    
                    
                    <br>
                                    
                    <div class="row">
                        <div class="col-lg-4">
                            <label><b>Indirizzo:</b></label>
                            <br>{{ Form::text('indirizzo', $house->indirizzo, ['class' => 'input','id' => 'indirizzo', 'style'=>'width:10em', 'required' => '']) }}
                        </div>
                        
                        <div class="col-lg-4">
                            <label><b>CAP:</b></label>
                                <br>{{ Form::text('cap', $house->cap, ['class' => 'input','id' => 'cap', 'style'=>'width:10em', 'required' => '']) }}
                        </div>
                        <div class="col-lg-4">
                            <label><b>Città:</b></label>
                                <br>{{ Form::text('città', $house->città, ['class' => 'input','id' => 'città', 'style'=>'width:10em', 'required' => '']) }}
                        </div>
                                        
                    </div>
                    <br>
                    <br>
                    <div> <b>Periodo di disponibilità:</b> </div>
                    <br>
                        <div class="row">
                            <div class="col-lg-5">
                                {{ Form::label('data_min', 'Da:', ['class' =>'label-input']) }}
                                {{ Form::date('data_min', $house->data_min, ['class' => 'input', 'id' =>'data_min'])}}
                
                                                @if ($errors->first('data_min'))
                                                <div class="errors" >
                                                    @foreach ($errors->get('data_min') as $message)
                                                    <p>{{ $message }}</p>
                                                    @endforeach
                                                </div>
                                                @endif
                            </div>
                            
                            <div class="col-lg-5">
                                                {{ Form::label('data_max', 'A:', ['class' =>'label-input']) }}
                                                {{ Form::date('data_max', $house->data_max, ['class' => 'input', 'id' =>'data_max'])}}
                
                                                @if ($errors->first('data_max'))
                                                <div class="errors" >
                                                    @foreach ($errors->get('data_max') as $message)
                                                    <p>{{ $message }}</p>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div> 
                         </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-5"
                            <label><b>Provincia:</b></label>
                            <br>{{ Form::text('provincia', $house->provincia, ['class' => 'input','id' => 'provincia', 'style'=>'width:10em', 'required' => '']) }}
                        </div>
                        <div class="col-lg-5">
                            <label><b>Dimensioni:</b></label>
                            <br>{{ Form::number('superficie', $house->superficie, ['class' => 'input','id' => 'superficie', 'style'=>'width:5em', 'required' => '']) }} mq
                        </div>
                                        
                    </div>
                    <br><br>
                    
                    <div class="row">    
                        <div class="col-lg-4">
                        <b>Seleziona sesso:</b> 
                    <br>
                    
                                   <input class="wrap-input-input" type="radio" name="genere" id="genereU1" value="M">
                                        <label class="wrap-input-label" for="genereU1">
                                            <div class="label-input">
                                                Uomo 
                                            </div>
                                        </label>
                                
                                   <br>
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
                        </div>                
                        <div class="col-lg-8">
                        
                        <label><b>Servizi:</b></label><br>
                                    @foreach ($servizi as $servizio)
                                            @php
                                            $check = "false"
                                            @endphp
                                        @foreach ($house->servizi as $houseservice)
                                             
                                            @if($houseservice->nome == $servizio->nome)
                                                @php
                                                $check = "checked"
                                                @endphp
                                            @endif
                                        @endforeach
                                        <input  {{$check}} type="checkbox" name="servizi[]" value="{{$servizio->nome}}"> &nbsp{{$servizio->nome}}
                                    @endforeach    
                        </div>
                        
                        
                        <div class="col-lg-12">
                            <br><br><label><b>Modifica Immagine:</b></label>
                            <br>{{ Form::image('immagine', $house->immagine, ['class' => 'input','id' => 'immagine', 'style'=>'width:29em', 'required' => '']) }}
                            <br>
                        </div>
                    </div>
                    <br>
                    
                                {{ Form::submit('Modifica', ['id' => 'adduser']) }}
                                {{ Form::close() }}
                                
                                <br><br><br>
                    
                    
                   
                        
                    @endcan
                            
                            
                </div>
            @endforeach
            
                @include('pagination.paginator', ['paginator' => $houses])
            

        @endisset()
        
        
            
            
              
  
           
              
            
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



