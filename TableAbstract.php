<?php
/**
 * @copyright Copyright (c) 2018-2019 PhpTheme Dev Team
 * @link http://getphptheme.com
 * @license MIT License
 */
namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;
use BasicApp\Theme\TableUpdateLinkColumn;
use BasicApp\Theme\TableDeleteLinkColumn;
use BasicApp\Theme\TableBooleanColumn;
use BasicApp\Theme\TableLinkColumn;

abstract class TableAbstract extends \PhpTheme\Html\BaseTableAbstract
{

    public $linkColumnClass = TableLinkColumn::class;

    public $updateLinkColumnClass = TableUpdateLinkColumn::class;

    public $deleteLinkColumnClass = TableDeleteLinkColumn::class;

    public $booleanColumnClass = TableBooleanColumn::class;

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

    abstract public function run();

    public function createBooleanColumn(array $options = [])
    {
        $options = Html::mergeOptions($this->defaultBooleanColumnOptions, $options);

        return $this->theme->createWidget($this->booleanColumnClass, $options);
    }

    public function createUpdateLinkColumn(array $options = [])
    {
        $options = Html::mergeOptions($this->defaultUpdateLinkColumnOptions, $options);

        return $this->theme->createWidget($this->updateLinkColumnClass, $options);
    }

    public function createDeleteLinkColumn(array $options = [])
    {
        $options = Html::mergeOptions($this->defaultDeleteLinkColumnOptions, $options);

        return $this->theme->createWidget($this->deleteLinkColumnClass, $options);
    }

    public function createLinkColumn(array $options = [])
    {
        $options = Html::mergeOptions($this->defaultLinkColumnOptions, $options);

        return $this->theme->createWidget($this->linkColumnClass, $options);
    }    

}