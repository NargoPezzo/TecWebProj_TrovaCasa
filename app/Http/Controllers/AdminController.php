<?php

namespace app\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Faq;
use App\Models\Faqs;
use App\Http\Request\NuovaFaqRequest;


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
        $faqs = new Faqs();
        $faqs->getFaqs();
        return view('faqs.inseriscifaq')
                ->with('faqs', $faqs);
    }


    public function storeFaq(NuovaFaqRequest $request)
    {

        $faq = new Faq;
        $faq->fill($request->validated());
        
        $faq->save();

        return redirect()->action('AdminController@index');
    }
      
    }
    
    //editFaq

