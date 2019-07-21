<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

class TableBooleanColumn extends \PhpTheme\Html\TableColumn
{

    public $yes;

    public $no;

    public function renderContent()
    {
        $value = $this->getAttributeValue();

        $yes = $this->yes;

        if (!$yes)
        {
            $yes = t('theme', 'Yes');
        }

        $no = $this->no;

        if (!$no)
        {
            $no = t('theme', 'No');
        }

        return $value ? $yes : $no;
    }

}