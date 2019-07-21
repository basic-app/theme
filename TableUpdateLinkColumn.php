<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

class TableUpdateLinkColumn extends \PhpTheme\Html\TableColumn
{

    public $label;

    public $linkOptions = [];

    public $template = '<i class="fa fa-edit"></i>';

    public $params = [];

    public $url;

    public function renderContent()
    {
        $label = $this->label;

        if (!$label)
        {
            $label = t('theme', 'Update');
        }

        $linkOptions = $this->linkOptions;

        $linkOptions['href'] = $this->url;

        $linkOptions['title'] = $label;

        $content = strtr($this->template, $this->params);

        return Html::tag('a', $content, $linkOptions);
    }

}