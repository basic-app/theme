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

    const COLUMN = TableColumn::class;

    const LINK_COLUMN = TableLinkColumn::class;

    const UPDATE_LINK_COLUMN  = TableUpdateLinkColumn::class;

    const DELETE_LINK_COLUMN = TableDeleteLinkColumn::class;

    const BOOLEAN_COLUMN = TableBooleanColumn::class;

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

    public $defaultBooleanColumn = [
        'headerOptions' => [
            'style' => [
                'width' => '1%'  
            ]
        ]
    ];

    public $defaultUpdateLinkColumn = [
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

    public $defaultDeleteLinkColumn = [
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
        $options = HtmlHelper::mergeAttributes($this->defaultBooleanColumn, $options);

        return $this->theme->createWidget(static::BOOLEAN_COLUMN, $options);
    }

    public function createUpdateLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultUpdateLinkColumn, $options);

        return $this->theme->createWidget(static::UPDATE_LINK_COLUMN, $options);
    }

    public function createDeleteLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultDeleteLinkColumn, $options);

        return $this->theme->createWidget(static::DELETE_LINK_COLUMN, $options);
    }

    public function createLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->defaultLinkColumn, $options);

        return $this->theme->createWidget(static::LINK_COLUMN, $options);
    }    

    public function createHeader(array $params = [])
    {
        if ($this->labels)
        {
            $params['rows'][] = ['columns' => $this->labels];
        }

        $return = parent::createHeader($params);

        /*

        foreach($this->headerColumnOptions as $key => $options)
        {
            foreach($return->rows as $k => $v)
            {
                $column = $v->columns[$key];

                $column->options = Html::mergeAttributes($column->options, $options);
            }
        }

        */

        return $return;
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

                foreach($columns as $key => $column)
                {
                    $column->data = $data;

                    if (!array_key_exists($key, $this->headerColumnOptions) && $column->headerOptions)
                    {
                        $this->headerColumnOptions[$key] = $column->headerOptions;
                    }

                    if (!array_key_exists($key, $this->footerColumnOptions) && $column->footerOptions)
                    {
                        $this->footerColumnOptions[$key] = $column->footerOptions;
                    }
                }

                $params['rows'][] = ['columns' => $columns];
            }
        }

        return parent::createBody($params);
    }

}