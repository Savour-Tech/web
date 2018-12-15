<?php

if (!function_exists('theme_config')) {
    /**
     * Get theme config
     *
     * @param  array $config Configuration
     * @param  string $name Configuration Name
     * @param  bool $default Configuration Default Value
     * @return any
     */
    function theme_config($config = [], $name, $default = true)
    {
        return isset($config[$name])? $config[$name]: $default;
    }
}

if (!function_exists('is_opt_selected')) {
    function is_opt_selected($v, $k){
        echo ($v == $k)? 'selected' : '';
    }
}

if (!function_exists('caterer_has_type')) {
    function caterer_has_type($user){

        return (!$user->isChef() && !$user->isEventCaterer() && !$user->isVendor());
            
    }
}


if (!function_exists('rating_star_class')) {
    function rating_star_class($star, $value){

        //.5 
        if( $value > $star  && $value < ($star + 1) )
            echo "fa-star-half";

        else if( $value >= $star )
            echo "fa-star";

        else if( $value < $star )
            echo "fa-star-o";
    }
}

    