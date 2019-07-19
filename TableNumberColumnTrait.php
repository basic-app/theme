<?php

namespace BasicApp\Theme;

use BasicApp\Traits\GetPropertyTrait;
use PhpTheme\Helpers\Html;

trait TableNumberColumnTrait
{

    use GetPropertyTrait;

    public function number()
    {
        $options = $this->getProperty('numberOptions', [
            'style' => [
                'text-align' => 'right',
                'width' => '1%'
            ]
        ]);

        $this->options = Html::mergeOptions($this->options, $options);

        return $this;
    }

}