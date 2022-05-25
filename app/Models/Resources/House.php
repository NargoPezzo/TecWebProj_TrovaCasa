<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

}
