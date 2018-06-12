<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function gender()
    {
        $this->hasOne('App\Gender');
    }

    public function scenes()
    {
        $this->belongsToMany('App\Scene');
    }

    public function lines()
    {
        $this->hasMany('App\Line');
    }

    public function play()
    {
        $this->belongsTo('App\Play');
    }
}
