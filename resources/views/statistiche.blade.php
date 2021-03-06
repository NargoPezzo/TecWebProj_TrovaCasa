<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Statistiche')</title>

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
                        
                        @include('layouts/navpublic')
                        
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
                        <h2>Sezione Statistiche</h2>
                        <span>Analizzare non ?? per tutti</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

@if (auth()->user('admin'))
{{Form::open(array('route' => 'admin.stats.search', 'id' => 'filter-form', 'files' => false, 'method'=>'GET' )) }}
    <div class="container">
        <div class="row  justify-content-center  align-center align-items-center">
        
            <div class ="col-lg-1">
                {{ Form::label('type', 'Tipo:', ['for'=>'type']) }}
            </div>
            <div class ="col-lg-2">
                {{ Form::select('type', ['alloggio' => 'alloggio', 'appartamento' => "appartamento", 'posto_letto' => "posto letto"], old("type"), ['class' => 'form-control ms-5']) }}
                </div>
            </div>
            
            
            
            <div class="col-lg-3">
                {{ Form::label('start-date', 'Da:', ['class' => 'col-sm-3 col-form-label', 'for' => 'start-date']) }}
                
                {{ Form::date('start-date', "", ['value' => null]) }}
                
                    @if ($errors->first('start-date'))
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        @foreach ($errors->get('start-date') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                        </div>
                    </div>    
                    @endif         
            </div>

            <div class="col-lg-3">
                {{ Form::label('end-date', 'A:', ['class' => 'col-sm-3 col-form-label', 'for' => 'end-date']) }}
                
                {{ Form::date('end-date', "", ['value' => null]) }}
                
                </div>
            <div class="col-lg-2">
                  @if ($errors->first('end-date'))
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        @foreach ($errors->get('end-date') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                        </div>
                    </div>    
                    @endif  
            <div class="text-center col pt-2 ps-4">
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2 ms-5']) }}
            </div>
        </div>
    </div> 
    {{Form::close()}}
    <br><br><br>
    <div class="container">
        <div class="justify-content-center row align-center align-items-center">
            <div class ="col-lg-5">
                <p> Offerte di Alloggio </p>
                <div class="col-sm-10 ps-3">
                    @if(Route::is('admin.stats.search'))                    
                    {{$contatore_alloggi}}
                    @endif
                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <p> Offerte di Locazione </p>
                <div class="col-sm-9 ps-3">
                    @if(Route::is('admin.stats.search'))
                    {{$contatore_richieste}}
                    @endif
                </div>    
            </div>
            
           <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <p> Alloggi Locati </p>
                <div class="col-sm-9 ps-3">
                    @if(Route::is('admin.stats.search'))                    
                    {{$contatore_opzionati}}
                    @endif
                </div>    
            </div> 
        </div>
    </div> 

@endif


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

