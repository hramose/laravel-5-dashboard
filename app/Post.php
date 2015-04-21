<?php namespace App;

use App\ViewPresenters\PostPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Post extends Model {

    use SoftDeletes, PresentableTrait;

    protected $presenter = PostPresenter::class;

    protected $fillable = ['title', 'content', 'status'];

    protected $dates = ['deleted_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categorizable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function comments()
    {
        return $this->morphToMany('App\Comment', 'commentable');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeLastWeek($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subWeek());
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeLastMonth($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subMonth());
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeLastYear($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subYear());
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfTitle($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('title', 'LIKE', '%' . $value . '%');
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfContent($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('content', 'LIKE', '%' . $value . '%');
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfAuthorName($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->whereHas('author', function($q) use ($value)
        {
            return $q->where('name', 'LIKE', '%' . $value . '%');
        });
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfStatus($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->where('status', $value);
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfComments($query, $value)
    {
        if (empty($value) || !is_numeric($value))
        {
            return $query;
        }

        return $query->has('comments', $value);
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeOfCreatedAt($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        $startDate = date('Y-m-d 00:00:00', strtotime($value));
        $endDate = date('Y-m-d 23:59:59', strtotime($value));

        return $query->where('posts.created_at', '>=', $startDate)->where('posts.created_at', '<=', $endDate);
    }

}
