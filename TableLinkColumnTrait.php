<?php

namespace BasicApp\Theme;

use BasicApp\Traits\GetPropertyTrait;
use PhpTheme\Helpers\Html;

trait TableLinkColumnTrait
{

    use GetPropertyTrait;

    public function createLinkColumn(array $options = [])
    {
        $defaultOptions = $this->getProperty('defaultLinkColumn', [
            'headerOptions' => [
                'style' => [
                    'width' => '1%'           
                ]
            ]
        ]);

        $options = Html::mergeOptions($defaultOptions, $options);

        $return = $this->createColumn($options);

        $return->setRenderContent(function() {

            $label = $this->getProperty(label, null);

            $linkOptions = $this->getProperty('linkOptions', []);

            $linkOptions['href'] = $this->getProperty('url', null);

            $linkOptions['title'] = $label;

            $params = $this->getProperty('params', []);

            $params['{label}'] = $label;

            $template = $this->getProperty('template', '{label}');

            $content = strtr($template, $params);

            return Html::tag('a', $content, $linkOptions);
        });

        return $return;
    }

}