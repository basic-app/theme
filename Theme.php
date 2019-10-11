<?php
/**
 * @copyright Copyright (c) 2018-2019 BasicApp Dev Team
 * @link http://getphptheme.com
 * @license MIT License
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Theme\PostButton;
use BasicApp\Theme\Form;

abstract class Theme
{

    const PAGER = Pager::class;

    const FORM = Form::class;

    const POST_BUTTON = PostButton::class;

    public $postButtonAttributes = [];

    public $pagerAttributes = [];

    public function __construct()
    {
    }

    abstract public function widget($class, array $options = []);

    public function postButton(array $attributes = [])
    {
        $options = HtmlHelper::mergeAttributes($this->postButtonAttributes, $attributes);

        return $this->widget(static::POST_BUTTON, $options);
    }

    public function createForm(object $model, array $errors = [])
    {
        $class = static::FORM;

        $form = new $class($model, $errors);

        return $form;
    }

    public function pager(array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->pagerAttributes, $attributes);

        return $this->widget(static::PAGER, $attributes);
    }

}