<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

class FormFilePreview extends \PhpTheme\Core\Widget
{

    public $url;

    public function run()
    {
        return $this->render('form-file-preview', [
            'url' => $this->url
        ]);
    }

}