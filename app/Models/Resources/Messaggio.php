<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\user;

class Messaggio extends Model {

    protected $table = 'messaggi';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}