<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    const CATERER_TYPE = 'chef';

    protected $fillable = ['user_id'];
}
