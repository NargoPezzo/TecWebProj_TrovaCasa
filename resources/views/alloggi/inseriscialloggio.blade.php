<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Inserisci Alloggio')</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">


<script type="text/javascript" src="resources/js/app.js"></script>

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
    document.getElementById("acittà").value =
            "<?php
                    if (old('acittà')!=null) {
                         echo old('acittà');
                    } else {
                         echo isset($_POST['acittà']) ? $_POST['acittà'] : '';
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
    document.getElementById("plcittà").value =
            "<?php
                    if (old('plcittà')!=null) {
                         echo old('plcittà');
                    } else {
                         echo isset($_POST['plcittà']) ? $_POST['plcittà'] : '';
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
                $("#acittà, #plcittà").append(new Option(elem, elem));
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
            $('#acittà').find('option').remove();
            $('#acittà').append('<option selected disabled>Scegli la città</option>');
            getCity(cityUrl);
        });
        $('#plprov').change(function () {
            var province = $('#plprov option:selected').text();
            var cityUrl = "{{route('city', '')}}" + "/" + province;
            $('#plcittà').find('option').remove();
            $('#plcittà').append('<option selected disabled>Scegli la città</option>');
            getCity(cityUrl);
        });
    });
</script>
  <!-- Custom styles -->
  <style>
    #form label.error {
        color: red;
        font-weight: bold;
    }
     
    .main {
        width: 600px;
        margin: 0 auto;
    }
  </style>
    </head>

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
                        <h2>Inserisci alloggio</h2>
                            <span>P.S.: "Lorem ipsum dolor..." non è accetto</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End form poi si passa alla request poi al controller e dentro al controller si richiama una funzione del model passandogli i filtri che stanno nella form***** -->
    
    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="static">
                   <div class="container-contact">
                        <div class="wrap-contact">
                            
                            
                        {{ Form::open(array('route' => 'inseriscialloggio.store', 'id' => 'houses', 'files' => true, 'class' => 'contact-form')) }}
                            <div  class="wrap-input  rs1-wrap-input">
                                <b>{{ Form::label('titolo', 'Titolo:', ['class' => 'label-input']) }}&nbsp;&nbsp;&nbsp;
                                {{ Form::text('titolo', '', ['class' => 'input', 'id' => 'titolo']) }}
                                @if ($errors->first('titolo'))
                                <ul class="errors">
                                    @foreach ($errors->get('titolo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            <!--<div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('locatoreId', 'ID', ['class' => 'label-input']) }}
                                {{ Form::text('locatoreId', '', ['class' => 'input', 'id' => 'locatoreId']) }}
                             
                                @if ($errors->first('locatoreId'))
                                <ul class="errors">
                                    @foreach ($errors->get('locatoreId') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>-->
                            
                                    
                            
                                {{ Form::label('tipologia', 'Tipologia:', ['class' => 'label-input']) }}&nbsp;&nbsp;&nbsp;
                                {{ Form::select('tipologia', ['appartamento' => 'Appartamento', 'posto_letto_singolo' => 'Posto letto (singolo)', 'posto_letto_doppio' => 'Posto letto (doppio)'], ['class' => 'input','id' => 'tipologia']) }}
                            </div>
                        <br>

                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('immagine', 'Immagine:', ['class' => 'label-input']) }}&nbsp;&nbsp;&nbsp;
                                {{ Form::file('immagine', ['class' => 'input', 'id' => 'immagine']) }}
                                @if ($errors->first('immagine'))
                                <ul class="errors">
                                    @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        <br>
                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('descrizione', 'Descrizione ', ['class' => 'label-input']) }}
                                {{ Form::textarea('descrizione', '', ['class' => 'input', 'id' => 'descrizione']) }}
                                @if ($errors->first('descrizione'))
                                <ul class="errors">
                                    @foreach ($errors->get('descrizione') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('prezzo', 'Prezzo', ['class' => 'label-input']) }}
                                {{ Form::text('prezzo', '', ['class' => 'input', 'id' => 'prezzo']) }}€ al mese
                                @if ($errors->first('prezzo'))
                                <ul class="errors">
                                    @foreach ($errors->get('prezzo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            
                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('n_camere', 'Numero Camere', ['class' => 'label-input']) }}
                                {{ Form::text('n_camere', '', ['class' => 'input', 'id' => 'n_camere']) }}
                                @if ($errors->first('n_camere'))
                                <ul class="errors">
                                    @foreach ($errors->get('n_camere') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            
                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('n_posti_letto_totali', 'Numero Posti Letto Totali', ['class' => 'label-input']) }}
                                {{ Form::text('n_posti_letto_totali', '', ['class' => 'input', 'id' => 'n_posti_letto_totali']) }}
                                @if ($errors->first('n_posti_letto_totali'))
                                <ul class="errors">
                                    @foreach ($errors->get('n_posti_letto_totali') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        
                        <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('età_min', 'Età Minima (Facoltativo)', ['class' => 'label-input']) }}
                                {{ Form::number('età_min', '', ['class' => 'input', 'id' => 'età_min', 'min' => '18']) }}
                                @if ($errors->first('età_min'))
                                <ul class="errors">
                                    @foreach ($errors->get('età_min') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        
                        <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('età_max', 'Età Massima (Facoltativo)', ['class' => 'label-input']) }}
                                {{ Form::number('età_max', '', ['class' => 'input', 'id' => 'età_max','min' => '18']) }}
                                @if ($errors->first('età_max'))
                                <ul class="errors">
                                    @foreach ($errors->get('età_max') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            
                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                                {{ Form::text('indirizzo', '', ['class' => 'input', 'id' => 'indirizzo']) }}
                                @if ($errors->first('indirizzo'))
                                <ul class="errors">
                                    @foreach ($errors->get('indirizzo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            
                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('cap', 'CAP', ['class' => 'label-input']) }}
                                {{ Form::text('cap', '', ['class' => 'input', 'id' => 'cap']) }}
                                @if ($errors->first('cap'))
                                <ul class="errors">
                                    @foreach ($errors->get('cap') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        
                            <span class="search">
                                <label for="aprov" class="control">Provincia:</label>
                                <select name="aprov" id="aprov">
                                </select>
                            </span>
                            <br><br>
                            <span class="search">
                                <label for="acitta" class="control">Città:</label>
                                <select id="acittà" name="acittà" size="1">
                            </select>
                            </span>
                            <br><br>
                            
                            <span class="search">
                                <label for="plprov" class="control">Provincia:</label>
                                <select name="plprov" id="plprov">
                                </select>
                            </span>
                            <br><br>
                            <span class="search">
                                <label for="plcitta" class="control">Città:</label>
                                <select id="plcittà" name="plcittà" size="1">
                            </select>
                            </span>
                            <br><br>
                            
                            <!-- comment     <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('città', 'Citta', ['class' => 'label-input']) }}
                                {{ Form::text('città', '', ['class' => 'input', 'id' => 'città']) }}
                                @if ($errors->first('città'))
                                <ul class="errors">
                                    @foreach ($errors->get('città') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div> -->
                            
                            <div style="text-align:center; margin-top: 1em;"> Periodo di disponibilità </div>
                        <div class="row">
                            <div class="left">
                                {{ Form::label('data_min', 'Inizio', ['class' =>'label-input']) }}
                                {{ Form::date('data_min', '', ['class' => 'input', 'id' =>'data_min'])}}
                
                                @if ($errors->first('data_min'))
                                <div class="errors" >
                                        @foreach ($errors->get('data_min') as $message)
                                        <p>{{ $message }}</p>
                                        @endforeach
                                </div>
                                @endif
                            </div>
                            
                       <div style="margin-left:2.5em;">
                                {{ Form::label('data_max', 'Fine', ['class' =>'label-input']) }}
                                {{ Form::date('data_max', '', ['class' => 'input', 'id' =>'data_max'])}}
                
                                @if ($errors->first('data_max'))
                                <div class="errors" >
                                        @foreach ($errors->get('data_max') as $message)
                                        <p>{{ $message }}</p>
                                        @endforeach
                                </div>
                                @endif
                            </div> 
                        </div>
                            
                    <!-- comment        <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('provincia', 'Provincia', ['class' => 'label-input']) }}
                                {{ Form::text('provincia', '', ['class' => 'input', 'id' => 'provincia']) }}
                                @if ($errors->first('provincia'))
                                <ul class="errors">
                                    @foreach ($errors->get('provincia') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>  -->
                            
                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('superficie', 'Superficie', ['class' => 'label-input']) }}
                                {{ Form::text('superficie', '', ['class' => 'input', 'id' => 'superficie']) }}
                                @if ($errors->first('superficie'))
                                <ul class="errors">
                                    @foreach ($errors->get('superficie') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
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
                
            </div>
                            
                            
                            
                            
                            
    

        <label>Filtri</label><br/>
        @foreach ($servizi as $servizio)
        
            <input type="checkbox" name="servizi[]" value="{{$servizio->nome}}"> {{$servizio->nome}}<br/>
        @endforeach
        
  
    

                            <!--<div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('discountPerc', 'Sconto (%)', ['class' => 'label-input']) }}
                                {{ Form::text('discountPerc', '', ['class' => 'input', 'id' => 'discountPerc']) }}
                                @if ($errors->first('discountPerc'))
                                <ul class="errors">
                                    @foreach ($errors->get('discountPerc') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('discounted', 'In Sconto', ['class' => 'label-input']) }}
                                {{ Form::select('discounted', ['1' => 'Si', '0' => 'No'], 1, ['class' => 'input','id' => 'discounted']) }}
                            </div>-->
            
                            <div class="container-form-btn">                
                            {{ Form::submit('Aggiungi Alloggio', ['class' => 'form-btn1']) }}
                            {{ Form::close() }}
                            <button type="reset">Reset</button>
                            </div>
                        </div>
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

