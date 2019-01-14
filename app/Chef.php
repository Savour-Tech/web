<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    const CATERER_TYPE = 'chef';

    protected $fillable = ['user_id'];

    public function menus()
    {
       return $this->hasMany('App\ChefMenu');
    }

    public function portfolios()
    {
       return $this->hasMany('App\ChefPortfolio');
    }
}
