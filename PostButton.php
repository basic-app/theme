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

    public $formOptions = [];

    public $url;

    public function render()
    {
        $content = parent::render();

        $formOptions = $this->formOptions;

        $formOptions['method'] = 'POST';

        $formOptions['action'] = $this->url;

        return HtmlHelper::tag('form', $content, $formOptions);
    }

    public function run()
    {
        return $this->render();
    }

}
