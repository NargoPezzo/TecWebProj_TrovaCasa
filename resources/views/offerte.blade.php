<!DOCTYPE html>
<html lang="en">

  <head>
      <script>
    window.onload = function () {
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
    document.getElementById("month").value =
            "<?php
                    if (old('month')!=null) {
                         echo old('month');
                    } else {
                         echo isset($_POST['month']) ? $_POST['month'] : '';
                    }
                ?>";
    document.getElementById("year").value =
            "<?php
                    if (old('year')!=null) {
                         echo old('year');
                    } else {
                         echo isset($_POST['year']) ? $_POST['year'] : '';
                    }
                ?>";
    document.getElementById("desc").value =
            "<?php
                    if (old('desc')!=null) {
                         echo old('desc');
                    } else {
                         echo isset($_POST['desc']) ? $_POST['desc'] : '';
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

<section>
        <div class="outer_search">
            <div>
                <p style="padding:20px;float:left">
                    <b>Ricerca<br>avanzata</b>
                </p>
            </div>

            <form method="post" id="search" name="search" enctype="multipart/form-data"
                action="{{route('offerte.search')}}">
                @csrf
                <span class="search">
                    <label for="tip" class="control">Tipologia</label>
                    <select name="tip" id="tip">
                        @foreach ($tipologie as $tipologia)
                        <option>{{$tipologia}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="search">
                   <label for='prezzomin' class="control">Prezzo min</label>
                   <input name ="prezzomin" id="prezzomin" type="range" min="0" max="1000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output>400</output>
                    @isset($prezzomin)
                        <option>{{$prezzomin}}</option>
                    @endisset
                </span>
                <span class="search">
                    <label for='prezzomax' class="control">Prezzo max</label>
                   <input name ="prezzomax" id="prezzomax" type="range" min="0" max="1000" step="25"
                   oninput="this.nextElementSibling.value = this.value">
                    <output>400</output>
                    @isset($prezzomax)
                        <option>{{$prezzomax}}</option>
                    @endisset
                </span>
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






    <div class="container-contact">
        <center><div class="wrap-contact1">
                <b> FILTRI: </b>
    
        <div class="wrap-input">
            <input class="wrap-input-input" type="checkbox" value="" id="localericreativo">
                <label class="wrap-input-label" for="localericreativo">
                Locale Ricreativo
                </label>
        </div>
            
        <div class="wrap-input">
            <input class="wrap-inputi-nput" type="checkbox" value="" id="lavatrice">
                <label class="wrap-input-label" for="lavatrice">
                Lavatrice
                </label>
        </div>

        <div class="wrap-input">
            <input class="wrap-inputi-nput" type="checkbox" value="" id="wifi">
                <label class="wrap-input-label" for="wifi">
                Wifi
                </label>
        </div>

        <div class="wrap-input">
            <input class="wrap-inputi-nput" type="checkbox" value="" id="postoauto">
                <label class="wrap-input-label" for="postoauto">
                Posto Auto
                </label>
        </div>

        <div class="wrap-input">
            <input class="wrap-inputi-nput" type="checkbox" value="" id="asciugatrice">
                <label class="wrap-input-label" for="asciugatrice">
                Asciugatrice
                </label>
        </div> 
            
        <div class="wrap-input">
            <input class="wrap-inputi-nput" type="checkbox" value="" id="angolostudio">
                <label class="wrap-input-label" for="angolostudio">
                Angolo Studio
                </label>
        </div>             
            
            
                </div></center>
    </div>


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

