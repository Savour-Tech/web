<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCaterer extends Model
{
    const CATERER_TYPE = 'event_caterer';

    protected $fillable = ['user_id'];
}
