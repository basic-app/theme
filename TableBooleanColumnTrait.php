<?php

namespace BasicApp\Theme;

use BasicApp\Traits\GetPropertyTrait;
use PhpTheme\Helpers\Html;

trait TableBooleanColumnTrait
{

    use GetPropertyTrait;

    public function createBooleanColumn(array $options = [])
    {
        $defaultOptions = $this->getProperty('defaultBooleanColumn', [
            'headerOptions' => [
                'style' => [
                    'width' => '1%'  
                ]
            ]           
        ]);

        $options = Html::mergeOptions($defaultOptions, $options);

        $return = $this->createColumn($options);

        $return->setRenderContent(function() {
            
            $value = $this->getAttributeValue();

            return $value ? t('theme', 'Yes'): t('theme', 'No');
        });

        return $return;
    }

}