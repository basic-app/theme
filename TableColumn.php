<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;

class TableColumn extends \PhpTheme\Html\BaseTableColumn
{

    public $data = [];

    public $field;

    public $footerAttributes = [];

    public $headerAttributes = [];

    public $successAttributes = [
        'class' => 'process'
    ];

    public $errorAttributes = [
        'class' => 'denied'
    ];

    public $numberAttributes = [
        'style' => [
            'text-align' => 'right',
            'width' => '1%'
        ]
    ];

    public function number($attributes = [])
    {
        $this->attributes = HtmlHelper::mergeAttributes($this->numberAttributes, $attributes);

        return $this;
    }

    public function success($attributes = [])
    {
        $this->attributes = HtmlHelper::mergeAttributes($this->successAttributes, $attributes);

        return $this;
    }

    public function error($attributes = [])
    {
        $this->attributes = HtmlHelper::mergeAttributes($this->errorAttributes, $attributes);

        return $this;
    }

    public function getContent()
    {
        if ($this->content)
        {
            return $this->content;
        }

        if ($this->data && $this->field)
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
                    return $data->{$this->field};
                }
            }

            if (array_key_exists($this->field, $data))
            {
                return $data[$this->field];     
            }
        }

        return null;
    }

}