<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Core\Theme;
use PhpTheme\Core\HtmlHelper;
use PhpTheme\Html\BaseTable;

class Table extends BaseTable
{

    const COLUMN = TableColumn::class;

    const LINK_COLUMN = TableLinkColumn::class;

    const UPDATE_LINK_COLUMN  = TableUpdateLinkColumn::class;

    const DELETE_LINK_COLUMN = TableDeleteLinkColumn::class;

    const BOOLEAN_COLUMN = TableBooleanColumn::class;

    protected $theme;

    public $bodyRows;

    public $labels = [];

    public $elements = [];

    public $columns;

    public $headerColumnAttributes = [];

    public $footerColumnAttributes = [];

    public $linkColumnOptions = [
        'headerAttributes' => [
            'style' => [
                'width' => '1%'           
            ]
        ]
    ];

    public $booleanColumnOptions = [
        'headerAttributes' => [
            'style' => [
                'width' => '1%'  
            ]
        ]
    ];

    public $updateLinkColumnOptions = [
       'attributes' => [
            'style' => [
                'padding' => '0px 12px',
                'vertical-align' => 'middle'
            ]
        ],
        'headerAttributes' => [
            'style' => [
                'width' => '1%',
                'padding' => '0px 12px',
                'vertical-align' => 'middle'                
            ]        
        ]
    ];

    public $deleteLinkColumnOptions = [
        'attributes' => [
            'style' => [
                'padding' => '0px 20px',
                'vertical-align' => 'middle'
            ]
        ],
        'headerAttributes' => [
            'style' => [
                'width' => '1%',
                'padding' => '0px 12px',
                'vertical-align' => 'middle'                
            ]
        ]
    ];

    public function createBooleanColumn(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->booleanColumnOptions, $options);

        $options['class'] = static::BOOLEAN_COLUMN;

        return $this->createColumn($options);
    }

    public function createUpdateLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->updateLinkColumnOptions, $options);

        $options['class'] = static::UPDATE_LINK_COLUMN;

        return $this->createColumn($options);
    }

    public function createDeleteLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->deleteLinkColumnOptions, $options);

        $options['class'] = static::DELETE_LINK_COLUMN;

        return $this->createColumn($options);
    }

    public function createLinkColumn(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->linkColumnOptions, $options);

        $options['class'] = static::LINK_COLUMN;

        return $this->createColumn($options);
    }    

    public function createHeader(array $params = [])
    {
        if ($this->labels)
        {
            $params['rows'][] = ['columns' => $this->labels];
        }

        $return = parent::createHeader($params);

        foreach($this->headerColumnAttributes as $key => $attributes)
        {
            foreach($return->getRows() as $k => $row)
            {
                $columns = $row->getColumns();

                $column = $columns[$key];

                $column->attributes = HtmlHelper::mergeAttributes($column->attributes, $attributes);
            }
        }

        return $return;
    }

    public function createBody(array $params = [])
    {   
        if (is_array($this->bodyRows))
        {
            $params['rows'] = $this->bodyRows;
        }
        else
        {
            if ($this->elements)
            {
                foreach($this->elements as $data)
                {
                    $columnFunction = $this->columns;

                    $columnFunction = $columnFunction->bindTo($this);

                    $columns = $columnFunction($data);

                    foreach($columns as $key => $column)
                    {
                        $column->data = $data;

                        if (!array_key_exists($key, $this->headerColumnAttributes) && $column->headerAttributes)
                        {
                            $this->headerColumnAttributes[$key] = $column->headerAttributes;
                        }

                        if (!array_key_exists($key, $this->footerColumnAttributes) && $column->footerAttributes)
                        {
                            $this->footerColumnAttributes[$key] = $column->footerAttributes;
                        }
                    }

                    $params['rows'][] = ['columns' => $columns];
                }
            }
        }
        
        return parent::createBody($params);
    }

    public function createFooter(array $params = [])
    {
        $return = parent::createFooter($params);

        foreach($this->footerColumnAttributes as $key => $attributes)
        {
            foreach($return->getRows() as $k => $row)
            {
                $columns = $row->getColumns();

                $column = $columns[$key];

                $column->attributes = HtmlHelper::mergeAttributes($column->attributes, $attributes);
            }
        }

        return $return;
    }

}