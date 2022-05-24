<?php

namespace App\Http\Controllers;

use App\Models\Offerte;

class PublicController extends Controller {
    
    protected $_offerteModel;
    
    public function __construct() {
        $this->_offerteModel = new Offerte;
    }
    public function showOfferte() {
        
        //Appartamenti
        $appartamenti = $this->_offerteModel->getAppartamenti();
        
        //Posti Letto Singoli
        $postiLettoSingoli = $this->_offerteModel->getPostiLettoSingoli();
        
        //Posti Letto Doppi
        $postiLettoDoppi = $this->_offerteModel->getPostiLettoDoppi();
        
        //Alloggi
        $alloggi = $this->_offerteModel->getAlloggi();
        
        return view('offerte')
                        ->with('houses', $alloggi);
    }       
}