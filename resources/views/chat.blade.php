<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TrovaCasa.it - @yield('title', 'Visualizza singola offerta')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css')}}">
    <style>
        #ricevuto {
            text-align: left;
            border: 1px solid #B8B8B8;
            height: auto;
            max-width: 300px;
             border-radius: 20px;
            
            display:block;
            padding:14px
            
        }
        
        #inviato {
            
            text-align: right;
            border: 2px solid black;
            max-width: 300px;
            height: auto;
            margin-right: 10px;
            margin-left: auto;
            display:block;
            padding: 14px;
            border-radius: 20px;
            
        }
        
        #image {
        
        
        max-width: 300px;
        }

        #element_block {
        display:block;
        }
        
        data {
           size: 8px; 
        }
        
    </style>
    
    </head>

<body>
@isset($messaggi)

<div class="about-us">
    
           
            @foreach($messaggi as $messaggio)  
                
                @if($messaggio->destinatario==$authuser)
                
                    <div id="element_block">
                        <div id="ricevuto">
                            <div id="image">
                            <p>{!! $messaggio->testo !!}</p>
                            <br>
                            <p><span id="data">{{ $messaggio->dataOraInvio }}</span></p>
                            </div>
                        </div>
                    </div>
                
                @else
                <div id="element_block">
                        <div id="inviato">
                            <div id="image">
                    <p>{!! $messaggio->testo !!}</p>
                    <br>
                    <p><span id="data">{{ $messaggio->dataOraInvio }}</span></p>
                </div>
            </div>            
        </div>    
                
                @endif
                <br><br>    
            @endforeach
           
    
    <br><br>
            

    
    <div class="type_msg">
            <div class="input_msg_write split2chat">
                <div>
                {{ Form::open(array('route' => 'messaggisticapost', 'id' => 'messaggio-form', 'method' => 'POST')) }}            
                {{ Form::token() }} 

                {{ Form::text('testo', '', ['id' => 'testo', 'placeholder' => 'Scrivi il tuo messaggio']) }}
                @if($errors->first('testo'))
                    <div class="errors" >
                        @foreach ($errors->get('testo') as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                
                </div>
                <div>
                {{ Form::submit('Invia', ['id'=>'send-message', 'class'=> 'ourblue']) }}
                </div>
                {{ Form::hidden('destinatario', $user, ['id' => 'destinatario']) }}
                
            </div>
              {{ Form::close() }}
    </div>
</div>


@endisset
</body>
</html>

