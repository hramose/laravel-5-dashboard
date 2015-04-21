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
        return link_to_route('post_show', str_limit($this->entity->title, 25), [$this->entity->slug]);
    }

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
     * @return string
     */
    public function categoriesList()
    {
        $categories = $this->entity->categories->lists('name', 'id');

        $categories = array_map(function($category, $id) use ($categories)
        {
            return link_to_route('category_show', $category, [$id]);
        }, $categories, array_keys($categories));

        return $categories ? implode($categories, ', ') : '-';
    }

    /**
     * @return string
     */
    public function tagsList()
    {
        $tags = $this->entity->tags->lists('name', 'id');

        $tags = array_map(function($tag, $id) use ($tags)
        {
            return link_to_route('tag_show', '#' . $tag, [$id]);
        }, $tags, array_keys($tags));

        return $tags ? implode($tags, ', ') : '-';
    }

    /**
     * @return string
     */
    public function commentsLink()
    {
        $commentsCount = $this->entity->comments->count();

        return '<a href="'.route('post_comments', [$this->entity->id]).'"><span class="badge '.(!$commentsCount ? 'badge-default' : 'badge-primary').'">'.$commentsCount.'</span></a>';
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