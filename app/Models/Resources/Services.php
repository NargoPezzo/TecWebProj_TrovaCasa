<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    protected $fillable=['nome'];
    
    public function getServizi() {
        $servizi = Services::all();
        return $servizi;
    }
}
