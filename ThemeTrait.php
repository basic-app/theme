<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;
use BasicApp\Traits\GetPropertyTrait;

trait ThemeTrait
{

    use GetPropertyTrait;

    public function postButton(array $options = [])
    {
        $defaultPostButtonOptions = $this->getProperty('defaultPostButtonOptions', []);

        $options = Html::mergeOptions($defaultPostButtonOptions, $options);

        $postButtonClass = $this->getProperty('postButtonClass', PostButton::class);

        return $this->widget($postButtonClass, $options);
    }

    public function createForm(array $options = [])
    {
        $defaultFormOptions = $this->getProperty('defaultFormOptions', []);

        $options = Html::mergeOptions($defaultFormOptions, $options);

        $formClass = $this->getProperty('formClass', Form::class);

        return $this->createWidget($formClass, $options);
    }

}