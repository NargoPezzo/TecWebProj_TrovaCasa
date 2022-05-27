<?php

namespace app\Http\Controllers;

//use App\Models\Admin;

class LocatoreController extends Controller {

//    protected $_locatoreModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
//        $this->_locatoreModel = new Locatore;
    }

    public function index() {
        return view('locatore');
    }
    
    public function indexhome() {
        return view('homelocatore');
    }
}