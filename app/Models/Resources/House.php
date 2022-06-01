<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

     protected $fillable = [
        'titolo', 'locatore_id', 'prezzo', 'descrizione', 'tipologia', 'n_camere', 'n_posti_letto_totali',
        'età_min', 'età_max', 'genere', 'data_min', 'data_max', 'indirizzo', 'cap', 'città', 'provincia', 
        'superficie', 'immagine',
    ];
}
