<?php

namespace App\Http\Controllers;

use App\Models\Offerte;
use App\Models\Faqs;

class PublicController extends Controller {
    
    protected $_offerteModel;
    protected $_faqsModel;
    
    public function __construct() {
        $this->_offerteModel = new Offerte;
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
    public function showFaqs() {
        
        //Faqs
        $faqs = $this->_faqsModel->getFaqs();
        
        return view('faq')
                        ->with('faqs', $faqs);
    }
}