<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = array('name', 'value', 'piority', 'is_constant', 'created_by', 'created_at', 'updated_at');

    public function User()
    {
        return $this->belongsTo('App\Admin', 'created_by');
    }
//admin_email
    public static function setting($name)
    {
        $model = self::where('name', $name)->first();

        return $model['value'];
    }

    public static function flatten($setting = null, $asArray = false){

    	if(!empty($setting)){
    		return [$setting['name'] => $setting['value']];
    	}

    	$settingsMapp = [];
    	$settings = self::get()->toArray();

    	foreach ($settings as $setting) {
            $settingsMapp[$setting['name']] = $setting['value'];
        }

        return $asArray? $settingsMapp: (object)$settingsMapp;

    }
}
