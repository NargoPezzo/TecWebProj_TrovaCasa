<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Messaggi')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <style> 
    iframe {
  position:absolute;
  top:-150px;
  left:200px;
  width:100%;
}
    </style>

    
<script>
   
    var chat = document.getElementById('chat');
    chat = chat.contentWindow || chat.contentDocument.document || chat.contentDocument;
    chat.document.open();
    chat.document.write('Seleziona una chat');
    chat.document.close();
    
</script>


    
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
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Sezione messaggistica</h2>
                        <span>Più veloci di un piccione viaggiatore</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <br><br>
<div class="container">
    
            @isset($chats) 
            @foreach($chats as $chat)
                <div class="col-lg-2">
                    <div class="item">
                        <div class="thumb">
                        @if($chat->user1 == $authuser)
                            <div> <img src="assets/images/chat-user.png"> </div>
                            <h5><a href="{{ route('chat', [$chat->user2]) }}" target="chat"> {{$chat->user2}} </a></h5>
                        @else
                            <div> <img src="assets/images/chat-user.png"> </div>
                            <h5><a href="{{ route('chat', [$chat->user1]) }}" target="chat"> {{$chat->user1}} </a></h5>
                
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @endisset
                                     
                <div class="col-lg-8">
                    <iframe id="chat" src="" name="chat" width="100%" height="300" >   
                    </iframe>
                </div>
            
</div>            

    <br><br><br><br><br>


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

