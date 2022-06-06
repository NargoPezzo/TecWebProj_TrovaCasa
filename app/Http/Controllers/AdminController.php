<?php

namespace app\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Models\Resources\Faq;
use App\Models\Faqs;
use App\Http\Request\NuovaFaqRequest;
use App\Http\Request\ModificaFaqRequest;

use App\Models\Rented;


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


public function getStats(Request $request){
        $this->_accomodations = new Alloggio;
        $this->requested = new Rented;
        $tipo = $request->input('type');
        $data_inizio = $request->input('start-date');
        $data_fine = $request->input('end-date');

        if (!is_null($data_fine) and !is_null($data_inizio)){
            $request->validate([
                'start-date' => 'date_format:Y-m-d|before:tomorrow',
                'end-date' => 'date_format:Y-m-d|after:start-date'  
            ]);
                $count_rent = $this->_accomodations->make_stats($tipo, $data_inizio, $data_fine);
                $count_request = $this->_accomodations->make_stats3($tipo, $data_inizio, $data_fine);
                $count_assigned = $this->requested->make_stats2($tipo, $data_inizio, $data_fine);            
        }
        else{
            $count_rent = $this->_accomodations->make_stats($tipo, $data_inizio, $data_fine);
            $count_request = $this->_accomodations->make_stats3($tipo, $data_inizio, $data_fine);
            $count_assigned = $this->requested->make_stats2($tipo, $data_inizio, $data_fine);
        }
        return view('admin.statistics')->with('count_rent',$count_rent)->with('count_request',$count_request)->with('count_assigned',$count_assigned);
    }
    
public function statistics()
    {
        return view('admin.statistics');
    }