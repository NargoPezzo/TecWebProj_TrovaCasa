<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Servizio;

class Servizi extends Model
{
    public function getServizi() {
        $servizi = Servizio::all();
        return $servizi;
    }
}
