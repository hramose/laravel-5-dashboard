<?php namespace App\ViewPresenters;

use Laracasts\Presenter\Presenter;

class CategoryPresenter extends Presenter {

    /**
     * @return string
     */
    public function name()
    {
        return $this->entity->name;
    }

    /**
     * @return string
     */
    public function categoryLink()
    {
        return link_to_route('category_show', str_limit($this->entity->name, 25), [$this->entity->id]);
    }

    /**
     * @return string
     */
    public function parentName()
    {
        return $this->entity->parent ? $this->entity->parent->name : '-';
    }

    /**
     * @return string
     */
    public function categoryParentLink()
    {
        if (!$this->entity->parent)
        {
            return '-';
        }

        return link_to_route('category_show', str_limit($this->entity->parent->name, 25), [$this->entity->parent->id]);
    }

    /**
     * @return string
     */
    public function entitiesLink()
    {
        $entitiesCount = $this->entity->posts->count();

        return '<a href="'.route('category_entities', [$this->entity->id]).'"><span class="badge '.(!$entitiesCount ? 'badge-default' : 'badge-primary').'">'.$entitiesCount.'</span></a>';
    }

}