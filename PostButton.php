<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;

class PostButton extends \PhpTheme\Core\Tag
{

    public $formAttributes = [];

    public $url;

    public $tag = false;

    public function toString() : string
    {
        $content = parent::toString();

        $attributes = $this->formAttributes;

        $attributes['method'] = 'POST';

        $attributes['action'] = $this->url;

        return HtmlHelper::tag('form', $content, $attributes);
    }

}
