@extends('layouts.public')

@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('css/accountstyle.css') }}">
@parent
@endsection

@section('scripts')
@parent
<script>
   
    var ifrm = document.getElementById('chatframe');
    ifrm = ifrm.contentWindow || ifrm.contentDocument.document || ifrm.contentDocument;
    ifrm.document.open();
    ifrm.document.write('Seleziona una chat');
    ifrm.document.close();
</script>
@endsection

@section('title', 'Messaggi')


@section('content')
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
 




@endsection