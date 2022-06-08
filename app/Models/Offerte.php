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
            case 'AP': return ['Acquasanta Terme', 'Acquaviva Picena', 'Altidona', 'Amandola', 'Appignano del Tronto', 'Arquata del Tronto', 'Ascoli Piceno', 'Belmonte Piceno', 'Campofilone', 'Carassai', 'Castel di Lama', 'Castel Trosino', 'Castignano', 'Castorano','Colli del Tronto', 'Comunanza', 'Cossignano', 'Cupra Marittima', 'Falerone',' Fermo', 'Folignano', 'Force'," Francavilla d'Ete", 'Grottammare', 'Grottazzolina', 'Lapedona', 'Magliano di Tenna', 'Maltignano', 'Massa Fermana', 'Massignano', 'Monsampietro Morico',' Monsampolo del Tronto',' Montalto delle Marche', 'Montappone', 'Monte Giberto', 'Monte Rinaldo',' Monte San Pietrangeli',' Monte Urano', 'Monte Vidon Combatte',' Monte Vidon Corrado', 'Montedinove', 'Montefalcone Appennino', "Montefiore dell'Aso", 'Montefortino', 'Montegallo', 'Montegiorgio', 'Montegranaro', 'Monteleone di Fermo', 'Montelparo', 'Montemonaco', 'Monteprandone', 'Monterubbiano', 'Montottone', 'Moresco', 'Offida', 'Ortezzano', 'Palmiano', 'Pedaso', 'Petritoli', 'Ponzano di Fermo',' Porto San Giorgio', "Porto Sant'Elpidio", 'Rapagnano', 'Ripatransone', 'Roccafluvione', 'Rotella', "Sant'Elpidio a mare", 'San Benedetto del Tronto',' Santa Vittoria in Matenano', 'Servigliano', 'Smerillo', 'Spinetoli', 'Torre San Patrizio', 'Venarotta'];
            case 'FM': return ['Altidona', 'Amandola', 'Belmonte Piceno', 'Campofilone' , 'Falerone' , 'Fermo', "Francavilla d'Ete", 'Grottazzolina', 'Lapedona', 'Magliano di Tenna', 'Massa Fermana' ,' Monsampietro Morico', 'Montappone', 'Montefalcone Appennino', 'Montefortino', 'Monte Giberto' , 'Montegiorgio', 'Montegranaro', 'Monteleone di Fermo', 'Montelparo' , 'Monte Rinaldo', 'Monterubbiano', 'Monte San Pietrangeli', 'Monte Urano', 'Monte Vidon Combatte', 'Monte Vidon Corrado',' Montottone', 'Moresco', 'Ortezzano', 'Pedaso', 'Petritoli', 'Ponzano di Fermo',' Porto San Giorgio', "Porto Sant'Elpidio", 'Rapagnano', 'Santa Vittoria in Matenano', "Sant'Elpidio a Mare", 'Servigliano', 'Smerillo',' Torre San Patrizio'];
            case 'MC': return ['Acquacanina', 'Apiro', 'Appignano', 'Belforte del Chienti', 'Bolognola', 'Caldarola', 'Camerino', 'Camporotondo di Fiastrone', 'Castelraimondo',' Castelsantangelo sul Nera', 'Cessapalombo', 'Cingoli', 'Civitanova Marche', 'Colmurano', 'Corridonia', 'Esanatoglia', 'Fiastra', 'Fiordimonte', 'Fiuminata', 'Gagliole',' Gualdo (MC)', 'Loro Piceno', 'Macerata', 'Matelica', 'Mogliano (MC)', 'Monte Cavallo', 'Monte San Giusto', 'Monte San Martino', 'Montecassiano', 'Montecosaro', 'Montefano', 'Montelupone', 'Morrovalle', 'Muccia',' Penna San Giovanni', 'Petriolo', 'Pieve Torina', 'Pievebovigliana', 'Pioraco', 'Poggio San Vicino', 'Pollenza', 'Porto Recanati', 'Potenza Picena', 'Recanati', 'Ripe San Ginesio', 'San Ginesio', 'San Severino Marche', "Sant'Angelo in Pontano", 'Sarnano', 'Sefro', 'Serrapetrona', 'Serravalle di Chienti', 'Tolentino', 'Treia', 'Urbisaglia', 'Ussita', 'Visso'];
            case 'PU': return ['Acqualagna', 'Apecchio', 'Auditore', 'Barchi', "Belforte all'Isauro", 'Borgo Pace', 'Cagli', 'Cantiano', 'Carpegna', 'Cartoceto', 'Casteldelci', 'Colbordolo', 'Fano', 'Fermignano', 'Fossombrone', 'Fratte Rosa', 'Frontino', 'Frontone (PU)', 'Gabicce Mare', 'Gradara', 'Isola del Piano', 'Lunano', 'Macerata Feltria', 'Maiolo', 'Mercatello sul Metauro', 'Mercatino Conca', 'Mombaroccio', 'Mondavio', 'Mondolfo', 'Monte Cerignone', 'Monte Grimano Terme', 'Monte Porzio', 'Montecalvo in Foglia', 'Monteciccardo', 'Montecopiolo', 'Montefelcino', 'Montelabbate',' Montemaggiore al Metauro', 'Novafeltria',' Orciano di Pesaro', 'Peglio (PU)', 'Pennabilli', 'Pergola', 'Pesaro', 'Petriano', 'Piagge', 'Piandimeleto', 'Pietrarubbia', 'Piobbico', 'Saltara',' San Costanzo',' San Giorgio di Pesaro', 'San Leo', 'San Lorenzo in Campo', "Sant'Agata Feltria", "Sant'Angelo in Lizzola"," Sant'Angelo in Vado", "Sant'Ippolito", 'Sassocorvaro', 'Sassofeltrio',"Serra Sant'Abbondio", 'Serrungarina', 'Talamello', 'Tavoleto', 'Tavullia', 'Urbania', 'Urbino'];
        }
    
    }
}
