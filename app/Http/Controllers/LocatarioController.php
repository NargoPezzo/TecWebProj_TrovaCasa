<?php

namespace app\Http\Controllers;
use App\Models\Resources\House;

//use App\Models\Admin;

class LocatarioController extends Controller {

//    protected $_locatarioModel;

    public function __construct() {
        $this->middleware('can:isLocatario');
//        $this->_locatarioModel = new Locatario;
    }

    public function index() {
        $this->_houseModel = new House;
        $alloggi = $this->_houseModel->getAlloggiByDate();
                return view('home')
                ->with('alloggi', $alloggi);
    }
    
    
    
   /* public function indexoffertelocatario() {   POTREBBE ESSERE INUTILE
        return view('offertelocatario');
    } */
    
}