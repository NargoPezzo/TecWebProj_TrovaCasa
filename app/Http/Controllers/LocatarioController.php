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
        return view('home');
    }
    
    public function indexhome() {
        return view('homelocatario');
    }
    
   /* public function indexoffertelocatario() {   POTREBBE ESSERE INUTILE
        return view('offertelocatario');
    } */
}