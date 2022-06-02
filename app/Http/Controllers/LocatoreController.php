<?php

namespace app\Http\Controllers;

use Carbon\Carbon;
use App\Models\Resources\House;
use App\Models\Resources\Services;
use App\Models\Locatore;
use App\User;
use App\Http\Request\NuovoAlloggioRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Offerte;


class LocatoreController extends Controller {

    protected $_locatoreModel;
    
    protected $_seviceModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore;
        $this->_seviceModel = new Services;
    }

    public function index() {
        return view('home');
    }
    
    public function indexhome() {
        return view('homelocatore');
    }
    
    public function createAlloggio() {
        $servizi = $this->_seviceModel->getServizi();
        return view('alloggi.inseriscialloggio')
                    ->with('servizi', $servizi);
    }
    
    public function storeAlloggio(NuovoAlloggioRequest $request) {
         if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $alloggio = new House();
        $alloggio->locatore_id = Auth::id();
        $alloggio->data_inserimento= Carbon::now();
        $alloggio->fill($request->validated());

        $alloggio->immagine = $imageName;
        
        
        //$category = Category::find([3, 4]); al posto di 3,4 carico l'array che viene dal form
       // $product->categories()->attach($category);
        $alloggio->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        }
        
        ;
        
        return redirect()->action('LocatoreController@index');
        
        
        
        /*$faq = new Faq;
        $faq->fill($request->validated());
        
        $faq->save();

        return redirect()->action('AdminController@index');
        
        $request->locatore_id = Auth::User()->id;
        
        Log::info('$request');
        
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
            Log::info($imageName);
        } else {
            $imageName = NULL;
        }
        
        $inputs = $request->all();
       
        $alloggi = House::Create($inputs);
        
        $alloggi->immagine = $imageName;
        $alloggi->save();
        
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        }

        return redirect()->action('LocatoreController@indexhome');*/

        
        
    }


/*    public function editAlloggio() {
        $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                        ->with('cats', $prodCats);
    }*/

    public function deleteAlloggio($id) {
        $alloggio = House::find($id);
        $alloggio -> delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        
        /*House::destroy($id);
        return redirect()->route("");*/
    }
}
