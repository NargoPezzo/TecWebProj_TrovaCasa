<?php

namespace app\Http\Controllers;

use Carbon\Carbon;
use App\Models\Resources\House;
use App\Models\Resources\Services;
use App\Models\Locatore;
use App\User;
use App\Http\Request\NuovoAlloggioRequest;
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
    protected $_houseservicesModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore;
        $this->_serviceModel = new Services;
        $this->_alloggioModel = new House;
        $this->_houseservicesModel = new HouseServices;
    }

    public function index() {
        return view('home');
    }
    
    public function indexhome() {
        return view('homelocatore');
    }
    
    public function getMyAlloggi() {
        $id = Auth::id();
    //  $alloggi = House::where('locatore_id', $id) -> get();
        $alloggi=$this->_locatoreModel->getAlloggi($id);
        return view('alloggi.gestiscialloggi')
                    ->with('houses', $alloggi);
    }
    
    public function createAlloggio() {
        $servizi = $this->_serviceModel->getServizi();
        return view('alloggi.inseriscialloggio')
                    ->with('servizi', $servizi);
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
        
        
        //$servizi = Services::find([3, 4]); al posto di 3,4 carico l'array che viene dal form
        // $alloggio->servizi()->attach($servizi);
        $alloggio->save();
    
        
        
        
        foreach($request->servizi as $servizio){
          
            $houseservice = new HouseService();
            $houseservice->house_id = $this->_locatoreModel->lastAlloggio();
            $houseservice->services_id = $this->_serviceModel->servizioIdByName($servizio)->id;
             Log::info($houseservice);
            $houseservice->save();
  
       
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        }
        
        
        
        return redirect()->action('LocatoreController@index');
        
        
        
        /*$faq = new Faq;
        $faq->fill($request->validated());
        
        $faq->save();

        return redirect()->action('AdminController@index');
        
        $request->locatore_id = Auth::User()->id;
        
        Log::info('$request');
        
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
            Log::info($imageName);
        } else {
            $imageName = NULL;
        }
        
        $inputs = $request->all();
       
        $alloggi = House::Create($inputs);
        
        $alloggi->immagine = $imageName;
        $alloggi->save();
        
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        }

        return redirect()->action('LocatoreController@indexhome');*/

        
        
    }
    
    


public function editAlloggio(ModificaAlloggioRequest $request) {
        
        $alloggio = $this->_alloggioModel->getSingleHouse($request->id);
        $alloggio->titolo = $request->titolo;
        $alloggio->prezzo = $request->prezzo;
        $alloggio->descrizione = $request->descrizione;
        $alloggio->tipologia = $request->tipologia;
        $alloggio->n_camere = $request->n_camere;
        $alloggio->n_posti_letto_totali = $request->n_posti_letto_totali;
        $alloggio->indirizzo = $request->indirizzo;
        $alloggio->cap = $request->cap;
        $alloggio->città = $request->città;
        $alloggio->provincia = $request->provincia;
        $alloggio->superficie = $request->superficie;
         
            //'immagine' => 'image|max:1024',
            //"servizi"    => '',
        $alloggio->save();
        return redirect()->route('gestiscialloggi');
        
    }

    public function deleteAlloggio($id)  {
        
        $alloggio = $this->_alloggioModel->getSingleHouse(urldecode($id));
        
        //$alloggio = House::find($id);
        $alloggio -> delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        return redirect()->route('gestiscialloggi');
        /*House::destroy($id);
        return redirect()->route("");*/
    }
    
    public function deleteFaq($id)
    {
        $faq = $this->_faqsModel->getSingleFaq(urldecode($id));
        $faq->delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        return redirect()->route('faq');
    }
}
