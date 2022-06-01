<?php

namespace app\Http\Controllers;

use App\Models\Resources\House;
use App\Models\Locatore;
use App\Http\Request\NuovoAlloggioRequest;

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
        $alloggi = $this->_locatoreModel->getAlloggi('id')/*->pluck('name', 'catId')*/;
        return view('alloggi.inseriscialloggio')
                        ->with('houses', $alloggi);
    }
    
    public function storeAlloggio(NuovoAlloggioRequest $request) {

        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $house = new House;
        $house->fill($request->validated());
        $house->immagine = $imageName;
        $house->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

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