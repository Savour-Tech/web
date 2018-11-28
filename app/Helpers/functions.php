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