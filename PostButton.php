<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;

class PostButton extends \PhpTheme\Html\Tag
{

    public $formAttributes = [];

    public $url;

    public $tag = false;

    public function render()
    {
        $content = parent::render();

        $attributes = $this->formAttributes;

        $attributes['method'] = 'POST';

        $attributes['action'] = $this->url;

        return HtmlHelper::tag('form', $content, $attributes);
    }

    public function run()
    {
        return $this->render();
    }

}
