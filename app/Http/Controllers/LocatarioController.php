<?php

namespace app\Http\Controllers;

use App\Models\Resources\House;
use App\Models\Resources\Opzione;
use App\Models\Resources\Messaggio;
use App\Models\Resources\Chat;
use App\User;
use App\Http\Request\InviaMessaggioRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

//use App\Models\Admin;

class LocatarioController extends Controller {

    protected $_userModel;

    protected $_houseModel;
    

    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_userModel = new User;
        $this->_houseModel = new House;
    }

    public function index() {
        $this->_houseModel = new House;
        $alloggi = $this->_houseModel->getAlloggiByDate();
                return view('home')
                ->with('alloggi', $alloggi);
    }

    public function sendMessaggio(InviaMessaggioRequest $request){
        $message = new Messaggio;
        $request->validated();           
        $user = auth()->user();                
        $message->mittente = $user->username;
        $message->destinatario = $this->_userModel->getDestById($request->get('destinatario'));
        $message->testo = $request->get('testo');       
        $message->dataOraInvio = date("Y-m-d H:i:s"); 
        $message->save();
        $chat = $this->_userModel->getSingleChat($user->username, $message->destinatario);
        if(!$chat) {
            $chat = new Chat();
            $chat->user1 = $user->username;
            $chat->user2 = $message->destinatario;
            $chat->save();
        }
        return redirect()->route('messaggistica');
    }

    public function createOpzione($house_id) {
        $opzione = new Opzione();
        $opzione->locatario_id = Auth::id();
        $opzione->house_id = $house_id;
        $opzione->save();
        
        session() -> flash('message', 'Richiesta inviata con successo!');
        return redirect()->route('offerte');

    }
    
    public function sendOpzione(OpzioneRequest $request){
        $opzione = new Opzione;
        $opzione->fill($request->validated());
        $opzione->save();
        
        return view('offertasingola');
    }
}