<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playwright extends Model
{
    public function plays()
    {
        return $this->hasMany('App\Play');
    }
}
