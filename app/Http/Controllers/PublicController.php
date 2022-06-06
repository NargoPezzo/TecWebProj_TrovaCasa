<?php

namespace App\Http\Controllers;

use App\Models\Offerte;
use App\Models\Resources\House;
use App\Models\Faqs;
use App\Models\Resources\Services;
use App\Http\Request\RicercaOfferteRequest;

class PublicController extends Controller {
    
    protected $_offerteModel;
   
    protected $_faqsModel;
    
    protected $_houseModel;

    public function __construct() {
        $this->_offerteModel = new Offerte;
        
        $this->_faqsModel = new Faqs;
        
        $this->_houseModel = new House;
    }
    
    public function showOfferte() {
        
/*      //Appartamenti
        $appartamenti = $this->_offerteModel->getAppartamenti();
        
        //Posti Letto Singoli
        $postiLettoSingoli = $this->_offerteModel->getPostiLettoSingoli();
        
        //Posti Letto Doppi
        $postiLettoDoppi = $this->_offerteModel->getPostiLettoDoppi();*/
        
        
        $tipologie = $this->_houseModel->getTipologiaList();
        $alloggi = $this->_offerteModel->getAlloggi();
        return view('offerte')
                        ->with('houses', $alloggi)->with('tipologie', $tipologie);
    }
    
    public function showOfferteFiltrate(RicercaOfferteRequest $request) {
        
        $tipologie = $this->_houseModel->getTipologiaList();
        $prezzomin = $request->prezzomin;
        $prezzomax = $request->prezzomax;
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
        
        $alloggi = $this->_offerteModel->getHousesFiltered($request->tip, $prezzomin, $prezzomax);
        
        return view('offerte')->with('houses', $alloggi)->with('tipologie', $tipologie)->with('prezzomin', $prezzomin)->with('prezzomax', $prezzomax);
    }
    
    public function showOfferta($id) {
      if(House::where('id', $id)->exists())
      {
          $alloggi = House::find($id);  // creare metodo nel model house così richiamo solo metodo 
          
          $servizi = $this->_houseModel->servizi();
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