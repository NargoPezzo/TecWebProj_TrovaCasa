<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Inserisci F.A.Q.')</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop -->
<!--
<style>
            ._error {
                background-color: #f3e4e4;
                border: solid 2px #ff0000;
            }
</style>
<script type="text/javascript">
            $(function () {
                $(':input').on('change', function (event) {
                    var element = $(this);
                    element.removeClass('_error');
                    switch (element.attr('id')) {
                        case 'name':
                            var pattern = /^([A-Za-z0-9_\-\.\@])+$/;
                            if (!pattern.test(element.val())) {
                                element.addClass('_error');
                            }
                            break;
                        case '_passwd':
                            if (element.val().length < 6) {
                                element.addClass('_error');
                            }
                            break;
                        case 'email':
                            var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/;
                            if (!pattern.test(element.val())) {
                                element.addClass('_error');
                            }
                            break;
                    }
                    ;
                });

                $('form').on('submit', function (event) {
                    $(':input').trigger('change');
                    if ($(':input').filter('[class*=_error]').length != 0) {
                        return false;
                    }
                    ;
                });
            });
        </script>-->
<script type="text/javascript" src="resources/js/app.js"></script>
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
                        <h2>Inserisci F.A.Q.</h2>
                            <span>Occorre una risposta ad ogni domanda</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="static">
    

    <div class="container-contact">
       
        <center><div class="wrap-contact1">
            {{ Form::open(array('route' => 'inseriscifaq.store', 'class' => 'contact-form')) }}

            <div  class="wrap-input">
                {{ Form::label('domanda', 'Domanda', ['class' => 'label-input']) }}<br>
                {{ Form::textarea('domanda', '', ['class' => 'input', 'id' => 'domanda']) }}
                @if ($errors->first('domanda'))
                <ul class="errors">
                    @foreach ($errors->get('domanda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>

            <div  class="wrap-input">
                {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}<br>
                {{ Form::textarea('risposta', '', ['class' => 'input', 'id' => 'risposta']) }}
                @if ($errors->first('risposta'))
                <ul class="errors">
                    @foreach ($errors->get('risposta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div><br><br>
            
            
            
            
            
            
            
            <div class="container-form-btn">                
                {{ Form::submit('Inserisci Faq', ['class' => 'form-btn1']) }}
                {{ Form::close() }}
            <button type="reset">Reset</button>
            </div><br><br>
            
                </div></center>
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

