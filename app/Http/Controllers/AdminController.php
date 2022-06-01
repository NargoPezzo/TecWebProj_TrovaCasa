<?php

namespace app\Http\Controllers;

use App\Models\Admin;

class AdminController extends Controller {

 //   protected $_adminModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
//        $this->_adminModel = new Admin;
    }

    public function index() {
        return view('home');
    }
    
    public function indexhome() {
        return view('homeadmin');
    }
}