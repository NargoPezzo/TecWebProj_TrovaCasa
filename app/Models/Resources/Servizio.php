<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Servizio extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    protected $fillable=['house_id', 'nome','presente'];
}
