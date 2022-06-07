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
    
    public function getTipologiaList () {
        $tipologie = array('Appartamento', 'Posto letto singolo', 'Posto letto doppio');
        return $tipologie;
    }
    
    public function getServiziList () {
        $servizi = array('Locale ricreativo', 'Lavatrice', 'Wifi', 'Posto auto', 'Asciugatrice', 'Angolo studio');
        return $servizi;
    }
    
    public function getHousesByTipologia ($tipologia) {
        $houses = House::where('tipologia', $tipologia);
        return $houses;
    }
    
    public function getHousesByPrezzo ($prezzomin, $prezzomax) {
        $houses = House::where('tipologia', $tipologia);
        return $houses;
    }
    
        public function getAlloggiByDate(){
        $houses = House::orderby('data_inserimento', 'desc')->paginate(9);
        return $houses;
    }
    
  /*  public function locatore() {
        
    return $this->belongsTo(User::Class, 'locatore_id'); // specify the column which stores the author in posts table
}*/
    public function getHousesFiltered($tipologia = null, $prezzomin = null, $prezzomax = null/*$anno = null, $mese = null, $regione = null, $organizzazione = null, $descrizione = null*/) {
        /*$data = null;
        if ((isset($anno)) && (isset($mese))) {
            $data = $anno . '-' . $this->chooseMonthNumber($mese);
        }*/
        $filters = array("tipologia" => $tipologia, "prezzomin" => $prezzomin, "prezzomax" => $prezzomax /*data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione*/);

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
                /*case "data":
                    $queryFilters[] = ["data", "LIKE", "%" . strval($data) . "%"];
                    break;
                case "regione":
                    $queryFilters[] = ["regione", "LIKE", strval($regione)];
                    break;
                case "organizzazione":
                    $queryFilters[] = ["nomeorganizzatore", "LIKE", strval($organizzazione)];
                    break;
                case "descrizione":
                    $queryFilters[] = ["descrizione", "LIKE", "%" . strval($descrizione) . "%"];
                    break;*/
                default;
            }
        }

        //Controllo se non è presente alcun filtro
        if (empty($queryFilters)) {
            $houses = House::where('id', 4)->orderBy('id');
        }

        //Caso in cui sia presente almeno un filtro
        else {
            $houses = House::where($queryFilters)/*->whereDate('data', '>=', $this->today)*/;
        }

        return $houses->paginate(9);
    }
    
    
    public function genera_statistiche1($tipologia, $data_min, $data_max){
            $this->_alloggi = new House;
            if ($tipologia == 'Appartamento')
            {
                $tipologia = '';
            }
            if((is_null($data_min)) and is_null($data_max))
            {            
                $statistiche = House::whereRaw('tipo like "%' . $tipologia . '%"')->count();
            }
            else
            {
                $data_min = date("Y-m-d",strtotime($data_min));
                $data_max = date("Y-m-d",strtotime($data_max)); 
                $statistiche = House::whereRaw('tipo like "%'. $tipologia .'%" and created_at between "'. $data_min. '" and "'.$data_max .'";')->count();
            }
            return $statistiche;
    }
    
    public function genera_statistiche3($tipologia, $data_min, $data_max){
            $this->_alloggi = new House;
            if ($tipologia == 'Appartamento')
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
                $statistiche = House::whereRaw('tipo like "%' . $tipologia . '%" and opzionato = 1')->count();
            }
            else
            {
                $data_min = date("Y-m-d",strtotime($data_min));
                $data_max = date("Y-m-d",strtotime($data_max));
                $statistiche = House::whereRaw('tipo like "%'. $tipologia .'%" and created_at between "'. $data_min. '" and "'.$data_max .'" and opzionato = 1')->count();
            }
            return $statistiche;
    }
    
    
    
     
}
