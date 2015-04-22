<?php

if ( ! function_exists('site_config'))
{
    /**
     * Get the given option from stored configurations.
     *
     * @param  string  $option
     * @return string|null
     */
    function site_config($option)
    {
        return app('Arminsam\Siteconfig\ConfigManager')->get($option);
    }
}
