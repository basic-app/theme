<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Core\HtmlHelper;
use BasicApp\Helpers\Url;

class TableDeleteLinkColumn extends TableColumn
{

    public $id;

    public $label;

    public $url;

    public $template = '<i class="fa fa-times-circle"></i>';

    public $linkTag = 'a';

    public $linkAttributes = [];

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
            'attributes' => [
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

        return $this->createLink($id, $this->linkAttributes);
    }

    protected function createLink($id, $attributes = [])
    {
        $attributes['data-target'] = '#' . $id;

        $attributes['data-toggle'] = 'modal'; 

        $attributes['href'] = '#';

        $attributes['style'] = 'color: #ff0000;';

        $content = strtr($this->template, $this->params);

        return HtmlHelper::tag($this->linkTag, $content, $attributes);
    }

}