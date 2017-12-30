<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "card";
    public function mainboard()
    {
        return $this->belongsTo(MainBoard::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
