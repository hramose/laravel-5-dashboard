<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    /**
     * @param $value
     *
     * @return string
     */
    public function getKeyAttribute($value)
    {
        if (in_array($this->attributes['type'], ['checkbox', 'multiple']))
        {
            return $value . '[]';
        }

        return $value;
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getValueAttribute($value)
    {
        if (in_array($this->attributes['type'], ['checkbox', 'multiple']))
        {
            return json_decode($value, true);
        }

        return $value;
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getOptionsAttribute($value)
    {
        if (in_array($this->attributes['type'], ['checkbox', 'radio', 'select', 'multiple']))
        {
            return json_decode($value, true);
        }

        return $value;
    }

}
