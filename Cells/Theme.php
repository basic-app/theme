<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Theme\Cells;

use BasicApp\Theme\Interfaces\ThemeInterface;

class Theme implements ThemeInterface
{
    public function tag(array $params = []) : string
    {
        return view_cell('Tag', $params);
    }

    public function formGroup(array $params = []) : string
    {
        return view_cell('FormGroup', $params);
    }

    public function formInput(array $params = []) : string
    {
        return view_cell('FormInput', $params);
    }

    public function formInputGroup(array $params = []) : string
    {
        return view_cell('FormInputGroup', $params);
    }

    public function formPassword(array $params = []) : string
    {
        return view_cell('FormPassword', $params);
    }

    public function formPasswordGroup(array $params = []) : string
    {
        return view_cell('FormPasswordGroup', $params);
    }

    public function formUpload(array $params = []) : string
    {
        return view_cell('FormUpload', $params);
    }

    public function formUploadGroup(array $params = []) : string
    {
        return view_cell('FormUploadGroup', $params);
    }

    public function formTextarea(array $params = []) : string
    {
        return view_cell('FormTextarea', $params);
    }

    public function formTextareaGroup(array $params = []) : string
    {
        return view_cell('FormTextareaGroup', $params);
    }

    public function formDropdown(array $params = []) : string
    {
        return view_cell('FormDropdown', $params);
    }

    public function formDropdownGroup(array $params = []) : string
    {
        return view_cell('FormDropdownGroup', $params);
    }

    public function formMultiselect(array $params = []) : string
    {
        return view_cell('FormMultiselect', $params);
    }

    public function formMultiselectGroup(array $params = []) : string
    {
        return view_cell('FormMultiselectGroup', $params);
    }

    public function formCheckbox(array $params = []) : string
    {
        return view_cell('FormCheckbox', $params);
    }

    public function formCheckboxGroup(array $params = []) : string
    {
        return view_cell('FormCheckboxGroup', $params);
    }

    public function formRadio(array $params = []) : string
    {
        return view_cell('FormRadio', $params);
    }

    public function formLabel(array $params = []) : string
    {
        return view_cell('FormLabel', $params);
    }

    public function formSubmit(array $params = []) : string
    {
        return view_cell('FormSubmit', $params);
    }

    public function formReset(array $params = []) : string
    {
        return view_cell('FormReset', $params);
    }

    public function formButton(array $params = []) : string
    {
        return view_cell('FormButton', $params);
    }
}