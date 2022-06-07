<?php

namespace App\Http\Controllers;

use App\Models\Offerte;
use App\Models\Resources\House;
use App\Models\Faqs;
use App\Models\Resources\Services;
use App\Http\Request\RicercaOfferteRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller {
    
    protected $_offerteModel;
   
    protected $_faqsModel;
    
    protected $_houseModel;

    public function __construct() {
        $this->_offerteModel = new Offerte;
        
        $this->_faqsModel = new Faqs;
        
        $this->_houseModel = new House;
        
        $this->_serviziModel = new Services;
    }
    
    public function showOfferte() {
        
/*      //Appartamenti
        $appartamenti = $this->_offerteModel->getAppartamenti();
        
        //Posti Letto Singoli
        $postiLettoSingoli = $this->_offerteModel->getPostiLettoSingoli();
        
        //Posti Letto Doppi
        $postiLettoDoppi = $this->_offerteModel->getPostiLettoDoppi();*/
        
        
        $tipologie = $this->_houseModel->getTipologiaList();
        $servizi = $this->_serviziModel->getServizi();
        $alloggi = $this->_offerteModel->getAlloggi();
        
        return view('offerte')
                        ->with('houses', $alloggi)->with('tipologie', $tipologie)->with('servizi', $servizi);
    }
    
    public function showOfferteFiltrate(RicercaOfferteRequest $request) {
        
        Log::info($request);
      
        $tipologie = $this->_houseModel->getTipologiaList();
        $prezzomin = $request->prezzomin;
        $prezzomax = $request->prezzomax;
        $data_min = $request->data_min;
        $data_max = $request->data_max;
        $superficie = $request->superficie;
        $n_camere = $request->n_camere;
        $n_posti_letto_totali = $request->n_posti_letto_totali;
        $servizi = $request->servizi;
        Log::info('Controller');
        Log::info($servizi);
        /*$regions = $this->eventsList->getRegionList();
        $months = $this->eventsList->getMonthList();
        $events = $this->eventsList->getEventsFiltered($request->year, $request->month, $request->reg,
                $request->org, $request->desc);
        $EventsOnSales = array();
        foreach ($events as $event){
           $EventsOnSales[$event->id] = $this->eventsList->checkOnSale($event);
        }
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori)
                ->with('months', $months)->with('OnSales', $EventsOnSales);
*/
        Log::info($data_min);
        
        $alloggi = $this->_offerteModel->getHousesFiltered($request->tip, $prezzomin, $prezzomax, $data_min, $data_max, $superficie, $n_camere, $n_posti_letto_totali, $request->servizi);
        
        return view('offerte')->with('houses', $alloggi)->with('tipologie', $tipologie)->with('prezzomin', $prezzomin)->with('prezzomax', $prezzomax)
                ->with('data_min', $data_min)->with('data_max', $data_max)->with('superficie', $superficie)->with('n_camere', $n_camere)->with('n_posti_letto_totali', $n_posti_letto_totali)
                ->with('servizi', $servizi);
    }
    
    public function showOfferta($id) {
      if(House::where('id', $id)->exists())
      {
          $alloggi = House::find($id);  // creare metodo nel model house così richiamo solo metodo 
          Log::info($alloggi);
          $servizi = $this->_houseModel->servizi();
          //Log::info($servizi);
          return view('offertasingola', ['alloggi' =>$alloggi, 'servizi' => $servizi]);
      }
      else{
          return redirect('/offerte')->with('status','The link was broken');
      }
    }
    
    public function showFaqs() {
        
        //Faqs
        $faqs = $this->_faqsModel->getFaqs();
        
        return view('faqs.faq')
                        ->with('faqs', $faqs);
    }
}