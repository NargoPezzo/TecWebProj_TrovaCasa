<?php

namespace app\Http\Controllers;

use App\Models\Resources\House;
use App\Models\Locatore;
use App\User;
use App\Http\Request\NuovoAlloggioRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LocatoreController extends Controller {

    protected $_locatoreModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore;
    }

    public function index() {
        return view('home');
    }
    
    public function indexhome() {
        return view('homelocatore');
    }
    
    public function addAlloggio() {
        $locatore_id = Auth::id();
        $alloggi = $this->_locatoreModel->getAlloggi($locatore_id)/*->pluck('name', 'catId')*/;
        Log::info($alloggi);
        Log::info($locatore_id);
        return view('alloggi.inseriscialloggio')
                        ->with('houses', $alloggi)
                        ->with('locatoreId', $locatore_id);
    }
    
    public function storeAlloggio(NuovoAlloggioRequest $request) {
        
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

        return redirect()->action('LocatoreController@indexhome');

        
        
    }


/*    public function editAlloggio() {
        $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                        ->with('cats', $prodCats);
    }*/

    public function destroyAlloggio($id) {
        $houses = House::find($id);
        $houses -> delete();
        session() -> flash('message', 'Eliminazione effettuata con successo!');
        
        /*House::destroy($id);
        return redirect()->route("");*/
    }
}
