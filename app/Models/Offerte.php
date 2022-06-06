<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\House;
use Illuminate\Support\Facades\Auth;
use App\Models\Resources\Services;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Offerte {

/*    public function getAppartamenti() {
        return House::where('n_camere', '>', 0)
                ->get();
    }
    
    public function getPostiLettoSingoli() {
        return House::where('n_camere', 0)
                -> where('tipologia', 'singolo')
                -> get();
    }
    
    public function getPostiLettoDoppi() {
        return House::where('n_camere', 0)
                -> where('tipologia', 'doppio')
                -> get();
    }*/
    
    public function getAlloggi() {
        $alloggi = House::paginate(6);
        return $alloggi;
    }
    
    public function getHousesFiltered($tipologia = null, $prezzomin = null, $prezzomax = null, $data_min = null, $data_max = null/*, $superficie = null/*$anno = null, $mese = null, $regione = null, $organizzazione = null, $descrizione = null*/) {
        /*$data = null;
        if ((isset($anno)) && (isset($mese))) {
            $data = $anno . '-' . $this->chooseMonthNumber($mese);
        }*/
        $today = Carbon::now()->toDateString();
        
        $filters = array("tipologia" => $tipologia, "prezzomin" => $prezzomin, "prezzomax" => $prezzomax, "data_min" => $data_min, "data_max" => $data_max/*, "superficie" => $superficie/*data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione*/);

        //Controllo quali filtri sono stati settati
        foreach ($filters as $key => $value) {
            if (is_null($value)) {
                unset($filters[$key]);
            }
        }
        
        Log::info($data_min);

        //Creo l'array sul quale verrà fatta la query
        $queryFilters = [];
        foreach ($filters as $key => $value) {
            switch ($key) {
                case "tipologia":
                    $queryFilters[] = ["tipologia", "LIKE", strval($tipologia)];
                    break;
                case "prezzomin":
                    $queryFilters[] = ["prezzo", ">=", $prezzomin];
                    break;
                case "prezzomax":
                    $queryFilters[] = ["prezzo", "<=", $prezzomax];
                    break;
                /*case "data_min":
                    $queryFilters[] = ["data_min", "LIKE", "%" . strval($data_min) . "%"];
                    break;
                case "data_max":
                    $queryFilters[] = ["data_max", "<=", $data_max];
                    break;
                /*case "superficie":
                    $queryFilters[] = ["superfcie", ">=", $superficie];
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

        Log::info($queryFilters);
        
        //Controllo se non è presente alcun filtro
        if (empty($queryFilters)) {
            $houses = House::where('id', 4)->orderBy('id');
        }

        //Caso in cui sia presente almeno un filtro
        {
            $houses = House::where($queryFilters)/*->whereDate('data', '>=', $this->today)*/;
        }

        return $houses->paginate(9);
    }
    
}
