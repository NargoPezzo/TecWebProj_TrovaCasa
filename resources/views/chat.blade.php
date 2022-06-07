<html>
<head>

    <script src="https://kit.fontawesome.com/ea82011960.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accountstyle.css') }}">
   
</head>

<body>
@isset($messaggi)

<div class="msg_history">
            
            @foreach($messaggi as $messaggio)  
                
                @if($messaggio->destinatario==$authuser)
                <div class="received_msg">
                 <div class="received_withd_msg">
                  <p>{!! $messaggio->testo !!}</p>
                  <span class="time_date">{{ $messaggio->dataOraInvio }}</span></div>
                </div>
                @else
                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>{!! $messaggio->testo !!}</p>
                    <span class="time_date">{{ $messaggio->dataOraInvio }}</span> </div>
                </div>
                
                @endif
                
            @endforeach
</div>
    
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
@endisset
</body>
</html>

