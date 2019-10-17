<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Helpers\Url;

class TableUpdateLinkColumn extends  TableColumn
{

    public $label;

    public $linkOptions = [];

    public $template = '<i class="fa fa-edit"></i>';

    public $params = [];

    public $url;

    public $action;

    public $urlParams = [];

    public function getContent()
    {
        $label = $this->label;

        if (!$label)
        {
            $label = t('theme', 'Update');
        }

        $linkOptions = $this->linkOptions;

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

            $linkOptions['href'] = Url::returnUrl($this->action, $urlParams);
        }
        else
        {
            $linkOptions['href'] = $this->url;
        }

        $linkOptions['title'] = $label;

        $content = strtr($this->template, $this->params);

        return HtmlHelper::tag('a', $content, $linkOptions);
    }

}