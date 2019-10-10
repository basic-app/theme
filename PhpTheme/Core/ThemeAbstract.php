<?php
/**
 * @copyright Copyright (c) 2018-2019 BasicApp Dev Team
 * @link http://getphptheme.com
 * @license MIT License
 */
namespace PhpTheme\Core;

use PhpTheme\Helpers\Html;
use BasicApp\Theme\PostButton;
use BasicApp\Theme\Form;

abstract class ThemeAbstract
{

    const FORM = Form::class;

    const POST_BUTTON = PostButton::class;

    protected $postButtonOptions = [];

    public function __construct()
    {
    }

    public function postButton(array $options = [])
    {
        $options = Html::mergeOptions($this->postButtonOptions, $options);

        return $this->widget(static::POST_BUTTON, $options);
    }

    public function createForm($model, array $errors = [])
    {
        $class = static::FORM;

        $form = new $class($model, $errors);

        return $form;
    }

}