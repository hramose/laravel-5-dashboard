<?php namespace App;

use App\ViewPresenters\TagPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Tag extends Model {

    use PresentableTrait;

    public $timestamps = false;

    protected $presenter = TagPresenter::class;

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

}
