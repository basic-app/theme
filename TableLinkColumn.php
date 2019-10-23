<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;

class TableLinkColumn extends TableColumn
{

    public $url;

    public $label;

    public $linkTag = 'a';

    public $linkAttributes = [];

    public $template = '{label}';

    public $params = [];

    public function getContent()
    {
        $label = $this->label;

        $attributes = $this->linkAttributes;

        $attributes['href'] = $this->url;

        $attributes['title'] = $label;

        $params = $this->params;

        $params['{label}'] = $label;

        $content = strtr($this->template, $params);

        return HtmlHelper::tag($this->linkTag, $content, $attributes);
    }

}