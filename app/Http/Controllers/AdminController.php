<?php

namespace app\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Models\Resources\Faq;
use App\Models\Faqs;
use App\Http\Request\NuovaFaqRequest;
use App\Http\Request\ModificaFaqRequest;


class AdminController extends Controller {

 //   protected $_adminModel;
    protected $_faqsModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_faqsModel = new Faqs;
        $this->_faqModel = new Faq;
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
        return redirect()->route('faq');
    }
    
    public function editFaq(ModificaFaqRequest $request) {

        $faq = $this->_faqModel->getSingleFaq($request->id);
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        $faq->save();
        return redirect()->route('faq');
        
    }
    
    public function saveFaq(ModificaFaqRequest $request) {

        $faq = $this->_faqModel->getSingleFaq($request->id);
        //$faq = getSingleFaq($request->id);

        $validated = $request->validated();


        $faq->domanda = $validated->domanda;
        $faq->risposta = $validated->risposta;
        $faq->save();

            return redirect()->route('faq');
        
    }
    
    
    public function deleteFaq($id)
    {
        $faq = $this->_faqsModel->getSingleFaq(urldecode($id));
        $faq->delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        return redirect()->route('faq');
        
    }
}