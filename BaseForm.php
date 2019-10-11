<?php
/**
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Theme;

use PhpTheme\Html\HtmlHelper;
use BasicApp\Helpers\ArrayHelper;
use BasicApp\Traits\FactoryTrait;

abstract class BaseForm extends \BasicApp\Core\Form
{

    public $editorTextareaAttributes = ['class' => 'form-control editor'];

    public $codeTextareaAttributes = ['class' => 'form-control code'];

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

        return $this->textareaGroup($data, $name, $atributes, $groupAttributes);
    }

    /*
    use FactoryTrait;

    protected $imagePreviewClass = FormImagePreview::class;

    protected $filePreviewClass = FormFilePreview::class;

    public $model = null;

    public $errors = [];

    public $messages = [];


    public $groupErrorClass;

    public $groupTemplate = '{label}{input}';

    public $defaultGroupOptions = [];

    public $defaultLabelOptions = [];

    public $defaultInputOptions = [];

    public $defaultTextareaOptions = [];

    public $defaultPasswordOptions = [];

    public $defaultCheckboxOptions = [];

    public $defaultDropdownOptions = [];

    public $defaultMultiselectOptions = [];

    public $defaultUploadOptions = [];

    public $defaultSubmitOptions = [];

    public $defaultButtonOptions = [];

    public $defaultResetOptions = [];

    public $defaultErrorOptions = ['class' => 'error'];

    public $defaultMessageOptions = ['class' => 'info'];


    public $defaultImagePreviewOptions = [];

    public $defaultFilePreviewOptions = [];    

    public $defaultImageUploadOptions = [];

    public $defaultFileUploadOptions = [];

    */

    // errors and buttons

    /*







    public function imagePreview(array $options)
    {
        $options = Html::mergeOptions($this->defaultImagePreviewOptions, $options);

        return $this->theme->widget($this->imagePreviewClass, $options);
    }

    public function filePreview(array $options)
    {
        $options = Html::mergeOptions($this->defaultFilePreviewOptions, $options);

        return $this->theme->widget($this->filePreviewClass, $options);
    }

    public function imageUpload($attribute, $filename = null, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultImageUploadOptions, $options);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->imagePreview(['url' => $filename]);
        }

        return $this->upload($attribute, $options, $groupOptions);
    }

    public function fileUpload($attribute, $filename = null, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultFileUploadOptions, $options);

        if (!array_key_exists('suffix', $groupOptions))
        {
            $groupOptions['suffix'] = $this->filePreview(['url' => $filename]);
        }

        return $this->upload($attribute, $options, $groupOptions);
    }    

    */



    /*

    public function generateId($field)
    {
        $class = get_class($this->_model);

        $segments = explode("\\", $class);

        $segments = array_reverse($segments);

        $first = array_shift($segments);

        $return = $first . '-' . $field;

        $return = strtolower($return);

        return $return;
    }

    public function renderContainer(string $field, string $input, array $options = []) : string
    {
        $options['label'] = $this->getLabel($field);

        $options['error'] = $this->getError($field);

        $options['input'] = $input;

        if (!array_key_exists('labelOptions', $options))
        {
            $options['labelOptions'] = [];
        }

        return view($this->containerTemplate, $options, ['saveData' => false]);
    }

    */

    protected function _getFieldLabel($data, $field)
    {
        $modelClass = get_class($this->_model);

        return $modelClass::fieldLabel($field, parent::_getFieldLabel($data, $field));
    }

}