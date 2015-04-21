<?php namespace App\ViewPresenters;

use Laracasts\Presenter\Presenter;

class TagPresenter extends Presenter {

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
    public function tagLink()
    {
        return link_to_route('tag_show', str_limit('#'.$this->entity->name, 25), [$this->entity->id]);
    }

    /**
     * @return string
     */
    public function entitiesLink()
    {
        $entitiesCount = $this->entity->posts->count();

        return '<a href="'.route('tag_entities', [$this->entity->id]).'"><span class="badge '.(!$entitiesCount ? 'badge-default' : 'badge-primary').'">'.$entitiesCount.'</span></a>';
    }

}