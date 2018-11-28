<?php

namespace App;

use App\Traits\Image;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Image, Notifiable;

    const ROLE_CLIENT = 'client';
    const ROLE_CATERER = 'caterer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'phone', 'role', 'password', 
    ];

    protected static $imagePath = '/app-img/users';
    protected static $imageColumn = 'image';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullname()
    {
        return $this->first_name.' '.$this->last_name;
    }

}
