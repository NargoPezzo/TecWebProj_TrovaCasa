<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    


  <head>

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

https://templatemo.com/tm-571-hexashop

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
    <div class="container">
        @isset($faqs)
            @foreach ($faqs as $faq)
                <div class="row">
                    <ul style = "list-style-type: none">
                        <li>
                            <h3><strong>Domanda:</strong> {{ $faq->domanda }}</h3><br> 
                            <p><strong>Risposta:</strong> {{ $faq->risposta }}</p></li><br>
                            
                            @can('isAdmin')
                            @php
                            $id = urlencode($faq->id);
                            @endphp
                            <a href="{{route('chisiamo',['product_slug'=>$faq->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>                            
                            <a onclick="if (confirm('Eliminare la FAQ definitivamente?')) {
                                location.href = '{{route('eliminafaq', [$id])}}'; }"><i class="fa fa-times fa-2x text-danger"></i></a>
                            @endcan
                            
                            <br>
                            @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => "ques.gif"])
                    </ul>
                </div>        
            @endforeach
        @endisset()
    </div>


        <section>
            <h3>Modifica FAQ</h3>
            <?php
            $i = 0;
            ?>
            @foreach($faqs as $faq)
            <!--{{ Form::open(array('route' => 'modificafaq','method'=>'post', 'class' => 'contact-form', 'id' => 'form'.$i)) }}
            {{Form::hidden('vecchiadomanda', $faq->domanda)}}
            <div class="faq-element">-->
                <div class="wrap-contact1">
                    {{ Form::text('domanda', $faq->domanda, ['class' => 'input','id' => 'domanda', 'style'=>'font-weight: bold;width:50em','disabled'=>'disabled','required' => '']) }}
                </div>
                <div class="wrap-contact1">
                    {{ Form::textarea('risposta', $faq->risposta, ['class' => 'input','id' => 'risposta', 'disabled'=>'disabled', 'rows'=>'5', 'style'=>'width:58em','required' => '']) }}
                </div>
                <div style="display:inline-flex">
                    <div class="pencil_item faq" title="Modifica FAQ">
                        <img id="pencil" name="pencil" class="pencil action_item_clickable"
                            src="{{asset('css/themes/images/pencil.png')}}" alt="modifica FAQ">
                        <p id="pencil_text"><b>Modifica la FAQ</b></p>
                    </div> 
                </div>
            </div>
            <input id="salva" hidden type="submit" class="button clickable" value="Salva">
            <input type='reset' id='annulla' hidden class="button clickable" value="Annulla">
            {{ Form::close() }}
            <hr size="3" color="black" style="height:0.2px" />
            <?php $i = $i + 1; ?>
            @endforeach
            
            {{ Form::close() }}
        </section>
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

</html>

