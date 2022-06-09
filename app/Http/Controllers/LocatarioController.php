<?php

namespace app\Http\Controllers;
use App\Models\Resources\House;
use App\Models\Resources\Opzione;
use App\User;
use Illuminate\Support\Facades\Auth;

//use App\Models\Admin;

class LocatarioController extends Controller {

   protected $_locatarioModel;
    
   protected $_houseModel;
    

    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_locatarioModel = new User;
        $this->_houseModel = new House;
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
    
    public function createOpzione($house_id) {
        $opzione = new Opzione();
        $opzione->locatario_id = Auth::id();
        $opzione->house_id = $house_id;
        $opzione->save();
        
        session() -> flash('message', 'Richiesta inviata con successo!');
        return redirect()->route('offerte');

    }
    
    public function sendOpzione(OpzioneRequest $request){
        Log::info($request);
        $opzione = new Opzione;
        $opzione->fill($request->validated());
        $opzione->save();
        
        return view('offertasingola');
    }
}