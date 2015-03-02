<?php namespace App\ViewPresenters;

use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

    /**
     * @return string
     */
    public function postTitle()
    {
        return str_limit($this->title, 15);
    }
    /**
     * @return string
     */
    public function postContent()
    {
        return str_limit($this->content, 30);
    }

    /**
     * @return mixed
     */
    public function publishedAt()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * @return string
     */
    public function postStatus()
    {
        return ucfirst($this->status);
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