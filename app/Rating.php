<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	const MAX_RATING = 5;

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function get_caterer_rating($id)
    {
        $cnt = self::where('caterer_id', $id)->count();

        $summary = (object)['value' => 0, 'cnt' => $cnt, 'max' => self::MAX_RATING];

        if($cnt < 1)
        	return $summary;

        $total_wgth = 0;

        for ($i=1; $i <= self::MAX_RATING ; $i++) { 
        	
        	$wgth = $i * self::where('caterer_id', $id)->where('rating', $i)->count();
        	$total_wgth += $wgth; 

        }

        $summary->value = $total_wgth/$cnt;

        return $summary;
    }
}
