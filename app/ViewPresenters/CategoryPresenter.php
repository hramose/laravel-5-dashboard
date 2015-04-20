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

}