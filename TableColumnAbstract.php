<?php
/**
 * @copyright Copyright (c) 2018-2019 PhpTheme Dev Team
 * @link http://getphptheme.com
 * @license MIT License
 */
namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

abstract class TableColumnAbstract extends \PhpTheme\Html\BaseTableColumnAbstract
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
        $this->options = Html::mergeOptions($this->options, $this->defaultNumberOptions);

        $this->options = Html::mergeOptions($this->options, $options);

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