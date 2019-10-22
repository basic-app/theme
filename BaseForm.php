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

    public $editorTextareaOptions = ['class' => 'form-control editor'];

    public $codeTextareaOptions = ['class' => 'form-control code'];

    public $uploadImageOptions = [];

    public $uploadFileOptions = [];

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

    public function editorTextarea($data, $name, array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->editorTextareaOptions, $options);

        return $this->textarea($data, $name, $options);
    }

    public function editorTextareaGroup($data, $name, array $options = [], array $groupOptions = [])
    {
        $attributes = HtmlHelper::mergeOptions($this->editorTextareaOptions, $options);

        return $this->textareaGroup($data, $name, $options, $groupOptions);
    }

    public function codeTextarea($data, $name, array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->codeTextareaOptions, $options);

        return $this->textarea($data, $name, $options);
    }

    public function codeTextareaGroup($data, $name, array $options = [], array $groupOptions = [])
    {
        $options = HtmlHelper::mergeOptions($this->codeTextareaOptions, $options);

        return $this->textareaGroup($data, $name, $options, $groupOptions);
    }

    public function uploadImage($data, $attribute, $filename = null, array $options = [])
    {
        $options = HtmlHelper::mergeAttributes($this->uploadImageOptions, $options);

        return $this->upload($data, $attribute, $options);
    }

    public function uploadImageGroup($data, $attribute, $filename = null, array $options = [], $groupOptions = [])
    {
        $options = HtmlHelper::mergeOptions($this->uploadImageOptions, $options);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->_theme->imagePreview(['url' => $filename]);
        }

        return $this->uploadGroup($data, $attribute, $options, $groupOptions);
    }    

    public function uploadFile($data, $attribute, $filename = null, array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->uploadFileOptions, $options);

        return $this->upload($data, $attribute, $options);
    }

    public function uploadFileGroup($data, $attribute, $filename = null, array $options = [], $groupOptions = [])
    {
        $options = HtmlHelper::mergeOptions($this->uploadFileOptions, $options);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->_theme->filePreview(['url' => $filename]);
        }

        return $this->uploadGroup($data, $attribute, $options, $groupOptions);
    }

}