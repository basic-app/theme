<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class FormImagePreview extends \PhpTheme\Core\Widget
{

    public $url;

    public function toString() : string
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