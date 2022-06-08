<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\House;
use App\Models\Resources\HouseService;
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
    
    public function compare($value, $size) {
        return $value == $size;
    }
    
    
    public function getHousesFiltered($tipologia = null, $prezzomin = null, $prezzomax = null, $data_min = null, $data_max = null, $superficie = null, $n_camere = null, $n_posti_letto_totali = null, $servizi = null/*$anno = null, $mese = null, $regione = null, $organizzazione = null, $descrizione = null*/) {
        /*$data = null;
        if ((isset($anno)) && (isset($mese))) {
            $data = $anno . '-' . $this->chooseMonthNumber($mese);
        }*/
        $today = Carbon::now()->toDateString();
        
        $filters = array("tipologia" => $tipologia, "prezzomin" => $prezzomin, "prezzomax" => $prezzomax, "data_min" => $data_min, "data_max" => $data_max, "superficie" => $superficie,
            "n_camere" => $n_camere, "n_posti_letto_totali" => $n_posti_letto_totali, "servizi" => $servizi /*data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione*/);

        //Controllo quali filtri sono stati settati
        foreach ($filters as $key => $value) {
            if (is_null($value)) {
                unset($filters[$key]);
            }
        }
        
        Log::info('SERVIZI');
        Log::info($servizi);
        
        $selectedalloggi = array();
        
        if (!is_null($filters['servizi'])) {
            $allalloggi = array();
            $size = sizeof($servizi);
            foreach ($servizi as $servizio) {
                $alloggi = HouseService::select('house_id')->where('services_id', $servizio)->get();
                if (!is_null($alloggi)) {
                    foreach ($alloggi as $alloggio) {
                        if (array_key_exists(strval($alloggio->house_id), $allalloggi)){
                            $allalloggi[strval($alloggio->house_id)] = $allalloggi[strval($alloggio->house_id)]++;
                        } else {
                            $allalloggi[strval($alloggio->house_id)] = 1;
                        }
                    }
                }
            } 
            Log::info($allalloggi);
            foreach ($allalloggi as $key => $value) {
                if ($value != $size) {
                    unset($allalloggi[$key]);
                }
            }
        }

        /*Log::info($data_min);
        /*Log::info($data_max);*/

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
                case "data_min":
                    $queryFilters[] = ["data_min", "<=", $data_min];
                    break;
                case "data_max":
                    $queryFilters[] = ["data_max", ">=", $data_max];
                    break;
                case "superficie":
                    $queryFilters[] = ["superficie", ">=", $superficie];
                    break;
                case "n_camere":
                    $queryFilters[] = ["n_camere", "=", $n_camere];
                    break;
                case "n_posti_letto_totali":
                    $queryFilters[] = ["n_posti_letto_totali", "=", $n_posti_letto_totali];
                    break;
                case "servizi":
                    foreach($allalloggi as $alloggio) {
                        $queryFilters[] = ["id", "IN", array_keys($allalloggi)];
                    };
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
        Log::info($selectedalloggi);
        
        //Controllo se non è presente alcun filtro
        if (empty($queryFilters)) {
            $houses = House::where('id', '>', 0)->orderBy('id');
        }

        //Caso in cui sia presente almeno un filtro
        {
            $houses = House::where($queryFilters)/*->whereDate('data', '>=', $this->today)*/;
        }

        Log::info($houses->get());
        
        return $houses->paginate(9);
    }
    
    public function getProvList() {
        $province = array('AN', 'AP', 'FM', 'MC', 'PU');
        return $province;
    }
    
    public function getCittà($provincia){
        switch($provincia){
            case 'AN': return ['Agugliano', 'Ancona', 'Arcevia', 'Barbara', 'Belvedere Ostrense', 'Camerano', 'Camerata Picena', 'Castelbellino', 'Castelfidardo', 'Castelleone di Suasa', 'Castelplanio', "Cerreto d'Esi", 'Chiaravalle', 'Corinaldo', 'Cupramontana', 'Fabriano', 'Falconara Marittima', 'Filottrano', 'Genga', 'Jesi', 'Loreto', 'Maiolati Spontini', 'Mergo', 'Monsano', 'Monte Roberto', 'Monte San Vito', 'Montecarotto', 'Montemarciano', "Morro d'Alba", 'Numana', 'Offagna', 'Osimo', 'Ostra', 'Ostra Vetere', 'Poggio San Marcello', 'Polverigi', 'Rosora', 'San Marcello', 'San Paolo di Jesi', 'Santa Maria Nuova', 'Sassoferrato', 'Senigallia', "Serra de' Conti", 'Serra San Quirico', 'Sirolo', 'Staffolo', 'Trecastelli'];
            case 'AP': return ['MT', 'PZ'];
            case 'FM': return ['CZ', 'CS', 'KR', 'RC', 'VV'];
            case 'MC': return ['AV', 'BN', 'CE', 'NA', 'SA'];
            case 'PU': return ['BO', 'FE', 'FC', 'MO', 'PR', 'PC', 'RA', 'RE', 'RN'];
        }
    
    }
}
