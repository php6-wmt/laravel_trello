<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "task";
    public function card()
    {
        return $this->belongsTo('App/Model/Card');
    }
}
