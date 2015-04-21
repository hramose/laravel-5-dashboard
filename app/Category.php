<?php namespace App;

use App\ViewPresenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Category extends Model {

    use PresentableTrait;

    public $timestamps = false;

    protected $presenter = CategoryPresenter::class;

    protected $fillable = ['name', 'parent_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'categorizable');
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfName($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('categories.name', 'LIKE', '%' . $value . '%');
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfParentName($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->has('parent', '>', 0, 'and', function($q) use ($value)
        {
            return $q->from(\DB::raw('categories parent'))
                ->orWhereRaw('parent.id = categories.parent_id AND parent.name LIKE "%' . $value . '%"');
        });
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfEntities($query, $value)
    {
        if (empty($value) || !is_numeric($value))
        {
            return $query;
        }

        return $query->has('posts', $value);
    }

}
