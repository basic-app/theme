<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class GridCellBoolean extends \PhpTheme\Themes\Bootstrap4\GridCellBoolean
{

    public $yesLabel = null;

    public $noLabel = null;

    protected function getYesLabel() : string
    {
        return $this->yesLabel ?? t('theme', 'Yes');
    }

    protected function getNoLabel() : string
    {
        return $this->noLabel ?? t('theme', 'No');
    }

}