<?php

namespace BasicApp\Theme;

class Pager extends \PhpTheme\Core\Widget
{

    public $pager;

    public function run()
    {
        return $this->render('pager', [
            'pager' => $this->pager
        ]);
    }

}