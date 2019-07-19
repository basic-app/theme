<?php

namespace BasicApp\Theme;

use BasicApp\Traits\GetPropertyTrait;
use PhpTheme\Helpers\Html;

trait TableUpdateLinkColumnTrait
{

    use GetPropertyTrait;

    public function createUpdateLinkColumn(array $options = [])
    {
        $defaultOptions = $this->getProperty('defaultUpdateLinkColumn', [
            'options' => [
                'style' => [
                    'padding' => '0px 12px',
                    'vertical-align' => 'middle'
                ]
            ],
            'headerOptions' => [
                'style' => [
                    'width' => '1%',
                    'padding' => '0px 12px',
                    'vertical-align' => 'middle'                
                ]
            ]
        ]);

        $options = Html::mergeOptions($defaultOptions, $options);

        $return = $this->createColumn($options);

        $return->setRenderContent(function() {
            $label = $this->getProperty('label', t('theme', 'Update'));

            $linkOptions = $this->getProperty('linkOptions', []);

            $linkOptions['href'] = $this->getProperty('url', null);

            $linkOptions['title'] = $label;

            $template = $this->getProperty('template', '<i class="fa fa-edit"></i>');

            $params = $this->getProperty('params', []);

            $content = strtr($template, $params);

            return Html::tag('a', $content, $linkOptions);
        });

        return $return;
    }

}