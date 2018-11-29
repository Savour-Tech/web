<?php

namespace App;

use App\Chef;
use App\Vendor;
use App\EventCaterer;
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

    public function isCaterer()
    {
        return ($this->role === self::ROLE_CATERER);
    }


    public function isChef()
    {
        if(!$this->isCaterer())
            return false;

        if(Chef::where('user_id', $this->id)->count() < 1)
            return false;

        return true;

    }

    public function isEventCaterer()
    {
        if(!$this->isCaterer())
            return false;

        if(EventCaterer::where('user_id', $this->id)->count() < 1)
            return false;

        return true;

    }

    public function isVendor()
    {
        if(!$this->isCaterer())
            return false;

        if(Vendor::where('user_id', $this->id)->count() < 1)
            return false;

        return true;

    }

}
