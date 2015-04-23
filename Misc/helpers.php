<?php

if ( ! function_exists('config'))
{
    /**
     * Get the value of the given key from stored configurations.
     *
     * @param  string $key
     * @param string $default
     * @return null|string
     */
    function site_config($key, $default = null)
    {
        return app('Arminsam\Siteconfig\ConfigManager')->get($key) ?: $default;
    }
}
