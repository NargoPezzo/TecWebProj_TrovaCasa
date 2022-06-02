<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
    public function hasALocatore() {
        
        return $this->hasOne(User::class, 'id', 'locatore_id');
    }
    
    public function locatore() {
        
    return $this->belongsTo(User::Class, 'locatore_id'); // specify the column which stores the author in posts table
}
     
}


/* METTERE VINCOLO SU CHIAVE ESTERNA PER LOCATORE_ID */