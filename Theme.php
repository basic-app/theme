<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
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

    public $postButtonOptions = [];

    public $pagerOptions = [];

    public $imagePreviewOptions = [];

    public $filePreviewOptions = [];

    public function __construct()
    {
    }

    public function postButton(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->postButtonOptions, $options);

        $class = static::POST_BUTTON;

        return $class::factory($options)->render();
    }

    public function createForm(object $model, array $errors = [])
    {
        $class = static::FORM;

        $form = new $class($model, $errors, $this);

        return $form;
    }

    public function pager(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->pagerOptions, $options);

        return $this->widget(static::PAGER, $options);
    }

    public function imagePreview(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->imagePreviewOptions, $options);

        return $this->widget(static::IMAGE_PREVIEW, $options);
    }

    public function filePreview(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->filePreviewOptions, $options);

        return $this->widget(static::FILE_PREVIEW, $options);
    }

}