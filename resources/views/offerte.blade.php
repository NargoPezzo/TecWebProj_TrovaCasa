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
    
    input[type='number']{
    width: 80px;
    } 
    
    input[type='submit']{
    border: 2px solid #ccc;
    } 
    
    form {
            display: none;
            width: 775px;
            border: 2px solid #ccc;
            padding: 30px;
        }
</style>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>

window.onload = function () {
        
        $("#appform").hide();
        $("#plform").hide();
        
        $("#app").click(function() {
            $("#appform").show();
            $("#plform").hide(); });
        
        $("#pl").click(function() {
            $("#plform").show();
            $("#appform").hide(); });
       
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
    document.getElementById("aprov").value =
            "<?php
                    if (old('aprov')!=null) {
                         echo old('aprov');
                    } else {
                         echo isset($_POST['aprov']) ? $_POST['aprov'] : '';
                    }
                ?>"; 
    document.getElementById("acitt??").value =
            "<?php
                    if (old('acitt??')!=null) {
                         echo old('acitt??');
                    } else {
                         echo isset($_POST['acitt??']) ? $_POST['acitt??'] : '';
                    }
                ?>"; 
    document.getElementById("plprov").value =
            "<?php
                    if (old('plprov')!=null) {
                         echo old('plprov');
                    } else {
                         echo isset($_POST['plprov']) ? $_POST['plprov'] : '';
                    }
                ?>"; 
    document.getElementById("plcitt??").value =
            "<?php
                    if (old('plcitt??')!=null) {
                         echo old('plcitt??');
                    } else {
                         echo isset($_POST['plcitt??']) ? $_POST['plcitt??'] : '';
                    }
                ?>"; 
    document.getElementById("servizi").value =
            "<?php
                    if (old('servizi')!=null) {
                         echo old('servizi');
                    } else {
                         echo isset($_POST['servizi[]']) ? $_POST['servizi[]'] : '';
                    }
                ?>";        
};
</script>

<script>
    function getCity(cityUrl) {
    var city;
    $.ajax({
        type: "GET",
        url: cityUrl,
        data: city,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id)
                        .parent()
                        .find(".errors")
                        .html(" ");
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        success: function (data) {
            data.forEach(function (elem) {
                $("#acitt??, #plcitt??").append(new Option(elem, elem));
            });
        },
        contentType: false,
        processData: false
    });
}
</script>

<script>
    $(function () {
        $('#aprov, #plprov').append('<option selected disabled>Scegli la provincia</option>');
        @foreach($province as $provincia)
        $('#aprov, #plprov').append(new Option("{!!$provincia!!}", "{!!$provincia!!}"));
        @endforeach
        $('#aprov').change(function () {
            var province = $('#aprov option:selected').text();
            var cityUrl = "{{route('city', '')}}" + "/" + province;
            $('#acitt??').find('option').remove();
            $('#acitt??').append('<option selected disabled>Scegli la citt??</option>');
            getCity(cityUrl);
        });
        $('#plprov').change(function () {
            var province = $('#plprov option:selected').text();
            var cityUrl = "{{route('city', '')}}" + "/" + province;
            $('#plcitt??').find('option').remove();
            $('#plcitt??').append('<option selected disabled>Scegli la citt??</option>');
            getCity(cityUrl);
        });
    });
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
                    <b>Ricerca Avanzata:</b>
                </p>
            </div>
            
            <button id="app" class="button button1">Appartamento</button>
            <button id="pl" class="button button2">Posto Letto</button><br><br><br>

            essd cvv<form method="post" id="appform" name="search" enctype="multipart/form-data"
                action="{{route('offerte.search')}}">
                @csrf
                <span class="search">
                    <label for='tip' class="control"><b>Tipologia:</b></label>&nbsp;&nbsp;&nbsp;
                    <select name="tip" id="tip">
                       <option value="Appartamento" selected>Appartamento</option>
                    </select>
                </span>
                <br>
                <br>
                <span class="search">
                    <label for="aprov" class="control">Provincia:</label>
                    <select name="aprov" id="aprov">
                    </select>
                </span>
                <br><br>
                <span class="search">
                    <label for="acitt??" class="control">Citt??:</label>
                    <select id="acitt??" name="acitt??" size="1">
                </select>
                </span>
                <br><br>
                <b>Prezzo:</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='prezzomin' class="control">Da:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="prezzomin" id="prezzomin" type="range" min="0" max="1000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomin)
                        <option>{{$prezzomin}}</option>
                    @endisset ???
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='prezzomax' class="control">A:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="prezzomax" id="prezzomax" type="range" min="0" max="3000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomax)
                        <option>{{$prezzomax}}</option>
                    @endisset ???
                </span>
                <br>
                <br>
                <b>Periodo di Disponibilit??:</b>
                &nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='data_min' class="control">Dal:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="data_min" id="data_min" type="date" 
                   oninput="this.nextElementSibling.value = this.value">
                   <output></output>
                    @isset($data_min)
                        <option>{{$data_min}}</option>
                    @endisset
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='data_max' class="control">Al:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="data_max" id="data_max" type="date" 
                   oninput="this.nextElementSibling.value = this.value" >
                    @isset($data_max)
                        <option>{{$data_max}}</option>
                    @endisset
                </span>
                <br>
                <br>
                <span class="search">
                    <label for="n_camere" class="control"><b>N?? Camere:</b></label>&nbsp;&nbsp;&nbsp;
                    <input type="number" name="n_camere" id="n_camere" min="0" step="1" /> 
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for="n_posti_letto_totali" class="control"><b>N?? Posti Letto:</b></label>&nbsp;&nbsp;&nbsp;
                    <input type="number" name="n_posti_letto_totali" id="n_posti_letto_totali" min="0" step="1"/> 
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for="superficie" class="control"><b>Dimensioni:</b></label>&nbsp;&nbsp;&nbsp;
                    <input type="number" name="superficie" id="superficie" min="0" step="5"/> mq
                </span>
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <p><b>Servizi Aggiuntivi:</b></p><br>
                    @foreach ($servizi as $servizio)
                    <input name ="servizi[]" id="servizi"type="checkbox" value="{{$servizio->id}}"></input>
                    <label for='servizi[]' class="control">{{$servizio->nome}}</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </span>
                <br><br><br>
                <input type="submit" class="btn btn-inverse" style="vertical-align: super" value="Filtra i risultati:">
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
                    <label for='tip' class="control"><b>Tipologia:</b></label>&nbsp;&nbsp;&nbsp;
                    <select required name="tip" id="tip">
                        <option  value="Posto letto singolo">Posto letto singolo</option>
                        <option value="Posto letto doppio">Posto letto doppio</option>
                    </select>
                </span>
                <br>
                <br>
                <span class="search">
                    <label for="plprov" class="control">Provincia:</label>
                    <select name="plprov" id="plprov">
                    </select>
                </span>
                <br><br>
                <span class="search">
                    <label for="plcitt??" class="control">Citt??:</label>
                    <select id="plcitt??" name="plcitt??" size="1">
                </select>
                </span>
                <br><br>
                <b>Prezzo:</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='prezzomin' class="control">Da:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="prezzomin" id="prezzomin" type="range" min="0" max="1000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomin)
                        <option>{{$prezzomin}}</option>
                    @endisset ???
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='prezzomax' class="control">A:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="prezzomax" id="prezzomax" type="range" min="0" max="3000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                    @isset($prezzomax)
                        <option>{{$prezzomax}}</option>
                    @endisset ???
                </span>
                <br>
                <br>
                <b>Periodo di Disponibilit??:</b>
                &nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='data_min' class="control">Dal:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="data_min" id="data_min" type="date" 
                   oninput="this.nextElementSibling.value = this.value">
                   <output></output>
                    @isset($data_min)
                        <option>{{$data_min}}</option>
                    @endisset
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for='data_max' class="control">Al:</label>&nbsp;&nbsp;&nbsp;
                   <input name ="data_max" id="data_max" type="date" 
                   oninput="this.nextElementSibling.value = this.value" >
                    @isset($data_max)
                        <option>{{$data_max}}</option>
                    @endisset
                </span>
                <br>
                <br>
                
                <span class="search">
                    <label for="n_posti_letto_totali" class="control"><b>N?? Posti Letto Totali Alloggio:</b></label>&nbsp;&nbsp;&nbsp;
                    <input type="number" name="n_posti_letto_totali" id="n_posti_letto_totali" min="0" step="1"/> 
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <label for="superficie" class="control"><b>Dimensioni:</b></label>&nbsp;&nbsp;&nbsp;
                    <input type="number" name="superficie" id="superficie" min="0" step="5"/> mq
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="search">
                    <p><b>Servizi Aggiuntivi:</b></p><br>
                    @foreach ($servizi as $servizio)
                    <input name ="servizi[]" id="servizi"type="checkbox" value="{{$servizio->id}}"></input>
                    <label for='servizi[]' class="control">{{$servizio->nome}}</label>
                    
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </span>
                <br><br><br>
                <input type="submit" class="btn btn-inverse" style="vertical-align: super" value="Filtra i risultati:">
                @if ($errors->first('tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('provincia'))
                <ul class="errors">
                    @foreach ($errors->get('provincia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('citt??'))
                <ul class="errors">
                    @foreach ($errors->get('citt??') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('prezzominimo'))
                <ul class="errors">
                    @foreach ($errors->get('prezzominimo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('prezzomassimo'))
                <ul class="errors">
                    @foreach ($errors->get('prezzomassimo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('dataminima'))
                <ul class="errors">
                    @foreach ($errors->get('dataminima') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('datamassima'))
                <ul class="errors">
                    @foreach ($errors->get('datamassima') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </form>
            
            
        </div>
    </section>
@endcan
<br> 
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
                            <span>Indirizzo: {{ $house->citt?? }}, {{ $house->cap }}, {{ $house->provincia }}, {{ $house->indirizzo}}</span> 
                            <span>Prezzo:  {{ $house->prezzo }} ???</span>
                            
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

    

