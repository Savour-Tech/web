<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChefMenu extends Model
{
    protected $fillable = ['chef_id', 'name', 'description', 'ingredients', 'cook_time', 'servings'];

    public function chef()
    {
       return $this->belongsTo('App\Chef');
    }
}
