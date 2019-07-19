<?php
/**
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;
use BasicApp\Helpers\ArrayHelper;
use BasicApp\Traits\FactoryTrait;

abstract class BaseForm extends \BasicApp\Core\Form
{

    use FactoryTrait;

    protected $imagePreviewClass = FormImagePreview::class;

    protected $filePreviewClass = FormFilePreview::class;

    public $model = null;

    public $errors = [];

    public $messages = [];

    public $errorClass = 'is-invalid';

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

    public $defaultEditorTextareaOptions = ['class' => 'editor'];

    public $defaultCodeTextareaOptions = ['class' => 'code'];    

    public $defaultImagePreviewOptions = [];

    public $defaultFilePreviewOptions = [];    

    public $defaultImageUploadOptions = [];

    public $defaultFileUploadOptions = [];

    public function group($attribute, $input, $options = [])
    {
        if ($options === false)
        {
            return $input;
        }

        $options = $this->addErrorClass($attribute, $options, $this->groupErrorClass);

        if (array_key_exists('template', $options))
        {
            $template = $options['template'];

            unset($options['template']);
        }
        else
        {
            $template = $this->groupTemplate;
        }

        $label = $this->attributeLabel($attribute, $options);

        $labelOptions = ArrayHelper::getValue($options, 'labelOptions', []);

        $label = $this->label($label, $labelOptions);

        $error = $this->attributeError($attribute, $options);

        $params = [
            '{input}' => $input,
            '{label}' => $label,
            '{error}' => $error
        ];

        $prefix = ArrayHelper::getValue($options, 'prefix');

        $suffix = ArrayHelper::getValue($options, 'suffix');

        $content = $prefix . strtr($template, $params) . $suffix;

        $options = ArrayHelper::getValue($options, 'options', $this->defaultGroupOptions);

        return '<div ' .stringify_attributes($options) . '>' . $content. '</div>';
    }

    public function label($label, array $options = [])
    {
        $options = Html::mergeOptions($this->defaultLabelOptions, $options);

        return '<label ' . stringify_attributes($options) . '>' . $label . '</label>';
    }

    public function input($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultInputOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $value = $this->attributeValue($attribute, $options);

        $return = $this->formInput($name, $value, $options);

        return $this->group($attribute, $return, $groupOptions);
    }

    public function textarea($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultTextareaOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $value = $this->attributeValue($attribute, $options);

        $return = $this->formTextarea($name, $value, $options);

        return $this->group($attribute, $return, $groupOptions);
    }    

    public function password($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultPasswordOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $return = $this->formPassword($name, '', $options);
    
        return $this->group($attribute, $return, $groupOptions);
    }

    public function checkbox($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultCheckboxOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $value = $this->attributeValue($attribute, $options);

        if (array_key_exists('uncheck', $options) && ($options['uncheck'] === false))
        {
            $uncheck = '';
        }
        else
        {
            $uncheck = $this->formHidden($name, 0);
        }

        $return = $uncheck . $this->formCheckbox($name, 1, (bool) $value, $options);

        return $this->group($attribute, $return, $groupOptions);
    }

    public function dropdown($attribute, array $items = [], array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultDropdownOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $value = $this->attributeValue($attribute, $options);

        $return = $this->formDropdown($name, $items, $value, $options);

        return $this->group($attribute, $return, $groupOptions);
    }

    public function multiselect($attribute, array $items = [], array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultMultiselectOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $value = $this->attributeValue($attribute, $options);

        $return = $this->formMiltiselect($name, $items, $value, $options);

        return $this->group($attribute, $return, $groupOptions);
    }

    public function upload($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultUploadOptions, $options);

        $options = $this->addErrorClass($attribute, $options);

        $name = $this->attributeName($attribute, $options);

        $return = $this->formUpload($name, '', $options);

        return $this->group($attribute, $return, $groupOptions);
    }

    // errors and buttons

    public function submit($label, array $options = [])
    {
        $options = Html::mergeOptions($this->defaultSubmitOptions, $options);

        $name = $this->attributeName('submit', $options);

        return $this->formSubmit($name, $label, $options);
    }

    public function button($label, array $options = [])
    {
        $options = Html::mergeOptions($this->defaultButtonOptions, $options);

        $name = $this->attributeName(null, $options);

        return $this->formButton($name, $label, $options);
    }

    public function reset($label, array $options = [])
    {
        $options = Html::mergeOptions($this->defaultResetOptions, $options);

        $name = $this->attributeName('reset', $options);

        return $this->formReset($name, $label, $options);
    }

    public function error($error, $options = [])
    {
        $options = Html::mergeOptions($this->defaultErrorOptions, $options);

        return '<div ' . stringify_attributes($options) . '>' . $error . '</div>';
    }

    public function message($error, $options = [])
    {
        $options = Html::mergeOptions($this->defaultMessageOptions, $options);

        return '<div ' . stringify_attributes($options) . '>' . $error . '</div>';
    }

    public function renderErrors($options = [])
    {
        $return = '';

        foreach($this->errors as $error)
        {
            $return .= $this->error($error, $options);
        }

        return $return;
    }

    public function renderMessages($options = [])
    {
        $return = '';

        foreach($this->messages as $message)
        {
            $return .= $this->message($message, $options);
        }

        return $return;
    }    

    public function hasError($attribute)
    {
        if ($this->attributeError($attribute))
        {
            return true;
        }

        return false;
    }

    public function attributeError($attribute, $options = [])
    {
        if (array_key_exists('error', $options))
        {
            return $options['error'];
        }

        if (array_key_exists($attribute, $this->errors))
        {
            return $this->errors[$attribute];
        }

        return '';
    }

    public function attributeName($attribute, $options = [])
    {
        if (array_key_exists('name', $options))
        {
            return $options['name'];
        }

        return $attribute;
    }

    public function attributeLabel($attribute, $options = [])
    {
        if (array_key_exists('label', $options))
        {
            return $options['label'];
        }

        return $this->model->label($attribute);
    }

    public function attributeValue($attribute, $options = [])
    {
        if (array_key_exists('value', $options))
        {
            return $options['value'];
        }

        $value = $this->model->{$attribute};

        return (string)$value;
    }

    public function addErrorClass($attribute, array $options, $errorClass = null)
    {
        if ($errorClass === null)
        {
            $errorClass = $this->errorClass;
        }

        if ($errorClass && $this->hasError($attribute))
        {
            if (!array_key_exists('class', $options))
            {
                $options['class'] = $this->errorClass;
            }
            else
            {
                $options['class'] .= ' ' . $this->errorClass;
            }
        }

        return $options;
    }   

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

    public function editorTextarea($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultEditorTextareaOptions, $options);

        return $this->textarea($attribute, $options, $groupOptions);
    }

    public function codeTextarea($attribute, array $options = [], $groupOptions = [])
    {
        $options = Html::mergeOptions($this->defaultCodeTextareaOptions, $options);

        return $this->textarea($attribute, $options, $groupOptions);
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

}