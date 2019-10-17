<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

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