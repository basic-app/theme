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

    public $postButtonClass = PostButton::class;

    public $defaultPostButtonOptions = [];

    public $formClass = Form::class;

    public $defaultFormOptions = [];

    public function __construct()
    {
    }

    public function postButton(array $options = [])
    {
        $options = Html::mergeOptions($this->defaultPostButtonOptions, $options);

        return $this->widget($this->postButtonClass, $options);
    }

    public function createForm(array $options = [])
    {
        $options = Html::mergeOptions($this->defaultFormOptions, $options);

        return $this->createWidget($this->formClass, $options);
    }

}