<?php namespace App;

use App\ViewPresenters\CommentPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Comment extends Model {

    use SoftDeletes, PresentableTrait;

    protected $presenter = CommentPresenter::class;

    protected $fillable = ['content', 'status'];

    protected $dates = ['deleted_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post', 'commentable_id', 'id');
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
    public function scopeOfPostTitle($query, $value)
    {
        if (empty($value))
        {
            return $query;
        }

        return $query->whereHas('post', function($q) use ($value)
        {
            return $q->where('title', 'LIKE', '%' . $value . '%');
        });
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

        return $query->where('comments.content', 'LIKE', '%' . $value . '%');
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

        return $query->where('comments.status', $value);
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

        return $query->where('comments.created_at', '>=', $startDate)->where('comments.created_at', '<=', $endDate);
    }

}
