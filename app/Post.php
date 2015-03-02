<?php namespace App;

use App\ViewPresenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Post extends Model {

    use SoftDeletes, PresentableTrait;

    protected $presenter = PostPresenter::class;

    protected $fillable = ['title', 'content', 'status'];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
