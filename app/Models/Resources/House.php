<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\HouseServices;
use App\Models\Resources\Services;
use App\Models\Resources\Opzione;
use Illuminate\Support\Facades\Log;

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
    
    //Funzioni per ricerche filtrate
    public function getTipologiaList () {
        $tipologie = array('Appartamento', 'Posto letto singolo', 'Posto letto doppio');
        return $tipologie;
    }
    
    public function getServiziList () {
        $servizi = array('Locale ricreativo', 'Lavatrice', 'Wifi', 'Posto auto', 'Angolo studio','TV','Asciugatrice','Balcone','Giardino','Camino','Bagni');
        return $servizi;
    }
    
    public function getHousesByTipologia ($tipologia) {
        $houses = House::where('tipologia', $tipologia);
        return $houses;
    }
    
    //Not used
    public function getHousesByPrezzo ($prezzomin, $prezzomax) {
        $houses = House::where('tipologia', $tipologia);
        return $houses;
    }
    
    public function getAlloggiByDate(){
        $houses = House::orderby('data_inserimento', 'desc')->paginate(9);
        return $houses;
    }
    
    //non utilizziamo, usata in offerte
    public function getHousesFiltered($tipologia = null, $prezzomin = null, $prezzomax = null) {
      
        $filters = array("tipologia" => $tipologia, "prezzomin" => $prezzomin, "prezzomax" => $prezzomax );

        //Controllo quali filtri sono stati settati
        foreach ($filters as $key => $value) {
            if (is_null($value)) {
                unset($filters[$key]);
            }
        }

        //Creo l'array sul quale verrà fatta la query
        $queryFilters = [];
        foreach ($filters as $key => $value) {
            switch ($key) {
                case "tipologia":
                    $queryFilters[] = ["tipologia", "LIKE", strval($tipologia)];
                    break;
                case "prezzomin":
                    $queryFilters[] = ["prezzo", ">", $prezzomin];
                    break;
                case "prezzomax":
                    $queryFilters[] = ["prezzo", "<", $prezzomax];
                    break;
                default;
            }
        }

        //Controllo se non è presente alcun filtro
        if (empty($queryFilters)) {
            $houses = House::where('id', 4)->orderBy('id');
        }

        //Caso in cui sia presente almeno un filtro
        else {
            $houses = House::where($queryFilters);
        }

        return $houses->paginate(9);
    }
    
    
    
    public function genera_statistiche1($tipologia, $data_min, $data_max){
            $this->_alloggi = new House;
            if ($tipologia == 'alloggio')
            {
                $tipologia = '';
            }
            if((is_null($data_min)) and is_null($data_max))
            {            
                $statistiche = House::whereRaw('tipologia like "%' . $tipologia . '%"')->count();
            }
            else
            {
                $data_min = date("Y-m-d",strtotime($data_min));
                $data_max = date("Y-m-d",strtotime($data_max)); 
                $statistiche = House::whereRaw('tipologia like "%'. $tipologia .'%" and data_inserimento between "'. $data_min. '" and "'.$data_max .'";')->count();
            }
            return $statistiche;
    }
    
    public function genera_statistiche3($tipologia, $data_min, $data_max){
            $this->_alloggi = new House;
            if ($tipologia == 'alloggio')
            {
                $tipologia = '';
            }
            if ($tipologia == 'Posto letto singolo')
            {
                $tipologia = 'Posto_letto singolo';
            }
            if ($tipologia == 'Posto letto doppio')
            {
                $tipologia = 'Posto_letto doppio';
            }
            if((is_null($data_min)) and is_null($data_max))
            {            
                $statistiche = House::whereRaw('tipologia like "%' . $tipologia . '%" and opzionato = 1')->count();
            }
            else
            {
                $data_min = date("Y-m-d",strtotime($data_min));
                $data_max = date("Y-m-d",strtotime($data_max));
                $statistiche = House::whereRaw('tipologia like "%'. $tipologia .'%" and data_inserimento between "'. $data_min. '" and "'.$data_max .'" and opzionato = 1')->count();
            }
            return $statistiche;
    }

}
