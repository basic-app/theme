<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;
use BasicApp\Helpers\Url;

class TableDeleteLinkColumn extends \PhpTheme\Bootstrap4\TableColumn
{

    public $id;

    public $label;

    public $url;

    public $template = '<i class="fa fa-times-circle"></i>';

    public $linkOptions = [];

    public $confirmMessage;

    public $params = [];

    public $action;

    public $urlParams = [];

    public function renderContent()
    {
        $id = $this->id;

        if (!$id)
        {
            $id = 'delete-popup-' . $this->row->getPrimaryKey();
        }

        $label = $this->label;

        if (!$label)
        {
            $label = t('theme', 'Delete');
        }

        $url = $this->url;

        $deleteButton = $this->theme->postButton([
            'tag' => 'button',
            'content' => $label,
            'options' => [
                'type' => 'submit',
                'class' => 'btn btn-primary'
            ],
            'url' => $url
        ]);

        $confirmMessage = $this->confirmMessage;

        if (!$confirmMessage)
        {
            $confirmMessage = t('app', 'Are you sure?');
        }

        $popup = $this->theme->popup([
            'id' => $id,
            'title' => $label,
            'content' => '<p>' . $confirmMessage . '</p>',
            'footer' => $deleteButton
        ]);

        $this->theme->endBody .= $popup;

        $linkOptions = $this->linkOptions;

        if ($this->action)
        {
            $urlParams = $this->urlParams;

            $pk = $this->row->getPrimaryKey();

            if (is_array($pk))
            {
                $urlParams = array_merge($urlParams, $pk);
            }
            else
            {
                $urlParams['id'] = $pk;
            }

            $linkOptions['href'] = Url::returnUrl($this->action, $urlParams);
        }
        else
        {
            $linkOptions['href'] = $this->url;
        }        

        $linkOptions['data-target'] = '#' . $id;

        $linkOptions['data-toggle'] = 'modal'; 

        $linkOptions['href'] = '#';

        $linkOptions['style'] = 'color: #ff0000;';

        $content = strtr($this->template, $this->params);

        return Html::tag('a', $content, $linkOptions);        
    }

}