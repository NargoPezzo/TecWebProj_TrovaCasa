<?php

namespace app\Models;

 use App\Models\Resources\House;
 use App\User;

class Locatore extends User {
    public function getAlloggi($locatore_id) {
        
        return House::where('locatore_id', $locatore_id)->paginate(9);
    }
    
    public function lastAlloggio(){
        
        $maxValue = House::max('id');
        return $maxValue;
    }
    
}
