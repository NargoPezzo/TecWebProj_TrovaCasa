<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RicercaOfferteRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'tip' => '',
            'aprov' => '',
            'plprov' => '',
            'acittà' => '',
            'plcittà' => '',
            'prezzomin' => '',
            'prezzomax' => '',
            'data_min' => '',
            'data_max' => '',
            'superficie' => '',
            'n_camere' => '',
            'n_posti_letto_totali' => '',
            'servizi' => '',
            //'titolo' => 'string|max:50',
            /*'prezzo' => 'numeric|min:0',
            //'descrizione' => 'string|max:2500',
            
            
            'indirizzo' => 'string|max:255',
            'città' => 'string|max:255|required_with:indirizzo',
            'cap' => 'numeric|max:5',
            'provincia' => 'string|max:2',
            
            'immagine' => 'image|max:1024',
            "servizi"    => "array|min:1",*/
        ];
    }

}
