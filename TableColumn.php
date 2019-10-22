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

    public $attribute;

    public $footerOptions = [];

    public $headerOptions = [];

    public $number = [];

    public $success = [];

    public $defaultSuccess = [
        'class' => 'process'
    ];

    public $error = [];

    public $defaultError = [
        'class' => 'denied'
    ];

    public $defaultNumber = [
        'style' => [
            'text-align' => 'right',
            'width' => '1%'
        ]
    ];

    public function number($options = [])
    {
        $this->options = HtmlHelper::mergeAttributes($this->number, $this->defaultNumber, $options);

        return $this;
    }

    public function success($options = [])
    {
        $this->options = HtmlHelper::mergeAttributes($this->success, $this->defaultSuccess, $options);

        return $this;
    }

    public function error($options = [])
    {
        $this->options = HtmlHelper::mergeAttributes($this->error, $this->defaultError, $options);

        return $this;
    }

    public function getContent()
    {
        if ($this->content)
        {
            return $this->content;
        }

        if ($this->data && $this->attribute)
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
                    return $data->{$this->attribute};
                }
            }

            if (array_key_exists($this->attribute, $data))
            {
                return $data[$this->attribute];     
            }
        }

        return null;
    }

}