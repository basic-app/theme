<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class TableBooleanColumn extends \PhpTheme\Bootstrap4\TableColumn
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