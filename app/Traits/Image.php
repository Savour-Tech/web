<?php

namespace App\Traits;

trait Image
{
    //protected static $imagePath;
    //protected static $imageColumn;

    //defaults
    private static $defaults = [
        'imageColumn' => 'image',
        'strict' => false
    ];
    
	public function uploadImage($image, $oimg = null,  $columnName = null)
    {
        $imagePath = static::$imagePath;
        $imageColumn = !empty($columnName)? $columnName : static::$imageColumn;

        if(empty($imageColumn))
            $imageColumn = self::$defaults['imageColumn'];

        $sub = env('APP_SUB');//cause of project folder holder
        $folder = '';//add 'public' for dev

        $abs_path = str_replace($sub, '', base_path($folder.$imagePath));

        //if update
        if(!empty($this->$imageColumn)){
            $imageName = empty($oimg)? $this->$imageColumn : $oimg;
        }else{
            $imageName = empty($oimg)? time().'.'.$image->getClientOriginalExtension() : $oimg;
        }

        $image->move( $abs_path, $imageName);
        $this->$imageColumn = $imageName;

        return $this;
    }


	public function imagePath($abs = false, $strict = false)
    {
        $imageColumn = static::$imageColumn;
        $img = static::$imagePath.'/'.$this->$imageColumn;

        $sub = env('APP_SUB');
        $folder = '';


        $ass_path = asset($img);
        $abs_path = str_replace($sub, '', base_path($folder.$img));

        if (file_exists( $abs_path ) && !empty($this->$imageColumn)) {
            return ($abs)? $abs_path : $ass_path;
        } else {
            return ($strict)? null : asset(static::$imagePath.'/default.jpg');
        }
    }
}
