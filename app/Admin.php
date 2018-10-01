<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    public static $imagePath = '/admin-img/admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'role', 'is_active', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRole()
    {
        $role = '';

        switch ($this->role) {
            case 0:
                $role = 'developer';
                break;
            
            default:
                $role = 'admin';
                break;
        }

        return $role;
    }

    public function imagePath($abs = false, $strict = false)
    {

        $img = self::$imagePath.'/'.$this->picture;

        $sub = env('APP_SUB');//cause of project folder holder

        $ass_path = asset($img);
        $abs_path = str_replace($sub, '', base_path($img));

        if (file_exists( $abs_path )) {
            return ($abs)? $abs_path : $ass_path;
        } else {
            return ($strict)? null : asset(self::$imagePath.'/default.jpg');
        }
    }
}
