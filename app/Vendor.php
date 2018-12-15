<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    const CATERER_TYPE = 'vendor';

    protected $fillable = ['user_id'];
}
