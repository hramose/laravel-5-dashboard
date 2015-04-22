<?php namespace App\ViewPresenters;

use Laracasts\Presenter\Presenter;

class CommentPresenter extends Presenter {

    /**
     * @return string
     */
    public function content()
    {
        return str_limit($this->entity->content, 35);
    }

    /**
     * @return string
     */
    public function authorName()
    {
        return $this->entity->author ? $this->entity->author->name : 'Guest';
    }

    /**
     * @return string
     */
    public function postLink()
    {
        return link_to_route('post_show', str_limit($this->entity->commentable->title, 25), [$this->entity->commentable->id]);
    }

    /**
     * @return mixed
     */
    public function createdAt()
    {
        return $this->entity->created_at->diffForHumans();
    }

    /**
     * @return string
     */
    public function status()
    {
        return ucfirst($this->entity->status);
    }

}