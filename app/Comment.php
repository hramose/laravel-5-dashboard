<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Comment extends Model {

    use SoftDeletes, PresentableTrait;

//    protected $presenter = CommentPresenter::class;

    protected $fillable = ['content', 'status'];

    protected $dates = ['deleted_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'commentable');
    }

}
