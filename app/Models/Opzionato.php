<?php

namespace app\Models;

use App\Models\Resources\House;
use App\Models\Resources\Opzione;
use Illuminate\Support\Facades\Log;

class Opzionato
{
    protected $_opzionato;
    
    public function genera_statistiche2($tipo, $data_min, $data_max){
            $_alloggio = new House;
            if ($tipo == 'alloggio')
            {
                $tipo = '';
            }
          
            $opzione = new Opzione;
            if((is_null($data_min)) and is_null($data_max))
            {  
                $_richieste = Opzione::join('houses', 'houses.id','=','opzione.house_id')->whereRaw(' tipologia like "%'. $tipo .'" and opzione.house_id IS NOT NULL')->count();
            }    
            else
            {
                $data_min = date("Y-m-d",strtotime($data_min));
                $data_max = date("Y-m-d",strtotime($data_max));
                $_richieste = Opzione::join('houses', 'houses.id','=','opzione.house_id')->whereRaw(' tipologia like "%'. $tipo .'%" and houses.data_inserimento between "'. $data_min. '" and "'.$data_max .'" and opzione.house_id IS NOT NULL')->count();
            }
            
            return $_richieste;
	}
        

    public function assegnazione($locatario_id, $house_id) {
        $opzione = Opzione::where('locatario_id', $locatario_id)->where('house_id', $house_id)->first();
        $house = House::where('id', $house_id)->first();
        $opzione->assegnato = 1;
        $house->opzionato = 1;
        $house->save();
        $opzione->save();
    }
}