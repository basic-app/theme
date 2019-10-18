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

    public $data;

    public $attribute;

    public $defaultNumberOptions = [
        'style' => [
            'text-align' => 'right',
            'width' => '1%'
        ]
    ];

    public function number($options = [])
    {
        $this->options = HtmlHelper::mergeAttributes($this->options, $this->defaultNumberOptions, $options);

        return $this;
    }

    public function getContent()
    {
        $content = $this->content;

        if ($content instanceof Closure)
        {
            return $content($this->data);
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

    public function renderAttribute($attribute)
    {
        $data = $this->data;

        if (is_object($data))
        {
            if (method_exists($data, 'toArray'))
            {
                $data = $data->toArray();
            }
            else
            {

                return $data->{$attribute};
            }
        }

        return $data[$this->attribute];     
    }

}