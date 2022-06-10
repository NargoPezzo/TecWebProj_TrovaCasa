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
    
    public function getAlloggi() {
        $alloggi = House::paginate(6);
        return $alloggi;
    }
    
    public function compare($value, $size) {
        return $value == $size;
    }
    
    
    public function getHousesFiltered($tipologia = null, $aprovincia = null, $plprovincia = null, $acittà = null, $plcittà = null,$prezzomin = null, $prezzomax = null, $data_min = null, $data_max = null, $superficie = null, $n_camere = null, $n_posti_letto_totali = null, $servizi = null/*$anno = null, $mese = null, $regione = null, $organizzazione = null, $descrizione = null*/) {
       
        $today = Carbon::now()->toDateString();
        
        $filters = array("tipologia" => $tipologia, "aprovincia" => $aprovincia, "plprovincia" => $plprovincia, "acittà" => $acittà, "plcittà" => $plcittà,"prezzomin" => $prezzomin, "prezzomax" => $prezzomax, "data_min" => $data_min, "data_max" => $data_max, "superficie" => $superficie,
            "n_camere" => $n_camere, "n_posti_letto_totali" => $n_posti_letto_totali, "servizi" => $servizi /*data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione*/);

        //Controllo quali filtri sono stati settati
        foreach ($filters as $key => $value) {
            if (is_null($value)) {
                unset($filters[$key]);
            }
        }

        if (array_key_exists('servizi', $filters)) {
            $allalloggi = array();
            $size = sizeof($servizi);
            foreach ($servizi as $servizio) {
                $alloggi = HouseService::select('house_id')->where('services_id', $servizio)->get();
                if (!is_null($alloggi)) {
                    foreach ($alloggi as $alloggio) {
                        if (array_key_exists(strval($alloggio->house_id), $allalloggi)){
                            $allalloggi[strval($alloggio->house_id)] += 1;
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
        Log::info('model');
        Log::info($acittà);

        //Creo l'array sul quale verrà fatta la query
        $queryFilters = [];
        foreach ($filters as $key => $value) {
            switch ($key) {
                case "tipologia":
                    $queryFilters[] = ["tipologia", "LIKE", strval($tipologia)];
                    break;
                case "aprovincia":
                    $queryFilters[] = ["provincia", "LIKE", strval($aprovincia)];
                    break;
                case "plprovincia":
                    $queryFilters[] = ["provincia", "LIKE", strval($plprovincia)];
                    break;
                case "acittà":
                    $queryFilters[] = ["città", "LIKE", strval($acittà)];
                    break;
                case "plcittà":
                    $queryFilters[] = ["città", "LIKE", strval($plcittà)];
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

                default;
            }
        }


        
        //Controllo se non è presente alcun filtro
        if (empty($queryFilters)) {
            $houses = House::where('id', '>', 0)->orderBy('id');
        }

        //Caso in cui sia presente almeno un filtro
        else if (isset($allalloggi)){
            $houses = House::where($queryFilters)->whereIn("id", array_keys($allalloggi));

        }
        
        else {
            $houses = House::where($queryFilters);
        }

        return $houses->paginate(9);
    }
    
    public function getProvList() {
        $province = array('AN', 'AP', 'FM', 'MC', 'PU');
        return $province;
    }
    
    public function getCittàList($provincia){
        switch($provincia){
            case 'AN': return ['Agugliano', 'Ancona', 'Arcevia', 'Barbara', 'Belvedere Ostrense', 'Camerano', 'Camerata Picena', 'Castelbellino', 'Castelfidardo', 'Castelleone di Suasa', 'Castelplanio', "Cerreto d'Esi", 'Chiaravalle', 'Corinaldo', 'Cupramontana', 'Fabriano', 'Falconara Marittima', 'Filottrano', 'Genga', 'Jesi', 'Loreto', 'Maiolati Spontini', 'Mergo', 'Monsano', 'Monte Roberto', 'Monte San Vito', 'Montecarotto', 'Montemarciano', "Morro d'Alba", 'Numana', 'Offagna', 'Osimo', 'Ostra', 'Ostra Vetere', 'Poggio San Marcello', 'Polverigi', 'Rosora', 'San Marcello', 'San Paolo di Jesi', 'Santa Maria Nuova', 'Sassoferrato', 'Senigallia', "Serra de' Conti", 'Serra San Quirico', 'Sirolo', 'Staffolo', 'Trecastelli'];
            case 'AP': return ["Acquasanta Terme", "Acquaviva Picena", "Appignano del Tronto", "Arquata del Tronto", "Ascoli Piceno", 'Carassai', 'Castel di Lama', 'Castignano', 'Castorano', 'Colli del Tronto', 'Comunanza', 'Cossignano', 'Cupra Marittima', 'Folignano', 'Force', 'Grottammare', 'Maltignano', 'Massignano', 'Monsampolo del Tronto', 'Montalto delle Marche', 'Montedinove', "Montefiore dell'Aso", 'Montegallo', 'Montemonaco', 'Monteprandone', 'Offida', 'Palmiano', 'Ripatransone', 'Roccafluvione', 'Rotella', 'San Benedetto del Tronto', 'Spinetoli', 'Venarotta'];
            case 'FM': return ['Altidona', 'Amandola', 'Belmonte Piceno', 'Campofilone' , 'Falerone' , 'Fermo', "Francavilla d'Ete", 'Grottazzolina', 'Lapedona', 'Magliano di Tenna', 'Massa Fermana' ,' Monsampietro Morico', 'Montappone', 'Montefalcone Appennino', 'Montefortino', 'Monte Giberto' , 'Montegiorgio', 'Montegranaro', 'Monteleone di Fermo', 'Montelparo' , 'Monte Rinaldo', 'Monterubbiano', 'Monte San Pietrangeli', 'Monte Urano', 'Monte Vidon Combatte', 'Monte Vidon Corrado',' Montottone', 'Moresco', 'Ortezzano', 'Pedaso', 'Petritoli', 'Ponzano di Fermo',' Porto San Giorgio', "Porto Sant'Elpidio", 'Rapagnano', 'Santa Vittoria in Matenano', "Sant'Elpidio a Mare", 'Servigliano', 'Smerillo',' Torre San Patrizio'];
            case 'MC': return ['Acquacanina', 'Apiro', 'Appignano', 'Belforte del Chienti', 'Bolognola', 'Caldarola', 'Camerino', 'Camporotondo di Fiastrone', 'Castelraimondo',' Castelsantangelo sul Nera', 'Cessapalombo', 'Cingoli', 'Civitanova Marche', 'Colmurano', 'Corridonia', 'Esanatoglia', 'Fiastra', 'Fiordimonte', 'Fiuminata', 'Gagliole',' Gualdo (MC)', 'Loro Piceno', 'Macerata', 'Matelica', 'Mogliano (MC)', 'Monte Cavallo', 'Monte San Giusto', 'Monte San Martino', 'Montecassiano', 'Montecosaro', 'Montefano', 'Montelupone', 'Morrovalle', 'Muccia',' Penna San Giovanni', 'Petriolo', 'Pieve Torina', 'Pievebovigliana', 'Pioraco', 'Poggio San Vicino', 'Pollenza', 'Porto Recanati', 'Potenza Picena', 'Recanati', 'Ripe San Ginesio', 'San Ginesio', 'San Severino Marche', "Sant'Angelo in Pontano", 'Sarnano', 'Sefro', 'Serrapetrona', 'Serravalle di Chienti', 'Tolentino', 'Treia', 'Urbisaglia', 'Ussita', 'Visso'];
            case 'PU': return ['Acqualagna', 'Apecchio', 'Auditore', 'Barchi', "Belforte all'Isauro", 'Borgo Pace', 'Cagli', 'Cantiano', 'Carpegna', 'Cartoceto', 'Casteldelci', 'Colbordolo', 'Fano', 'Fermignano', 'Fossombrone', 'Fratte Rosa', 'Frontino', 'Frontone (PU)', 'Gabicce Mare', 'Gradara', 'Isola del Piano', 'Lunano', 'Macerata Feltria', 'Maiolo', 'Mercatello sul Metauro', 'Mercatino Conca', 'Mombaroccio', 'Mondavio', 'Mondolfo', 'Monte Cerignone', 'Monte Grimano Terme', 'Monte Porzio', 'Montecalvo in Foglia', 'Monteciccardo', 'Montecopiolo', 'Montefelcino', 'Montelabbate',' Montemaggiore al Metauro', 'Novafeltria',' Orciano di Pesaro', 'Peglio (PU)', 'Pennabilli', 'Pergola', 'Pesaro', 'Petriano', 'Piagge', 'Piandimeleto', 'Pietrarubbia', 'Piobbico', 'Saltara',' San Costanzo',' San Giorgio di Pesaro', 'San Leo', 'San Lorenzo in Campo', "Sant'Agata Feltria", "Sant'Angelo in Lizzola"," Sant'Angelo in Vado", "Sant'Ippolito", 'Sassocorvaro', 'Sassofeltrio',"Serra Sant'Abbondio", 'Serrungarina', 'Talamello', 'Tavoleto', 'Tavullia', 'Urbania', 'Urbino'];
        }

    }

}
