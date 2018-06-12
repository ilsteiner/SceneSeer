<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    public function playwright()
    {
        return $this->belongsTo('App\Playwright');
    }

    public function scenes()
    {
        return $this->hasMany('App\Scene');
    }

    public function characters(){
        return $this->hasMany('App\Character');
    }
}
