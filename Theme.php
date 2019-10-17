<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Theme\PostButton;
use BasicApp\Theme\Form;

class Theme extends \PhpTheme\Core\BaseTheme
{

    const PAGER = Pager::class;

    const FORM = Form::class;

    const POST_BUTTON = PostButton::class;

    const IMAGE_PREVIEW = FormImagePreview::class;

    const FILE_PREVIEW = FormFilePreview::class;

    public $postButtonAttributes = [];

    public $pagerAttributes = [];

    public $imagePreviewAttributes = [];

    public $filePreviewAttributes = [];

    public function __construct()
    {
    }

    public function postButton(array $attributes = [])
    {
        $options = HtmlHelper::mergeAttributes($this->postButtonAttributes, $attributes);

        return $this->widget(static::POST_BUTTON, $options);
    }

    public function createForm(object $model, array $errors = [])
    {
        $class = static::FORM;

        $form = new $class($model, $errors, $this);

        return $form;
    }

    public function pager(array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->pagerAttributes, $attributes);

        return $this->widget(static::PAGER, $attributes);
    }

    public function imagePreview(array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->imagePreviewAttributes, $attributes);

        return $this->widget(static::IMAGE_PREVIEW, $attributes);
    }

    public function filePreview(array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->filePreviewAttributes, $attributes);

        return $this->widget(static::FILE_PREVIEW, $attributes);
    }

}