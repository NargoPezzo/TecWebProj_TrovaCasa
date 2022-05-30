<?php

namespace App\Http\Controllers;

use App\Models\Offerte;
use App\Models\Resources\House;
use App\Models\Faqs;
use App\Models\Servizi;

class PublicController extends Controller {
    
    protected $_offerteModel;
    protected $_serviziModel;
    protected $_faqsModel;

    public function __construct() {
        $this->_offerteModel = new Offerte;
        $this->_serviziModel = new Servizi;
        $this->_faqsModel = new Faqs;
    }
    
    public function showOfferte() {
        
/*        //Appartamenti
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
          $alloggi = House::find($id);
          return view('offertasingola', ['alloggi' =>$alloggi]);
      }
      else{
          return redirect('/offerte')->with('status','The link was broken');
      }
     
    }
    
    public function showServizi() {
        
        //Servizi
        $servizi = $this->_serviziModel->getServizi();
        
        return view('offertasingola')
                        ->with('servizi', $servizi);
    }
    
    
    public function showFaqs() {
        
        //Faqs
        $faqs = $this->_faqsModel->getFaqs();
        
        return view('faq')
                        ->with('faqs', $faqs);
    }
}