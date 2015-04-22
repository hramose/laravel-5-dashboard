<?php namespace Arminsam\Siteconfig;

class ConfigManager {

    /**
     * @param $option
     *
     * @return string
     */
    public function get($option)
    {
        $optionSections = explode('.', $option);

        // if given option starts with site.*, we will get its value from configuration table/cache
        if ($optionSections[0] == 'site')
        {
            return \Cache::rememberForever($option, function() use ($optionSections)
            {
                $model = \DB::table('configurations')->where('option', $optionSections[1])->first();

                return $model->value;
            });
        }

        // otherwise, we will get it from config files as normal
        return \Config::get($option);
    }

}