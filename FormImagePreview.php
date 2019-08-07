<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

class FormImagePreview extends \PhpTheme\Core\Widget
{

    public $url;

    public function run()
    {
        if (!$this->url)
        {
            return '';
        }

        return $this->render('form-image-preview', [
            'url' => $this->url
        ]);
    }

}