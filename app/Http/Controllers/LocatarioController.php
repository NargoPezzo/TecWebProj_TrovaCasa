<?php

namespace app\Http\Controllers;
use App\Models\Resources\House;

//use App\Models\Admin;

class LocatarioController extends Controller {

//    protected $_locatarioModel;

    public function __construct() {
        $this->middleware('can:isLocatario');
//        $this->_locatarioModel = new Locatario;
    }

    public function index() {
        $this->_houseModel = new House;
        $alloggi = $this->_houseModel->getAlloggiByDate();
                return view('home')
                ->with('alloggi', $alloggi);
    }
    
    
    
   /* public function indexoffertelocatario() {   POTREBBE ESSERE INUTILE
        return view('offertelocatario');
    } */
  
    
    
    public function sendMessaggio(NuovoMessaggioRequest $request){
        $messaggio = new Messaggio;
        $request->validated();           
        
        $user = auth()->user();                
        $messaggio->mittente = $user->username;
        $messaggio->destinatario = $request->get('destinatario');
        $messaggio->testo = $request->get('testo');       
        $messaggio->dataOraInvio = date("Y-m-d H:i:s"); 
        
        $messaggio->save();
        
        $chat = $this->_locatarioModel->getChat($user->username, $request->get('destinatario'));
        
        if(!$chat) {
            $chat = new Chat();
            $chat->user1 = $user->username;
            $chat->user2 = $request->get('destinatario');
            
            $chat->save();
        }
        
        return redirect()->action('LocatarioController@index');
    }
}