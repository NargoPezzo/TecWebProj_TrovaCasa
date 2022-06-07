<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HouseService extends Model
{
    protected $table = 'house_services';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    protected $fillable=['house_id', 'service_id'];
    
}