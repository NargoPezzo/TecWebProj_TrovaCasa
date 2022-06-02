<?php

namespace App\Http\Controllers;

use App\Models\Offerte;
use App\Models\Resources\House;
use App\Models\Faqs;
use App\Models\Resources\Services;

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
        
        //Alloggi
        $alloggi = $this->_offerteModel->getAlloggi();
        
        return view('offerte')
                        ->with('houses', $alloggi);
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
        
        return view('faq')
                        ->with('faqs', $faqs);
    }
}