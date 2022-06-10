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
    
    
    public function deleteHouseServizioById($id){
        $houseservizio = HouseService::where(["house_id"=>$id])->delete('service_id');
    }
}