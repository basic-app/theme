<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Theme\TableUpdateLinkColumn;
use BasicApp\Theme\TableDeleteLinkColumn;
use BasicApp\Theme\TableBooleanColumn;
use BasicApp\Theme\TableLinkColumn;

class Table extends \PhpTheme\Html\BaseTable
{

    const LINK_COLUMN = TableLinkColumn::class;

    const UPDATE_LINK_COLUMN  = TableUpdateLinkColumn::class;

    const DELETE_LINK_COLUMN = TableDeleteLinkColumn::class;

    const BOOLEAN_LINK_COLUMN = TableBooleanColumn::class;

    public $labels = [];

    public $data = [];

    public $columns;

    public $defaultLinkColumnOptions = [
        'headerOptions' => [
            'style' => [
                'width' => '1%'           
            ]
        ]
    ];

    public $defaultBooleanColumnOptions = [
        'headerOptions' => [
            'style' => [
                'width' => '1%'  
            ]
        ]
    ];

    public $defaultUpdateLinkColumnOptions = [
       'options' => [
            'style' => [
                'padding' => '0px 12px',
                'vertical-align' => 'middle'
            ]
        ],
        'headerOptions' => [
            'style' => [
                'width' => '1%',
                'padding' => '0px 12px',
                'vertical-align' => 'middle'                
            ]
        ]
    ];

    public $defaultDeleteLinkColumnOptions = [
        'options' => [
            'style' => [
                'padding' => '0px 20px',
                'vertical-align' => 'middle'
            ]
        ],
        'headerOptions' => [
            'style' => [
                'width' => '1%',
                'padding' => '0px 12px',
                'vertical-align' => 'middle'                
            ]
        ]
    ];

    public function createBooleanColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultBooleanColumnOptions, $options);

        return $this->theme->createWidget(static::BOOLEAN_LINK_COLUMN, $options);
    }

    public function createUpdateLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultUpdateLinkColumnOptions, $options);

        return $this->theme->createWidget(static::UPDATE_LINK_COLUMN, $options);
    }

    public function createDeleteLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultDeleteLinkColumnOptions, $options);

        return $this->theme->createWidget(static::DELETE_LINK_COLUMN, $options);
    }

    public function createLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultLinkColumnOptions, $options);

        return $this->theme->createWidget(static::LINK_COLUMN, $options);
    }    

    public function createHeader(array $params = [])
    {
        if ($this->labels)
        {
            $params['rows'][] = ['columns' => $this->labels];
        }

        return parent::createHeader($params);
    }

    public function createBody(array $params = [])
    {
        if ($this->data)
        {
            foreach($this->data as $data)
            {
                $columnFunction = $this->columns;

                $columnFunction = $columnFunction->bindTo($this);

                $columns = $columnFunction($data);

                foreach($columns as $key => $value)
                {
                    $value->data = $data;
                }

                $params['body']['rows'][] = ['columns' => $columns];
            }
        }

        return parent::createHeader($params);
    }

}