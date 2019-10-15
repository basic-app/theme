<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

class TableLinkColumn extends \PhpTheme\Bootstrap4\TableColumn
{

    public $url;

    public $label;

    public $linkOptions = [];

    public $template = '{label}';

    public $params = [];

    public function renderContent()
    {
        $label = $this->label;

        $linkOptions = $this->linkOptions;

        $linkOptions['href'] = $this->url;

        $linkOptions['title'] = $label;

        $params = $this->params;

        $params['{label}'] = $label;

        $content = strtr($this->template, $params);

        return Html::tag('a', $content, $linkOptions);
    }

}