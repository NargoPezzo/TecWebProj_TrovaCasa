<?php

namespace App\Models;

use App\Models\Resources\House;

class Offerte {

    public function getAppartamenti() {
        return House::where('n_camere', '>', 0)
                ->get();
    }
    
    public function getPostiLettoSingoli() {
        return House::where('n_camere', 0)
                -> where('tipologia', 'singolo')
                -> get();
    }
    
    public function getPostiLettoDoppi() {
        return House::where('n_camere', 0)
                -> where('tipologia', 'doppio')
                -> get();
    }
    
    public function getAlloggi() {
        $alloggi = House::where('opzionato', 0)
                -> get();
        return $alloggi/*->paginate($paged)*/;
        
    }
}
