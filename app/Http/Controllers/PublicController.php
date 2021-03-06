<?php

namespace App\Http\Controllers;

use App\Models\Offerte;
use App\User;
use App\Models\Resources\House;
use App\Models\Faqs;
use App\Models\Resources\Services;
use App\Models\Resources\Messaggio;
use App\Http\Request\RicercaOfferteRequest;
use App\Http\Request\InviaMessaggioRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PublicController extends Controller {
    
    protected $_offerteModel;
   
    protected $_faqsModel;
    
    protected $_houseModel;
    
    protected $_userModel;

    public function __construct() {
        $this->_offerteModel = new Offerte;
        
        $this->_faqsModel = new Faqs;
        
        $this->_houseModel = new House;
        
        $this->_serviziModel = new Services;
        
        $this->_userModel = new User;
    }
    
    public function showOfferte() {
        
        $tipologie = $this->_houseModel->getTipologiaList();
        $province = $this->_offerteModel->getProvList();
        $servizi = $this->_serviziModel->getServizi();
        $alloggi = $this->_offerteModel->getAlloggi();
        
        return view('offerte')
                        ->with('houses', $alloggi)->with('province', $province)->with('tipologie', $tipologie)->with('servizi', $servizi);
    }
    
    public function showOfferteFiltrate(RicercaOfferteRequest $request) {
        
        $tipologie = $this->_houseModel->getTipologiaList();
        $province = $this->_offerteModel->getProvList();
        $acittà = $request->acittà;
        $plcittà = $request->plcittà;
        $prezzomin = $request->prezzomin;
        $prezzomax = $request->prezzomax;
        $data_min = $request->data_min;
        $data_max = $request->data_max;
        $superficie = $request->superficie;
        $n_camere = $request->n_camere;
        $n_posti_letto_totali = $request->n_posti_letto_totali;
        $servizi = $this->_serviziModel->getServizi();
        

        $request_servizi = $request->servizi;
        if (isset($request_servizi) && is_null($request_servizi[0])) {
            $request_servizi[0] = 11;
            
            
            
            
        }

        
        $alloggi = $this->_offerteModel->getHousesFiltered($request->tip, $request->aprov, $request->plprov, $acittà, $plcittà, $prezzomin, $prezzomax, $data_min, $data_max, $superficie, $n_camere, $n_posti_letto_totali, $request_servizi);
        
        return view('offerte')->with('houses', $alloggi)->with('province', $province)->with('acittà', $acittà)->with('plcittà', $plcittà)->with('tipologie', $tipologie)->with('prezzomin', $prezzomin)->with('prezzomax', $prezzomax)
                ->with('data_min', $data_min)->with('data_max', $data_max)->with('superficie', $superficie)->with('n_camere', $n_camere)->with('n_posti_letto_totali', $n_posti_letto_totali)
                ->with('servizi', $servizi);
    }
    
    public function showOfferta($id) {
      if(House::where('id', $id)->exists())
      {
          $alloggi = House::find($id);  // creare metodo nel model house così richiamo solo metodo 
          $servizi = $this->_houseModel->servizi();
          $richieste = $this->_userModel->getRichieste($id);
          Log::info('showOfferta');
          Log::info($richieste);
          return view('offertasingola') 
                        ->with('alloggi', $alloggi)
                        ->with('servizi', $servizi)
                        ->with('richieste', $richieste);
      }
      else {
          return redirect('/offerte')->with('status','The link was broken');
      }
    }
    
    public function showFaqs() {
        
        $faqs = $this->_faqsModel->getFaqs();
        
        return view('faqs.faq')
                        ->with('faqs', $faqs);
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
