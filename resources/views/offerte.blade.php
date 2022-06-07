<!DOCTYPE html>
<html lang="en">

  <head>

<style>
    .button {
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .button1 {
      background-color: white; 
      color: black; 
      border: 2px solid #4CAF50;
    }

    .button1:hover {
      background-color: #4CAF50;
      color: white;
    }

    .button2 {
      background-color: white; 
      color: black; 
      border: 2px solid #008CBA;
    }

    .button2:hover {
      background-color: #008CBA;
      color: white;
    }

</style>

<script>
    
    
    window.onload = function () {
        
        $("#appform").hide();
        $("#plform").hide();
        
        $("#app").click(function() {
            $("#appform").show();
            $("#plform").hide(); })
        
        $("#pl").click(function() {
            $("#plform").show();
            $("#appform").hide(); })
       
        document.getElementById("tip").value =
                "<?php
                    if (old('tip')!=null) {
                         echo old('tip');
                    } else {
                         echo isset($_POST['tip']) ? $_POST['tip'] : '';
                    }
                ?>";
    document.getElementById("prezzomin").value =
            "<?php
                    if (old('prezzomin')!=null) {
                         echo old('prezzomin');
                    } else {
                         echo isset($_POST['prezzomin']) ? $_POST['prezzomin'] : '';
                    }
                ?>";
    document.getElementById("prezzomax").value =
            "<?php
                    if (old('prezzomax')!=null) {
                         echo old('prezzomax');
                    } else {
                         echo isset($_POST['prezzomax']) ? $_POST['prezzomax'] : '';
                    }
                ?>";
    document.getElementById("data_min").value =
            "<?php
                    if (old('data_min')!=null) {
                         echo old('data_min');
                    } else {
                         echo isset($_POST['data_min']) ? $_POST['data_min'] : '';
                    }
                ?>";
    document.getElementById("data_max").value =
            "<?php
                    if (old('data_max')!=null) {
                         echo old('data_max');
                    } else {
                         echo isset($_POST['data_max']) ? $_POST['data_max'] : '';
                    }
                ?>";
    document.getElementById("superficie").value =
            "<?php
                    if (old('superficie')!=null) {
                         echo old('superficie');
                    } else {
                         echo isset($_POST['superficie']) ? $_POST['superficie'] : '';
                    }
                ?>";
    document.getElementById("n_camere").value =
            "<?php
                    if (old('n_camere')!=null) {
                         echo old('n_camere');
                    } else {
                         echo isset($_POST['n_camere']) ? $_POST['n_camere'] : '';
                    }
                ?>";
    document.getElementById("n_posti_letto_totali").value =
            "<?php
                    if (old('n_posti_letto_totali')!=null) {
                         echo old('n_posti_letto_totali');
                    } else {
                         echo isset($_POST['n_posti_letto_totali']) ? $_POST['n_posti_letto_totali'] : '';
                    }
                ?>";
    document.getElementById("servizi").value =
            "<?php
                    if (old('servizi')!=null) {
                         echo old('servizi');
                    } else {
                         echo isset($_POST['servizi']) ? $_POST['servizi'] : '';
                    }
                ?>";
    };
</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Offerte')</title>


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
                        <h2>Le nostre Offerte</h2>
                        <span>Qui puoi vedere gli alloggi che ti mettiamo a disposizione</span>
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
                        <h2>Le nostre offerte</h2>
                        @can('isLocatario')
                        <span>Clicca su un'immagine per visualizzarne i dettagli</span>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="container">

@can('isLocatario')

@section ('content')
<section class="main-content">
    <section>
        <div class="outer_search">
            <div>
                <p style="padding:20px;float:left">
                    <b>Ricerca<br>avanzata</b>
                </p>
            </div>
            
            <button id="app" class="button button1">Appartamento</button>
            <button id="pl" class="button button2">Posto Letto</button><br><br><br>

            <form method="post" id="appform" name="search" enctype="multipart/form-data"
                action="{{route('offerte.search')}}">
                @csrf
                <span class="search">
                    <label for='tip' class="control">Tipologia</label>
                    <select name="tip" id="tip">
                       <option value="Appartamento" selected>Appartamento</option>
                    </select>
                </span>
                <br>
                <span class="search">
                   <label for='prezzomin' class="control">Prezzo min</label>
                   <input name ="prezzomin" id="prezzomin" type="range" min="0" max="1000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomin)
                        <option>{{$prezzomin}}</option>
                    @endisset €
                </span>
                <span class="search">
                    <label for='prezzomax' class="control">Prezzo max</label>
                   <input name ="prezzomax" id="prezzomax" type="range" min="0" max="3000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomax)
                        <option>{{$prezzomax}}</option>
                    @endisset €
                </span>
                <br>
                <span class="search">
                   <label for='data_min' class="control">Data min</label>
                   <input name ="data_min" id="data_min" type="date" 
                   oninput="this.nextElementSibling.value = this.value">
                   <output></output>
                    @isset($data_min)
                        <option>{{$data_min}}</option>
                    @endisset
                </span>
                <span class="search">
                    <label for='data_max' class="control">Data max</label>
                   <input name ="data_max" id="data_max" type="date" 
                   oninput="this.nextElementSibling.value = this.value" >
                    @isset($data_max)
                        <option>{{$data_max}}</option>
                    @endisset
                </span>
                <br>
                <span class="search">
                    <label for="n_camere" class="control">Numero di camere nell'appartamento</label>
                    <input type="number" name="n_camere" id="n_camere" min="0" step="1"/> 
                </span>
                <br>
                <span class="search">
                    <label for="n_posti_letto_totali" class="control">Numero di posti letto totali</label>
                    <input type="number" name="n_posti_letto_totali" id="n_posti_letto_totali" min="0" step="1"/> 
                </span>
                <br>
                <span class="search">
                    <label for="superficie" class="control">Superficie minima dell'appartamento</label>
                    <input type="number" name="superficie" id="superficie" min="0" step="5"/> mq
                </span>
                <br><br>
                <span class="search">
                    <p><b>Presenza di:</b></p>
                    @foreach ($servizi as $servizio)
                    <label for='servizi' class="control">{{$servizio}}</label>
                    <input name ="servizi" id="servizi"type="checkbox"></input><br>
                    @endforeach
                </span>
                <br><br>
                <input type="submit" class="btn btn-inverse" style="vertical-align: super" value="Cerca">
                @if ($errors->first('tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </form>

            <form method="post" id="plform" name="search" enctype="multipart/form-data"
                action="{{route('offerte.search')}}">
                @csrf
                <span class="search">
                    <label for='tip' class="control">Tipologia</label>
                    <select required name="tip" id="tip">
                        
                        <option  value="Posto letto singolo">Posto letto singolo</option>
                        <option value="Posto letto doppio">Posto letto doppio</option>
                        
                    </select>
                </span>
                <br>
                <span class="search">
                   <label for='prezzomin' class="control">Prezzo min</label>
                   <input name ="prezzomin" id="prezzomin" type="range" min="0" max="1000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomin)
                        <option>{{$prezzomin}}</option>
                    @endisset €
                </span>
                <span class="search">
                    <label for='prezzomax' class="control">Prezzo max</label>
                   <input name ="prezzomax" id="prezzomax" type="range" min="0" max="3000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomax)
                        <option>{{$prezzomax}}</option>
                    @endisset €
                </span>
                <br>
                <span class="search">
                   <label for='data_min' class="control">Data min</label>
                   <input name ="data_min" id="data_min" type="date" value="01-01-2000"
                   oninput="this.nextElementSibling.value = this.value">
                   <output></output>
                    @isset($data_min)
                        <option>{{$data_min}}</option>
                    @endisset
                </span>
                <span class="search">
                    <label for='data_max' class="control">Data max</label>
                   <input name ="data_max" id="data_max" type="date" value="01-01-3000"
                   oninput="this.nextElementSibling.value = this.value" >
                    @isset($data_max)
                        <option>{{$data_max}}</option>
                    @endisset
                </span>
                <br>
                <span class="search">
                    <label for="num_pl_tot" class="control">Numero di posti letto nella camera</label>
                    <input type="number" name="num_pl_tot" id="num_pl_tot" min="0" step="1"/> 
                </span>
                <br>
                <span class="search">
                    <label for="n_camere" class="control">Numero di posti letto totali nell'alloggio</label>
                    <input type="number" name="n_camere" id="n_camere" min="0" step="1"/> 
                </span>
                <br>
                <span class="search">
                    <label for="superficie" class="control">Superficie minima della camera</label>
                    <input type="number" name="superficie" id="superficie" min="0" step="5"/> mq
                </span>
                <br><br>
                <span class="search">
                    <p><b>Presenza di:</b></p>
                    @foreach ($servizi as $servizio)
                    <label for='servizi' class="control">{{$servizio}}</label>
                        <input name ="servizi" id="servizi"type="checkbox"></input><br>
                        @endforeach
                </span>
                <br><br>
                <input type="submit" class="btn btn-inverse" style="vertical-align: super" value="Cerca">
                @if ($errors->first('tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </form>
            
            
        </div>
    </section>
@endcan
            
          <div class="row">
          @isset($houses)
            @foreach ($houses as $house)
            
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            @can('isLocatario')
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{url('offertasingola/'.$house->id)}}"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            @endcan
                            <div class="image">
                                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $house->immagine]) 
                            </div>
                        </div>
                        <div class="down-content">
                            <h4 class="title">Alloggio: {{ $house->titolo }}</h4>
                            <span>Indirizzo: {{ $house->città }}, {{ $house->cap }}, {{ $house->provincia }}, {{ $house->indirizzo}}</span> 
                            <span>Prezzo:  {{ $house->prezzo }} €</span>
                            
                        </div>
                    </div>
                </div>
            
            @endforeach
            
            @include('pagination.paginator', ['paginator' => $houses])
            

        @endisset()
            
            
  
           
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

