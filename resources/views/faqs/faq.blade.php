<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    


  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
        #Myform{
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
                $('.contact-form, #Myform').slideToggle();
              });
            });
        </script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Condizioni')</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop -->

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
                        <h2>F.A.Q.</h2>
                            <span>Abbiamo sempre la risposta pronta</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
   

<!--<div><h1>Sezione domande frequenti:</h1></div> -->
@can('isAdmin') 
<section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                             <a id="Mybtn"><i class="fa fa-edit fa-2x text-info"></i></a>
                            <span>Clicca qui per modificare le F.A.Q., oppure clicca sul tasto apposito per eliminarne una.</span><br>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    <div class="container">
        
        @isset($faqs) 
            @foreach ($faqs as $faq)
                @php
                $id = urlencode($faq->id);
                @endphp
                
                <div class="row">
                    <ul style = "list-style-type: none">
                        <li>
                            
                            <h3><strong>Domanda:</strong> {{ $faq->domanda }}</h3><br> 
                            <p><strong>Risposta:</strong> {{ $faq->risposta }}
                                @can('isAdmin') 
                            <a onclick="if (confirm('Eliminare la FAQ definitivamente?')) {
                                href = '{{route('eliminafaq', [$id])}}'; }"><i class="fa fa-times fa-2x text-danger"></i></a> 
                                @endcan
                            </p></li>
                            
                            
                                {{ Form::model($faq, array('route' => 'modificafaq', 'class' => 'contact-form', 'id' => 'Myform')) }}
                                {{ Form::hidden('id', $faq->id) }}<br>
                                <p id="pencil_text"><b>Modifica la FAQ</b></p>
                                    <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova domanda:</label>
                                        {{ Form::text('domanda', $faq->domanda, ['class' => 'input','id' => 'domanda', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                <div class="faq-element">
                                        <div class="wrap-contact1">
                                        <label>Nuova risposta:</label>
                                        {{ Form::text('risposta', $faq->risposta, ['class' => 'input','id' => 'domanda', 'style'=>'font-weight: bold;width:50em', 'required' => '']) }}
                                        </div>
                                    </div>
                                {{ Form::submit('Modifica', ['id' => 'form']) }}
                                {{ Form::close() }}
                            <br>
                            @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => "ques.gif"])
                        </ul>
                    </div> 
            @endforeach
        @endisset()


                                                        </div>

    </body>


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

    

  </body>

</html>

