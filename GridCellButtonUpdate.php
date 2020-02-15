<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class GridCellButtonUpdate extends \PhpTheme\Themes\Bootstrap4\GridCellButton
{

    public $icon = 'fa fa-edit';

    public $label;

    protected function getLabel()
    {
        return $this->label ?? t('theme', 'Update');
    }
    
}