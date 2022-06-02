<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Servizio;
use Illuminate\Support\Facades\Auth;

class Servizi {


    
    public function getServizi() {
        $servizi = Servizio::where('house_id', $house_id)->get();
        return $servizi;
    }
    
   /* public function getMyAlloggi() {
        $locatore_id = Auth::id();
        $alloggi = House::where('locatore_id', $locatore_id) -> get();
        return $alloggi;
    } */
}
