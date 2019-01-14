<?php

namespace App;

use App\Traits\Image;
use Illuminate\Database\Eloquent\Model;

class EventCatererPortfolio extends Model
{
    use Image;

    protected $fillable = ['chef_id', 'title', 'description', 'tags', 'image'];

    public static $imagePath = '/app-img/portfolios';
    public static $imageColumn = 'image';
}
