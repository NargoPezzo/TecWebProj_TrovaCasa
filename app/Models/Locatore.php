<?php

namespace app\Models;

 use App\Models\Resources\House;
// use App\Models\Resources\Product;

class Locatore {
    public function getAlloggi($id) {
        return House::where('locatore_id', $id)->get();
    }
}
