<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Home')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <style>
    body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
    
    .fadein { 
        position:relative; height:600px; width:450px; margin:0 auto;
        padding: 10px;
    }
    
    .fadein img{
        position:absolute;
        width: calc(96%);
        height: calc(94%);
        object-fit: scale-down;
    }

</style>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(function(){
            $('.fadein img:gt(0)').hide();
            setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
    });
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


<script>
   
    var ifrm = document.getElementById('chatframe');
    ifrm = ifrm.contentWindow || ifrm.contentDocument.document || ifrm.contentDocument;
    ifrm.document.open();
    ifrm.document.write('Seleziona una chat');
    ifrm.document.close();
</script>






<div class="container-chat">
<h1 class=" text-center">Le tue conversazioni</h1>
<div class="messaging">
    <div id="CHAT"> </div>
      <div class="inbox_msg">
        <div class="inbox_people">
          
          <div class="inbox_chat">
            
            @isset($chat) 
            @foreach($chat as $singolachat)
            @if($singolachat->user1 == $authuser)
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5><a href="{{ route('chat', [$singolachat->user2]) }}" class="ancora-singolachat" target="chatframe"> {{$singolachat->user2}} </a></h5>
                </div>
              </div>
            </div>    
            @else
            <div class="chat_list">
              <div class="chat_people" >
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5><a href="{{ route('chat', [$singolachat->user1]) }}" class="ancora-singolachat" target="chatframe"> {{$singolachat->user1}} </a></h5>
                </div>
              </div>
            </div>
            @endif
            @endforeach
            @endisset
          </div>
        </div>
        <div class="mesgs">
            
              <iframe id="chatframe" src="" name="chatframe">
                  
              </iframe>
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

