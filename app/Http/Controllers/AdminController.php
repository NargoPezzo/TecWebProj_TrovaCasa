<?php

namespace app\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Resources\Faq;
use App\Models\Faqs;
use App\Http\Request\NuovaFaqRequest;


class AdminController extends Controller {

 //   protected $_adminModel;
    protected $_faqsModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_faqsModel = new Faqs;
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
        //return view('faq');
        return redirect()->action('AdminController@index');
    }
    
    public function editFaq()
    {
        
        $faqs = getFaqs();
        
        if ($faqs->isEmpty())
            return view('faqs.modificafaq');
        else {
            return view('faqs.modificafaq')
                            ->with('faqs', $faqs);
        }
    }
    
    public function deleteFaq($id)
    {
        
        $faq = $this->_faqsModel->getSingleFaq(urldecode($id));
        $faq->delete();
        return redirect()->route('faq');
    }
}