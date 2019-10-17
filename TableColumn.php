<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;

class TableColumn extends \PhpTheme\Html\BaseTableColumn
{

    abstract public function run();

    public $defaultNumberOptions = [
        'style' => [
            'text-align' => 'right',
            'width' => '1%'
        ]
    ];

    public function number($options = [])
    {
        $this->options = HtmlHelper::mergeAttributes($this->options, $this->defaultNumberOptions);

        $this->options = HtmlHelper::mergeAttributes($this->options, $options);

        return $this;
    }

    public function getHeader()
    {
        if ($this->attribute && $this->row)
        {
            return $this->row->label($this->attribute);
        }

        return null;
    }

}