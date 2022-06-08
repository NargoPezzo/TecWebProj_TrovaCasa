<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Opzione extends Model
{
    protected $table = 'opzione';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = true;
    
    protected $fillable=['locatario_id', 'house_id'];

    
}
