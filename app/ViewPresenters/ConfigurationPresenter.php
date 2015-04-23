<?php namespace App\ViewPresenters;

use Laracasts\Presenter\Presenter;

class ConfigurationPresenter extends Presenter {

    /**
     * @return string
     */
    public function label()
    {
        return $this->entity->label;
    }

    /**
     * @return string
     */
    public function key()
    {
        return $this->entity->key;
    }

    /**
     * @return string
     */
    public function type()
    {
        switch ($this->entity->type)
        {
            case 'textbox' : return 'Text';
            case 'textarea' : return 'Paragraph';
            case 'wysiwyg' : return 'WYSIWYG';
            case 'datetime' : return 'Date/Time';
            case 'select' : return 'Dropdown Menu';
            case 'multiple' : return 'Multiple Select';
            default : return ucfirst($this->entity->type);
        }
    }

    /**
     * @return string
     */
    public function options()
    {
        return is_array($this->entity->options) ? implode(', ', $this->entity->options) : '-';
    }

}