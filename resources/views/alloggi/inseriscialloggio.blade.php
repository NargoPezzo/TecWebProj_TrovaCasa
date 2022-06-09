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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                $("#città").append(new Option(elem, elem));
            });
        },
        contentType: false,
        processData: false
    });
}
</script>

<script>
    $(function () {
        $('#provincia').append('<option selected disabled>Scegli la provincia</option>');
        @foreach($province as $provincia)
        $('#provincia').append(new Option("{!!$provincia!!}", "{!!$provincia!!}"));
        @endforeach
        $('#provincia').change(function () {
            var province = $('#provincia option:selected').text();
            var cityUrl = "{{route('insertcity', '')}}" + "/" + province;
            $('#città').find('option').remove();
            $('#città').append('<option selected disabled>Scegli la città</option>');
            getCity(cityUrl);
        });
    });
</script>
  <!-- Custom styles -->

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
    <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                        {{ Form::open(array('route' => 'inseriscialloggio.store', 'id' => 'houses', 'files' => true, 'class' => 'contact-form')) }}

                        <b>{{ Form::label('titolo', 'Titolo:', ['class' => 'label-input']) }}</b>
                                {{ Form::text('titolo', '', ['class' => 'input', 'id' => 'titolo', 'style'=>'width:13em']) }}
                                @if ($errors->first('titolo'))
                                <ul class="errors">
                                    @foreach ($errors->get('titolo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                </div>

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
                <div class="col-lg-3">
                                <b>{{ Form::label('tipologia', 'Tipologia:', ['class' => 'label-input']) }}</b> 
                                {{ Form::select('tipologia', ['appartamento' => 'Appartamento', 'posto_letto_singolo' => 'Posto letto (singolo)', 'posto_letto_doppio' => 'Posto letto (doppio)'], ['class' => 'input','id' => 'tipologia']) }}
                </div>
                            <div class="col-lg-3">
                            <span class="search">
                                <b><label for="provincia" class="control">Provincia:</label></b>
                                <select name="provincia" id="provincia">
                                </select>
                            </span>
                            <br>
                            <span class="search">
                                <b><label for="città" class="control">Città:</label></b>
                                <select id="città" name="città" size="1">
                            </select>
                            </span>
                            <br><br>
                            </div>
            </div>
            <b>{{ Form::label('immagine', 'Immagine:', ['class' => 'label-input']) }}&nbsp;&nbsp;&nbsp;</b>
                                {{ Form::file('immagine', ['class' => 'input', 'id' => 'immagine']) }}
                                @if ($errors->first('immagine'))
                                <ul class="errors">
                                    @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            
                                <br><br>
                            
                        <b>{{ Form::label('descrizione', 'Descrizione: ', ['class' => 'label-input']) }}</b><br>
                                {{ Form::textarea('descrizione', '', ['class' => 'input', 'id' => 'descrizione', 'style'=>'width:35em;height:7em']) }}
                                @if ($errors->first('descrizione'))
                                <ul class="errors">
                                    @foreach ($errors->get('descrizione') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif


    <br><br>
        <div class="row">
            <div class="col-lg-3">
                                <b>{{ Form::label('prezzo', 'Prezzo:', ['class' => 'label-input']) }}</b>
                {{ Form::number('prezzo', '', ['class' => 'input', 'id' => 'prezzo','min' => '0','style'=>'width:5em']) }} € al mese
                                @if ($errors->first('prezzo'))
                                <ul class="errors">
                                    @foreach ($errors->get('prezzo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
            <div class="col-lg-3">

                                <b>{{ Form::label('n_camere', 'Numero Camere:', ['class' => 'label-input']) }}</b>
                                {{ Form::number('n_camere', '', ['class' => 'input', 'id' => 'n_camere','min' => '0', 'style'=>'width:5em']) }}
                                @if ($errors->first('n_camere'))
                                <ul class="errors">
                                    @foreach ($errors->get('n_camere') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

            <div class="col-lg-3">
                 <b>{{ Form::label('n_posti_letto_totali', 'N° Posti Letto Totali:', ['class' => 'label-input']) }} </b>
                                {{ Form::number('n_posti_letto_totali', '', ['class' => 'input', 'id' => 'n_posti_letto_totali','min' => '0', 'style'=>'width:5em']) }}
                                @if ($errors->first('n_posti_letto_totali'))
                                <ul class="errors">
                                    @foreach ($errors->get('n_posti_letto_totali') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
        </div>
    <br><br>
    <b>Limiti di Età (Facoltativo):</b><br><br>
        <div class="row">               
             <div class="col-lg-2"           
            {{ Form::label('età_min', 'Da:', ['class' => 'label-input']) }} &nbsp;
                                {{ Form::number('età_min', '', ['class' => 'input', 'id' => 'età_min', 'min' => '18', 'style'=>'width:5em']) }} anni
                                @if ($errors->first('età_min'))
                                <ul class="errors">
                                    @foreach ($errors->get('età_min') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
            <div class="col-lg-2"  
                                {{ Form::label('età_max', 'A:', ['class' => 'label-input']) }} 
                                {{ Form::number('età_max', '', ['class' => 'input', 'id' => 'età_max','min' => '18', 'style'=>'width:5em']) }} anni
                                @if ($errors->first('età_max'))
                                <ul class="errors">
                                    @foreach ($errors->get('età_max') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

        
                       
        
            <div class="col-lg-3">
                                <b>{{ Form::label('indirizzo', 'Indirizzo:', ['class' => 'label-input']) }}</b>
                                {{ Form::text('indirizzo', '', ['class' => 'input', 'id' => 'indirizzo', 'style'=>'width:10em']) }}
                                @if ($errors->first('indirizzo'))
                                <ul class="errors">
                                    @foreach ($errors->get('indirizzo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
            <div class="col-lg-3">                

                                <b>{{ Form::label('cap', 'CAP:', ['class' => 'label-input']) }}</b>
                                {{ Form::text('cap', '', ['class' => 'input', 'id' => 'cap','style'=>'width:7em']) }}
                                @if ($errors->first('cap'))
                                <ul class="errors">
                                    @foreach ($errors->get('cap') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
        </div>                    

                            <br><br><b>Periodo di disponibilità:</b><br><br> 
                        <div class="row">
                            <div class="col-lg-3">
                                {{ Form::label('data_min', 'Da:', ['class' =>'label-input']) }}
                                {{ Form::date('data_min', '', ['class' => 'input', 'id' =>'data_min'])}}

                                @if ($errors->first('data_min'))
                                <div class="errors" >
                                        @foreach ($errors->get('data_min') as $message)
                                        <p>{{ $message }}</p>
                                        @endforeach
                                </div>
                                @endif
                            </div>

                       <div class="col-lg-3">
                                {{ Form::label('data_max', 'A:', ['class' =>'label-input']) }}
                                {{ Form::date('data_max', '', ['class' => 'input', 'id' =>'data_max'])}}

                                @if ($errors->first('data_max'))
                                <div class="errors" >
                                        @foreach ($errors->get('data_max') as $message)
                                        <p>{{ $message }}</p>
                                        @endforeach
                                </div>
                                @endif
                            </div> 
                        <div class="col-lg-3">    
                            <b>{{ Form::label('superficie', 'Dimensioni:', ['class' => 'label-input']) }}</b>
                                {{ Form::number('superficie', '', ['class' => 'input', 'id' => 'superficie', 'style'=>'width:5em']) }} mq
                                @if ($errors->first('superficie'))
                                <ul class="errors">
                                    @foreach ($errors->get('superficie') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                        </div>
                        </div>       

                <div class="row">
                    <div class="col-lg-3">
                    <br><br>       
                            <label for="gender">
                
                                <b> Preferenza di sesso: </b><br>
                
            </label>

            
                <br><input type="radio" name="genere" id="genereU1" value="M">
                    <label for="genereU1">
                        <div>
                        Uomo 
                        </div>
                    </label>
            

            
                <br><input class="wrap-input-input" type="radio" name="genere" id="genereD1" value="F">
                    <label class="wrap-input-label" for="genereD1">
                        <div>
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

                    <div class="col-lg-9">               
                            
                            
                            
    

                        <br><br><b><label>Filtri:</label></b><br/>
                            @foreach ($servizi as $servizio)
                            <input type="checkbox" name="servizi[]" value="{{$servizio->nome}}"> {{$servizio->nome}}&nbsp;
                            @endforeach
                    </div>
                </div>    

                            <br><br><div class="container-form-btn">                
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