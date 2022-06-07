<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {

    protected $table = 'chat';
    protected $primaryKey = ['user1','user2'];
    public $incrementing = false;
    public $timestamps = false;
    
    
    
}