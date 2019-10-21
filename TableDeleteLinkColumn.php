<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Helpers\Url;

class TableDeleteLinkColumn extends TableColumn
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

    public function getContent()
    {
        $id = $this->id;

        if (!$id)
        {
            $id = 'delete-popup-' . $this->data->getPrimaryKey();
        }

        $label = $this->label;

        if (!$label)
        {
            $label = t('theme', 'Delete');
        }

        if ($this->url)
        {
            $url = $this->url;
        }
        elseif($this->action)
        {
            $urlParams = $this->urlParams;

            $pk = $this->data->getPrimaryKey();

            if (is_array($pk))
            {
                $urlParams = array_merge($urlParams, $pk);
            }
            else
            {
                $urlParams['id'] = $pk;
            }

            $url = Url::returnUrl($this->action, $urlParams);
        }

        $deleteButton = $this->table->theme->postButton([
            'tag' => 'button',
            'content' => $label,
            'options' => [
                'type' => 'submit',
                'class' => 'btn btn-primary',
                'name' => 'delete'
            ],
            'url' => $url
        ]);

        $confirmMessage = $this->confirmMessage;

        if (!$confirmMessage)
        {
            $confirmMessage = t('app', 'Are you sure?');
        }

        $popup = $this->table->theme->popup([
            'id' => $id,
            'title' => $label,
            'content' => '<p>' . $confirmMessage . '</p>',
            'footer' => $deleteButton
        ]);

        $this->table->theme->endBody .= $popup;

        $linkOptions = $this->linkOptions;

        $linkOptions['data-target'] = '#' . $id;

        $linkOptions['data-toggle'] = 'modal'; 

        $linkOptions['href'] = '#';

        $linkOptions['style'] = 'color: #ff0000;';

        $content = strtr($this->template, $this->params);

        return HtmlHelper::tag('a', $content, $linkOptions);        
    }

}