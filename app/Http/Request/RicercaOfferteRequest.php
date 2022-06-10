<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

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
        ];
        
    }

}
