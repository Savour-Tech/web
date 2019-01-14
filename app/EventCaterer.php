<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCaterer extends Model
{
    const CATERER_TYPE = 'event_caterer';

    protected $fillable = ['user_id'];

    public function menus()
    {
       return $this->hasMany('App\EventCatererMenu');
    }

    public function portfolios()
    {
       return $this->hasMany('App\EventCatererPortfolio');
    }
}
