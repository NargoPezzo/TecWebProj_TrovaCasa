<?php

namespace app\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Models\Resources\Faq;
use App\Models\Faqs;
use App\Http\Request\NuovaFaqRequest;
use App\Http\Request\ModificaFaqRequest;
use App\Models\Resources\House;
use App\Models\Opzionato;

use App\Models\Rented;


class AdminController extends Controller {


    protected $_faqsModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_faqsModel = new Faqs;
        $this->_faqModel = new Faq;
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



    public function getStats(Request $tipologia){
        $this->_alloggi = new House;
        $this->_opzionati = new Opzionato;
        $tipo = $tipologia->input('type');
        $data_min = $tipologia->input('start-date'); 
        $data_max = $tipologia->input('end-date');

        if (!is_null($data_max) and !is_null($data_min)){
            $tipologia->validate([
                'start-date' => 'date_format:Y-m-d|before:tomorrow',
                'end-date' => 'date_format:Y-m-d|after:start-date'  
            ]);
                $contatore_alloggi = $this->_alloggi->genera_statistiche1($tipo, $data_min, $data_max);
                $contatore_richieste = $this->_opzionati->genera_statistiche2($tipo, $data_min, $data_max);
                $contatore_opzionati = $this->_alloggi->genera_statistiche3($tipo, $data_min, $data_max);             
        }
        else{
            $contatore_alloggi = $this->_alloggi->genera_statistiche1($tipo, $data_min, $data_max);
            $contatore_richieste = $this->_opzionati->genera_statistiche2($tipo, $data_min, $data_max);
            $contatore_opzionati = $this->_alloggi->genera_statistiche3($tipo, $data_min, $data_max);
        }
        return view('statistiche')->with('contatore_alloggi',$contatore_alloggi) ->with('contatore_richieste',$contatore_richieste) ->with('contatore_opzionati',$contatore_opzionati);
    }
    
public function statistics()
    {
        return view('statistiche');
    }
    
    }