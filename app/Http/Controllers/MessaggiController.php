<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Resources\Messaggio;
use App\Http\Request\InviaMessaggioRequest;
use Illuminate\Support\Facades\Auth;

class MessaggiController extends Controller {
    
    protected $_userModel;

    public function __construct() {
        
        $this->_userModel = new User;
    }
    
    public function showChat() {

        $chat = $this->_userModel->getChat(Auth()->User()->username);
        $messaggi = $this->_userModel->getMessaggi($chat);
        
        return view('messaggistica')
            ->with('authuser', Auth()->User()->username)
            ->with('chats', $chat)
            ->with('messaggi', $messaggi);
    }
    
    public function showUserChat($user) {
        
        $messaggi = $this->_userModel->getMessaggiUser($user);
        
        return view('chat')
            ->with('authuser', Auth()->User()->username)
            ->with('messaggi', $messaggi)
            ->with('user', $user);
    }
    
    public function sendMessaggio(InviaMessaggioRequest $request){
        $messaggio = new Messaggio;
        $request->validated();

        $user = auth()->user();
        $messaggio->mittente = $user->username;
        $messaggio->destinatario = $request->get('destinatario');
        $messaggio->testo = $request->get('testo');       
        $messaggio->dataOraInvio = date("Y-m-d H:i:s"); 
        
        $messaggio->save();
        
        $messaggi = $this->_userModel->getMessaggiUser($request->get('destinatario'));
        
        return view('chat')
                ->with('authuser', auth()->user()->username)
                ->with('user', $request->get('destinatario'))
                ->with('messaggi', $messaggi);
    }
    
}