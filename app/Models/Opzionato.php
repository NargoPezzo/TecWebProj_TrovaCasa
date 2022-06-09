<?php

namespace app\Models;

use App\Models\Resources\House;
use App\Models\Resources\Opzione;
use Illuminate\Support\Facades\Log;

class Opzionato
{
    protected $_opzionato;
    
    public function genera_statistiche2($tipo, $data_min, $data_max){
		$_alloggi = new House;
                $messages = new Messaggio; //da fareeee
		if((is_null($data_min)) and is_null($data_max))
                {  
                    $_opzionato = House::join('messaggi', 'messaggi.id_alloggio','=','alloggi.id')->count();
		}    
		else
		{
                    $data_min = date("Y-m-d",strtotime($data_min));
                    $data_max = date("Y-m-d",strtotime($data_max));
                    $_opzionato = House::join('messaggi', 'messaggi.id_alloggio','=','alloggi.id')->whereRaw(' tipo like "%'. $tipo .'%" and alloggi.created_at between "'. $data_min. '" and "'.$data_max .'" and opzionato = 1')->count();
		}
                return $_opzionato;
	}
        
    public function assegnazione($locatario_id, $house_id) {
        $opzione = Opzione::where('locatario_id', $locatario_id)->where('house_id', $house_id)->first();
        $house = House::where('id', $house_id)->first();
        Log::info('opzione');
        Log::info($locatario_id);
        Log::info($house_id);
        Log::info(strval($opzione));
        Log::info(strval($house));
        $opzione->assegnato = 1;
        $house->opzionato = 1;
        $house->save();
        $opzione->save();
    }
}