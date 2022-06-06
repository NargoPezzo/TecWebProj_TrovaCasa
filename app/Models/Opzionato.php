<?php

namespace app\Models;

use App\Models\Resources\House;

class Rented
{
    protected $_rented;
    public function make_stats2($tipo, $data_min, $data_max){
		$_accomodations = new Alloggio;
                $messages = new Messaggio;
		if((is_null($data_min)) and is_null($data_max))
                {  
                    $_rented = Alloggio::join('messaggi', 'messaggi.id_alloggio','=','alloggi.id')->count();
		}    
		else
		{
                    $data_min = date("Y-m-d",strtotime($data_min));
                    $data_max = date("Y-m-d",strtotime($data_max));
                    $_rented = Alloggio::join('messaggi', 'messaggi.id_alloggio','=','alloggi.id')->whereRaw(' tipo like "%'. $tipo .'%" and alloggi.created_at between "'. $data_inizio. '" and "'.$data_fine .'" and opzionato = 1')->count();
		}
                return $_rented;
	}
}