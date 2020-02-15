<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Core\HtmlHelper;
use BasicApp\Helpers\Url;

class TableUpdateLinkColumn extends TableColumn
{

    public $label;

    public $linkTag = 'a';

    public $linkAttributes = [];

    public $template = '<i class="fa fa-edit"></i>';

    public $params = [];

    public $url;

    public $action;

    public $urlParams = [];

    public function getContent()
    {
        $attributes = $this->linkAttributes;

        $label = $this->label;

        if (!$label)
        {
            $label = t('theme', 'Update');
        }        

        $attributes['title'] = $label;

        if ($this->action)
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

            $attributes['href'] = Url::returnUrl($this->action, $urlParams);
        }
        else
        {
            $attributes['href'] = $this->url;
        }

        $params['{label}'] = $label;

        $content = strtr($this->template, $this->params);

        return HtmlHelper::tag($this->linkTag, $content, $attributes);
    }

}