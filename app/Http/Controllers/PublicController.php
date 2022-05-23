<?php

namespace app\Http\Controllers;

use app\Models\Offerte;

class PublicController extends Controller {
    
    protected $_offerteModel;
    
    public function __construct() {
        $this->_offerteModel = new Offerte;
    }
    public function showOfferte() {}
}

