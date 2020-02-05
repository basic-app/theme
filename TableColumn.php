<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Core\HtmlHelper;

class TableColumn extends \PhpTheme\Html\BaseTableColumn
{

    public $data = [];

    public $field;

    public $footerAttributes = [];

    public $headerAttributes = [];

    public $successAttributes = [
        'class' => ['process']
    ];

    public $errorAttributes = [
        'class' => ['denied']
    ];

    public $numberAttributes = [
        'style' => [
            'text-align' => 'right',
            'width' => '1%'
        ]
    ];

    public $escapeContent = true;

    public function number($attributes = [])
    {
        $this->attributes = HtmlHelper::mergeAttributes($this->attributes, $this->numberAttributes, $attributes);

        return $this;
    }

    public function success($attributes = [])
    {
        $this->attributes = HtmlHelper::mergeAttributes($this->attributes, $this->successAttributes, $attributes);

        return $this;
    }

    public function error($attributes = [])
    {
        $this->attributes = HtmlHelper::mergeAttributes($this->attributes, $this->errorAttributes, $attributes);

        return $this;
    }

    public function getContent()
    {
        $return = null;

        if ($this->content)
        {
            $return = $this->content;
        }
        else
        {
            if ($this->data && $this->field)
            {
                $data = $this->data;

                if (is_object($data))
                {
                    if (method_exists($data, 'toArray'))
                    {
                        $data = $data->toArray();

                        if (array_key_exists($this->field, $data))
                        {
                            $return = $data[$this->field];     
                        }
                    }
                    else
                    {
                        $return = $data->{$this->field};
                    }
                }
                else
                {
                    if (array_key_exists($this->field, $data))
                    {
                        $return = $data[$this->field];     
                    }
                }
            }
        }

        if ($return && $this->escapeContent)
        {
            $return = HtmlHelper::escape($return);
        }

        return $return;
    }

}