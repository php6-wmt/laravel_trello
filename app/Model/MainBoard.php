<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MainBoard extends Model
{
    protected $table = "mainboard";
    public function card()
    {
        return $this->hasMany('App/Model/card');
    }
}
