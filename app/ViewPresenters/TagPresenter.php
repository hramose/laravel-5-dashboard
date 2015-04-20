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

}