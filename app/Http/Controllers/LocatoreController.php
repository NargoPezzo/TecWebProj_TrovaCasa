<?php

namespace app\Http\Controllers;

use Carbon\Carbon;
use App\Models\Resources\House;
use App\Models\Resources\Services;
use App\Models\Resources\Opzione;
use App\Models\Resources\Messaggio;
use App\Models\Locatore;
use App\Models\Opzionato;
use App\User;
use App\Http\Request\NuovoAlloggioRequest;
use App\Http\Request\InviaMessaggioRequest;
use App\Http\Request\ModificaAlloggioRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Offerte;
use App\Models\HouseServices;
use App\Models\Resources\HouseService;


class LocatoreController extends Controller {

    protected $_locatoreModel;
    protected $_serviceModel;
    protected $_alloggioModel;
    protected $_opzionatoModel;
    protected $_houseserviceModel;
    protected $_offerteModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore;
        $this->_userModel = new User;
        $this->_serviceModel = new Services;
        $this->_alloggioModel = new House;
        $this->_offerteModel = new Offerte;
        $this->_opzionatoModel = new Opzionato;
        $this->_houseserviceModel = new HouseService;
    }

    public function index() {
        return view('home');
    }
    
    public function indexhome() {
        return view('homelocatore');
    }
    
    public function getMyAlloggi() {
        $id = Auth::id();
        $servizi = $this->_serviceModel->getServizi();
        $alloggi=$this->_locatoreModel->getAlloggi($id);
        $province = $this->_offerteModel->getProvList();
        return view('alloggi.gestiscialloggi')
                    ->with('houses', $alloggi)
                    ->with('servizi', $servizi)
                    ->with('province', $province);
    }
    
    public function createAlloggio() {
        $servizi = $this->_serviceModel->getServizi();
        $province = $this->_offerteModel->getProvList();
        Log::info($province);
        return view('alloggi.inseriscialloggio')
                    ->with('servizi', $servizi)
                    ->with('province', $province);
        
    }
    
    public function storeAlloggio(NuovoAlloggioRequest $request) {
         if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $alloggio = new House();
        $alloggio->locatore_id = Auth::id();
        $alloggio->data_inserimento= Carbon::now();
        $alloggio->fill($request->validated());

        $alloggio->immagine = $imageName;

        $alloggio->save();
    
        
        
    if  (!empty($request->servizi)){    
        foreach($request->servizi as $servizio){
          
            $houseservice = new HouseService();
            $houseservice->house_id = $this->_locatoreModel->lastAlloggio();
            $houseservice->services_id = $this->_serviceModel->servizioIdByName($servizio)->id;
            $houseservice->save();
            }
        
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        }
        
        
        
        return redirect()->action('LocatoreController@index');
        

    }
    
    public function createOpzione($house_id) {
        $opzione = new Opzione();
        $opzione->locatario_id = Auth::id();
        $opzione->house_id = $house_id;
        $opzione->save();
        
        session() -> flash('message', 'Richiesta inviata con successo!');
        return redirect()->route('offerte');

    }
    
    public function assegnaAlloggio($locatario_id, $house_id) {
        $opzione = $this->_opzionatoModel->assegnazione($locatario_id, $house_id);

        Log::info($opzione);
        session() -> flash('message', 'Assegnazione effettuata con successo!');
        
        return redirect()->route('gestiscialloggi');

    }

    public function editAlloggio(ModificaAlloggioRequest $request) {
        
        Log::info($request->id);
        $alloggio = $this->_alloggioModel->getSingleHouse($request->id);
        $alloggio->titolo = $request->titolo;
        $alloggio->prezzo = $request->prezzo;
        $alloggio->descrizione = $request->descrizione;
        $alloggio->tipologia = $request->tipologia;
        $alloggio->n_camere = $request->n_camere;
        $alloggio->n_posti_letto_totali = $request->n_posti_letto_totali;
        $alloggio->indirizzo = $request->indirizzo;
        $alloggio->cap = $request->cap;
        $alloggio->età_min = $request->età_min;
        $alloggio->età_max = $request->età_max;
        $alloggio->superficie = $request->superficie;
        $alloggio->data_min = $request->data_min;
        $alloggio->data_max = $request->data_max;
        $alloggio->genere = $request->genere;
        
        $alloggio->save();
        
        $this->_houseserviceModel->deleteHouseServizioById($alloggio->id);
        

     if (!empty($request->servizi)) {   
        foreach($request->servizi as $servizio){
            
            
            $houseservice = new HouseService();
            $houseservice->house_id = $alloggio->id;
            $houseservice->services_id = $this->_serviceModel->servizioIdByName($servizio)->id;
             Log::info($houseservice);
            $houseservice->save();
            }   
        }
        $servizi = $this->_serviceModel->getServizi();
        return redirect()->route('gestiscialloggi')
                    ->with('servizi', $servizi);
        
    }

    public function deleteAlloggio($id)  {
        
        $alloggio = $this->_alloggioModel->getSingleHouse(urldecode($id));
        
        $alloggio -> delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        return redirect()->route('gestiscialloggi');

    }

    public function deleteFaq($id)
    {
        $faq = $this->_faqsModel->getSingleFaq(urldecode($id));
        $faq->delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        return redirect()->route('faq');
    }
    
    public function sendMessaggio(InviaMessaggioRequest $request){
        $messaggio = new Messaggio;
        $request->validated();           
        
        $user = auth()->user();                
        $messaggio->mittente = $user->username;
        
        $messaggio->destinatario = $this->_userModel->getDestById($request->get('destinatario'));
        $messaggio->testo = $request->get('testo');       
        $messaggio->dataOraInvio = date("Y-m-d H:i:s"); 
        
        $messaggio->save();
        
        $chat = $this->_userModel->getChat($user->username, $messaggio->destinatario);
        
        if(!$chat) {
            $chat = new Chat();
            $chat->user1 = $user->username;
            $chat->user2 = $messaggio->destinatario;
            
            $chat->save();
        }
        return redirect()->route('messaggistica');
    }
    
    public function getCittà($provincia) {
        $city = $this->_offerteModel->getCittàList($provincia);
        $response = [];
        $i = 0;
        foreach ($city as $p) {
            $response[$i] = $p;
            $i++;
        }
        return response()->json($response);
    }
    
    
}
