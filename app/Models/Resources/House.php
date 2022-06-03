<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\HouseServices;
use App\Models\Resources\Services;

class House extends Model
{
    protected $table = 'houses';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    protected $fillable = [
        'titolo', 'locatore_id', 'prezzo', 'descrizione', 'tipologia', 'n_camere', 'n_posti_letto_totali',
        'età_min', 'età_max', 'genere', 'data_min', 'data_max', 'indirizzo', 'cap', 'città', 'provincia', 
        'superficie',
    ];

    // Realazione One-To-One con User
    public function locatore() {
        
        return $this->hasOne(User::class, 'id', 'locatore_id');
    }
    // Realazione One-To-Many con Servizi
    public function servizi() {
        
        return $this->belongsToMany(Services::class);
    }
    
    public function getSingleHouse ($id) {
        return House::where('id', $id)->first();
    }
    
  /*  public function locatore() {
        
    return $this->belongsTo(User::Class, 'locatore_id'); // specify the column which stores the author in posts table
}*/
     
}