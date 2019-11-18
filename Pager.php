<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class Pager extends \PhpTheme\Core\Widget
{

    public $pager;

    public function toString() : string
    {
        return $this->render('pager', [
            'pager' => $this->pager
        ]);
    }

}