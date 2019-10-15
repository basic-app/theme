<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Helpers\ArrayHelper;
use BasicApp\Traits\FactoryTrait;

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
        $modelClass = get_class($this->_model);

        return $modelClass::fieldLabel($field, parent::_getFieldLabel($data, $field));
    }

    public function editorTextarea($data, $name, array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->editorTextareaAttributes, $attributes);

        return $this->textarea($data, $name, $attributes);
    }

    public function editorTextareaGroup($data, $name, array $attributes = [], array $groupAttributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->editorTextareaAttributes, $attributes);

        return $this->textareaGroup($data, $name, $attributes, $groupAttributes);
    }

    public function codeTextarea($data, $name, array $attributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->codeTextareaAttributes, $attributes);

        return $this->textarea($data, $name, $attributes);
    }

    public function codeTextareaGroup($data, $name, array $attributes = [], array $groupAttributes = [])
    {
        $attributes = HtmlHelper::mergeAttributes($this->codeTextareaAttributes, $attributes);

        return $this->textareaGroup($data, $name, $attributes, $groupAttributes);
    }

    public function uploadImage($data, $attribute, $filename = null, array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->uploadImageAttributes, $options);

        return $this->upload($data, $attribute, $options, $groupOptions);
    }

    public function uploadImageGroup($data, $attribute, $filename = null, array $options = [], $groupOptions = [])
    {
        $options = HtmlHelper::mergeAttributes($this->uploadImageAttributes, $options);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->_theme->imagePreview(['url' => $filename]);
        }

        return $this->uploadGroup($data, $attribute, $options, $groupOptions);
    }    

    public function uploadFile($data, $attribute, $filename = null, array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->uploadFileAttributes, $options);

        return $this->upload($data, $attribute, $options);
    }

    public function uploadFileGroup($data, $attribute, $filename = null, array $options = [], $groupOptions = [])
    {
        $options = HtmlHelper::mergeAttributes($this->uploadFileAttributes, $options);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->_theme->filePreview(['url' => $filename]);
        }

        return $this->uploadGroup($data, $attribute, $options, $groupOptions);
    }

}