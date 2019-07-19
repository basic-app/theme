<?php

namespace BasicApp\Theme;

use BasicApp\Traits\GetPropertyTrait;
use PhpTheme\Helpers\Html;

trait TableDeleteLinkColumnTrait
{

    use GetPropertyTrait;

    public function createDeleteLinkColumn(array $options = [])
    {
        $defaultOptions = $this->getProperty('defaultDeleteLinkColumn', [
            'options' => [
                'style' => [
                    'padding' => '0px 20px',
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

            $id = $this->getProperty('id', 'delete-popup-' . $this->row->getPrimaryKey());

            $label = $this->getProperty('label', t('theme', 'Delete'));

            $url = $this->getProperty('url', null);

            $deleteButton = $this->theme->postButton([
                'tag' => 'button',
                'content' => $label,
                'options' => [
                    'type' => 'submit',
                    'class' => 'btn btn-primary'
                ],
                'url' => $url
            ]);

            $popup = $this->theme->popup([
                'id' => $id,
                'title' => $label,
                'content' => '<p>' . t('theme', 'Are you sure?') . '</p>',
                'footer' => $deleteButton
            ]);

            $this->theme->endBody .= $popup;

            $linkOptions = $this->getProperty('linkOptions', []);

            $linkOptions['data-target'] = '#' . $id;

            $linkOptions['data-toggle'] = 'modal'; 

            $linkOptions['href'] = '#';

            $linkOptions['style'] = 'color: #ff0000;';

            $template = $this->getProperty('template', '<i class="fa fa-times-circle"></i>');

            $params = $this->getProperty('params', []);

            $content = strtr($template, $params);

            return Html::tag('a', $content, $linkOptions);
        });

        return $return;
    }

}