<?php

namespace app\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Faq;
use App\Models\Faqs;

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
    
    public function createFaq()
    {
        $faqs = Faq::all();
        return view('faqs.inseriscifaq', compact ('faqs'));
    }


    public function storeFaq(Request $request)
    {

        $this->validate($request,[
           'domanda'=>'required|string|max:500',
           'risposta'=>'required|string|max:10000',
        ]);

        $faqs = new Faq();

        $faqs ->domanda = $request->input('domanda');
        $faqs ->risposta = $request->input('risposta');
        
        $faqs ->save();
        Session::flash('flash_message', 'Faq inserita con successo!');
        return redirect()->back()->with('success', 'Service Successfully Added');
      
    }
    
    //editFaq
}