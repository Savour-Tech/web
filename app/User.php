<?php

namespace App;

use App\Traits\Image;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Image, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'phone', 'sponsor_id', 'password', 
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

    public function getAge()
    {
        return floor((strtotime('now') - strtotime($this->age)) / 31556926);
    }

    public function getRegisterUrl()
    {
        return url('/register/'.$this->username);
    }

    public function getFullname()
    {
        return $this->first_name.' '.$this->last_name;
    }

}
