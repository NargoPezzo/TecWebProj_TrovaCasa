<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Faq;

class Faqs extends Model
{
    public function getFaqs() {
        $faqs = Faq::all();
        return $faqs;
    }
}
