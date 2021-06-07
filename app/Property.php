<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    // Change primary key field
    public $primaryKey = 'id'; // that's the name we have in the DB

    public function user() 
    {
        return $this->belongsTo('App\User'); 
    }
}