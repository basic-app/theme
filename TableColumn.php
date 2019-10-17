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

    public $globalOptions = [];

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

    /*

    public $row = [];

    public $options = [];

    public $defaultOptions = [];

    public $header = null;

    public $defaultHeaderOptions = [];

    public $headerTag = 'th';

    public $headerOptions = [];

    public $footer = null;

    public $footerTag = 'td';

    public $defaultFooterOptions = [];

    public $footerOptions = [];

    public $attribute;

    public function getAttributeValue()
    {
        if (is_object($this->row))
        {
            return $this->row->{$this->attribute};
        }
        else
        {
            return $this->row[$this->attribute];
        }        
    }

    public function renderAttribute()
    {
        $return = parent::renderAttribute();

        if ($return !== null)
        {
            return $return;
        }

        $return = $this->getAttributeValue();

        return $return;
    }

    public function renderContent()
    {
        $return = parent::renderContent();

        if ($return !== null)
        {
            return $return;
        }

        $content = $this->content;

        if ($content instanceof Closure)
        {
            return $content($this->row);
        }

        if ($content !== null)
        {
            return $content;
        }

        if ($this->attribute)
        {
            return $this->renderAttribute($this->attribute);
        }

        return '';        
    }

    public function run()
    {
        $content = $this->renderContent();

        $options = HtmlHelper::mergeAttributes($this->defaultOptions, $this->options);

        return HtmlHelper::tag($this->tag, $content, $options);
    }


    */


}