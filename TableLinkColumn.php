<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;

class TableLinkColumn extends TableColumn
{

    public $url;

    public $label;

    public $linkOptions = [];

    public $template = '{label}';

    public $params = [];

    public function getContent()
    {
        $label = $this->label;

        $linkOptions = $this->linkOptions;

        $linkOptions['href'] = $this->url;

        $linkOptions['title'] = $label;

        $params = $this->params;

        $params['{label}'] = $label;

        $content = strtr($this->template, $params);

        return HtmlHelper::tag('a', $content, $linkOptions);
    }

}