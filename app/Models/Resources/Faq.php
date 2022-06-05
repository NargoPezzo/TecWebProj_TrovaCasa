<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Faqs;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    protected $fillable=['domanda','risposta'];
    
    
    public function getSingleFaq ($id){
        return Faq::where('id', $id)->first();
    }

}
