<?php namespace App;

use App\ViewPresenters\ConfigurationPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Configuration extends Model {

    use PresentableTrait;

    protected $presenter = ConfigurationPresenter::class;

    protected $fillable = ['label', 'key', 'type', 'options'];

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfLabel($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('label', 'LIKE', '%' . $value . '%');
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfKey($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('key', 'LIKE', '%' . $value . '%');
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfType($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('type', $value);
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfOptions($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('options', 'LIKE', '%' . $value . '%');
    }

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
