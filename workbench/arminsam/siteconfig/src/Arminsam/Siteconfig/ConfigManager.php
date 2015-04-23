<?php namespace Arminsam\Siteconfig;

class ConfigManager {

    /**
     * @param $key
     *
     * @return string
     */
    public function get($key)
    {
        $keySections = explode('.', $key);

        // if given key starts with site.*, we will get its value from configuration table/cache
        if ($keySections[0] == 'site')
        {
            return \Cache::rememberForever($key, function() use ($keySections)
            {
                $model = \DB::table('configurations')->where('key', $keySections[1])->first();

                return $model->value;
            });
        }

        // otherwise, we will get it from config files as normal
        return \Config::get($key);
    }

}