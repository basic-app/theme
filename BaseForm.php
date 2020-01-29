<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Helpers\ArrayHelper;

abstract class BaseForm extends \BasicApp\Core\Form
{

    public $editorTextareaAttributes = ['class' => 'form-control editor'];

    public $codeTextareaAttributes = ['class' => 'form-control code'];

    public $uploadImageAttributes = [];

    public $uploadFileAttributes = [];

    protected $_theme;

    public function __construct($model, $errors, $theme)
    {
        parent::__construct($model, $errors);

        $this->_theme = $theme;
    }

    protected function _getFieldLabel($data, $field)
    {
        return $this->_model->getfieldLabel($field, parent::_getFieldLabel($data, $field));
    }

    public function editorTextarea($data, $field, array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->editorTextareaAttributes, $attributes);

        return $this->textarea($data, $field, $attributes);
    }

    public function editorTextareaGroup($data, $field, array $attributes = [], array $groupOptions = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->editorTextareaAttributes, $attributes);

        return $this->textareaGroup($data, $field, $attributes, $groupOptions);
    }

    public function codeTextarea($data, $field, array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->codeTextareaAttributes, $attributes);

        return $this->textarea($data, $field, $attributes);
    }

    public function codeTextareaGroup($data, $field, array $attributes = [], array $groupOptions = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->codeTextareaAttributes, $attributes);

        return $this->textareaGroup($data, $field, $attributes, $groupOptions);
    }

    public function uploadImage($data, $field, $filename = null, array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->uploadImageAttributes, $attributes);

        return $this->upload($data, $field, $attributes);
    }

    public function uploadImageGroup($data, $field, $filename = null, array $attributes = [], $groupOptions = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->uploadImageAttributes, $attributes);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->_theme->imagePreview(['url' => $filename]);
        }

        return $this->uploadGroup($data, $field, $attributes, $groupOptions);
    }    

    public function uploadFile($data, $field, $filename = null, array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->uploadFileAttributes, $attributes);

        return $this->upload($data, $field, $attributes);
    }

    public function uploadFileGroup($data, $field, $filename = null, array $attributes = [], $groupOptions = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->uploadFileAttributes, $attributes);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->_theme->filePreview(['url' => $filename]);
        }

        return $this->uploadGroup($data, $field, $attributes, $groupOptions);
    }

}