<?php namespace App;

use App\ViewPresenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Category extends Model {

    use PresentableTrait;

    public $timestamps = false;

    protected $presenter = CategoryPresenter::class;

    protected $fillable = ['name', 'parent'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'id', 'parent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'categorizable');
    }

}
