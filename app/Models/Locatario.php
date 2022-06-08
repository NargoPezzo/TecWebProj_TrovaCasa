<?php

namespace app\Models;

// use App\Models\Resources\Category;
// use App\Models\Resources\Product;

class Locatario {
    
        public function getChat($user1, $user2) {
        return Chat::where('user1', $user1)->where('user2',$user2)->get()->first();
    }
}
