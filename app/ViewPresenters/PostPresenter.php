<?php namespace App\ViewPresenters;

use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

    /**
     * @return string
     */
    public function title()
    {
        return str_limit($this->entity->title, 15);
    }

    /**
     * @return string
     */
    public function postLink()
    {
        return link_to_route('post_show', str_limit($this->entity->title, 15), [$this->entity->slug]);
    }

    /**
     * @return string
     */
    public function content()
    {
        return str_limit($this->entity->content, 30);
    }

    /**
     * @return string
     */
    public function authorName()
    {
        return $this->entity->author->name;
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

    /**
     * @param $perPage
     * @param $currentPage
     * @param $index
     *
     * @return mixed
     */
    public function counter($perPage, $currentPage, $index)
    {
        return $perPage * ($currentPage - 1) + ($index + 1);
    }

}