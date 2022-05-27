<?php

namespace app\Http\Controllers;

//use App\Models\Admin;

class LocatarioController extends Controller {

//    protected $_locatarioModel;

    public function __construct() {
        $this->middleware('can:isLocatario');
//        $this->_locatarioModel = new Locatario;
    }

    public function index() {
        return view('locatario');
    }
    
    public function indexhome() {
        return view('homelocatario');
    }
    
    public function indexoffertelocatario() {
        return view('offertelocatario');
    }
}