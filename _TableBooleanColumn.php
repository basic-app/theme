<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class TableBooleanColumn extends \PhpTheme\Bootstrap4\TableColumn
{

    public $yes;

    public $no;

    public function getContent()
    {
        $value = parent::getContent();

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

        if ($value)
        {
            $this->success();
        }
        else
        {
            $this->error();
        }

        return $value ? $yes : $no;
    }

}